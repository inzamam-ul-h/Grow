<?php

namespace App\Http\Controllers;

use App\Models\LectureProgress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    public function updateProgress(Request $request)
    {
        $userId = $request->input('user_id');
        $lectureId = $request->input('lecture_id');

        LectureProgress::updateOrCreate(
            ['user_id' => $userId,
             'lecture_id' => $lectureId],
            ['view_status' => '1']
        );

        return response()->json(['success' => true]);
    }

}
