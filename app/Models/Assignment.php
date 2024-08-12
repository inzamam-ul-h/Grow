<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assignment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['topic_id', 'title', 'description', 'file','status'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function submissions()
    {
        return $this->hasMany(AssignmentSubmission::class);
    }
}
