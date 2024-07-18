<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecture extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'lecture_name',
        'lecture_description',
        'topic_id',
        'lecture_file',
        'lecture_video',
        'lecture_duration',
        'lecture_status',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
