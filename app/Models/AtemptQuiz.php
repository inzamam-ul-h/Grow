<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtemptQuiz extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = ['question_id', 'user_id', 'score', 'submission_time'];

    /**
     * Get the question associated with the attempt.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the user who made the attempt.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function submissionAnswers()
    {
        return $this->hasMany(SubmissionAnswer::class);
    }
}
