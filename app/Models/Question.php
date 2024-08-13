<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = ['question_text', 'status', 'updated_by', 'quiz_id'];

    /**
     * Get the quiz associated with the question.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Get the user who last updated the question.
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get the options for the question.
     */
    public function options()
    {
        return $this->hasMany(QuizOption::class);
    }

    public function atemptQuizzes()
    {
        return $this->hasMany(AtemptQuiz::class);
    }


    public function submissionAnswers()
    {
        return $this->hasMany(SubmissionAnswer::class);
    }
}
