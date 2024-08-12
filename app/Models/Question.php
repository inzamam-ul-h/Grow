<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    // Fillable properties
    protected $fillable = [
        'quiz_id',
        'title',
        'content',
        'status',
        'updated_by',
    ];
    // Define the relationship with the Answer model.
    public function answers()
    {
        return $this->hasMany(Answer::class, 'question_id');
    }
    // Define the relationship with the Quiz model
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    // Define the relationship with the User model (optional, if you want to track the user who updated the question)
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
