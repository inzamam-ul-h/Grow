<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'topic_name',
        'topic_description',
        'chapter_id',
        'topic_image',
        'topic_icon',
        'topic_status',
    ];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
