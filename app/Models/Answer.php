<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    // The attributes that are mass assignable.
    protected $fillable = [
        'question_id',
        'content',
        'status',
        'updated_by',
    ];



    // Define the relationship with the Question model.
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    // Define the relationship with the User model.
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
