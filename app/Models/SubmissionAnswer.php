<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmissionAnswer extends Model
{
    use HasFactory;

     // Specify the fields that are mass assignable
     protected $fillable = ['question_id', 'atempt_quiz_id', 'quiz_option_id', 'is_selected'];

     /**
      * Get the question associated with the submission answer.
      */
     public function question()
     {
         return $this->belongsTo(Question::class);
     }

     /**
      * Get the attempt quiz associated with the submission answer.
      */
     public function atemptQuiz()
     {
         return $this->belongsTo(AtemptQuiz::class);
     }

     /**
      * Get the quiz option associated with the submission answer.
      */
     public function quizOption()
     {
         return $this->belongsTo(QuizOption::class);
     }
}
