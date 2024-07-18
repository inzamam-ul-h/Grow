<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'chapter_name',
        'chapter_description',
        'course_id',
        'chapter_image',
        'chapter_icon',
        'chapter_status'
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // public function topics()
    // {
    //     return $this->hasMany(Chapter::class);
    // }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
