<?php

namespace App\Helpers;

use App\Models\Chapter;
use Illuminate\Support\Facades\DB;

class ChapterHelper
{

    public static function getChaptersWithTopicsAndLecturesByCourseId($courseId)
    {
        return Chapter::with(['topics.lectures'])
            ->where('course_id', $courseId)
            ->get();
    }


    public static function methodExists($method)
    {
        return method_exists(__CLASS__, $method);
    }
}
