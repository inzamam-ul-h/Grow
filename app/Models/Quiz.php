<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    // Fillable properties
    protected $fillable = [
        'title',
        'status',
        'topic_id',
        'updated_by'
    ];

    // Define the relationship with the topic model
    public function topic()
    {
        return $this->belongsTo(topic::class);
    }


    // Define the relationship with the User model (optional, if you want to track the user who updated the quiz)
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
