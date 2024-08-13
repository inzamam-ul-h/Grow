<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function create($id)
    {
        $topic = Topic::findOrFail($id);
        $chapter = $topic->chapter;

        return view('admin.quiz.create', compact('topic', 'chapter'));
    }


    public function storeQuizData(Request $request, $id)
    {
        $topic = Topic::findOrFail($id);

        $request->validate([
         'quiz_title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.correct_option' => 'required|string',
        ]);

        // Start a transaction
        DB::beginTransaction();

        try {
            // Step 1: Create the Quiz
            $quiz = Quiz::create([
                'quiz_title' => $request->input('quiz_title'),
                'topic_id' => $topic->id, // Correctly assigning the topic_id
                'status' => '1', // Assuming a default status
                'updated_by' => auth()->id(), // Assuming user authentication
            ]);

            // Step 2: Iterate through the questions and save them
            foreach ($request->input('questions') as $questionData) {
                $question = $quiz->questions()->create([
                    'question_text' => $questionData['question_text'],
                    'quiz_id' => $quiz->id,
                    'status' => '1', // Assuming a default status
                    'updated_by' => auth()->id(), // Assuming user authentication
                ]);

                // Step 3: Iterate through the options and save them
                foreach ($questionData['options'] as $index => $optionText) {
                     $isCorrect = ($index + 1 == $questionData['correct_option']); // Determine if the option is correct based on its index

                    $question->options()->create([
                        'option_text' => $optionText,
                        'question_id' => $question->id,
                        'is_correct' => $isCorrect ? 1 : 0, // Store 1 for correct, 0 for incorrect
                        'status' => '1', // Assuming a default status
                    ]);
                }
            }

            // Commit the transaction
            DB::commit();

            return response()->json(['success' => 'Quiz and related data saved successfully!']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollback();

            return response()->json(['error' => 'Failed to save quiz data: ' . $e->getMessage()]);
        }
    }


}
