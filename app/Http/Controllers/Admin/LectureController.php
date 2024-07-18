<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecture;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {   $topic = Topic::findOrFail($id);
        $chapter=$topic->chapter;

        return view('admin.lectures.create',compact('topic','chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {

        $topic = Topic::findOrFail($id);
        $request->validate([
            'lecture_name' => 'required', 'string', 'max:255', 'unique:lectures,lecture_name',
            'lecture_description' => 'required', 'string', 'max:255',
            'lecture_file' => 'mimes:pdf,doc,docx,txt,xlsx,xls,ppt,pptx|max:10240',
            'lecture_video' => 'mimes:mp4,mov,avi,wmv|max:204800', // 200MB max size for video file
        ]);
        $lectureVideoPath=NULL;
        $lectureFilePath=NULL;
          // Handle lecture_file upload
    if ($request->hasFile('lecture_file')) {
        $lectureFile = $request->file('lecture_file');
        $lectureFileName = time() . '-' . $lectureFile->getClientOriginalName();
        $lectureFilePath = $lectureFile->storeAs('lecture_files', $lectureFileName, 'public');
        // Save $lectureFilePath to database or process as needed
    }

    // Handle lecture_video upload
    if ($request->hasFile('lecture_video')) {
        $lectureVideo = $request->file('lecture_video');
        $lectureVideoName = time() . '-' . $lectureVideo->getClientOriginalName();
        $lectureVideoPath = $lectureVideo->storeAs('lecture_videos', $lectureVideoName, 'public');
        // Save $lectureVideoPath to database or process as needed
    }

    $lecture = Lecture::create([
        'lecture_name' => $request->input('lecture_name'),
        'lecture_description' => $request->input('lecture_description'),
        'lecture_video' => $lectureVideoPath,
        'lecture_file' => $lectureFilePath,
        'lecture_status' => '1', // Assuming this means 'active'
        'topic_id'=>$id,
    ]);

    return redirect()->route('lecture.show', ['id' => $lecture->id, 'tid' => $topic->id])
    ->with('success', 'Lecture created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,$tid)
    {

    //     $lecture = Lecture::findOrFail($id);

    // // Assuming Lecture model has a relationship defined for topic
    // $topic = $lecture->topic;

    // // Example: Fetch the course related to the topic
    // $chapter = $topic->chapter;
    // $course=$chapter->course;

    // return view('admin.lectures.show', compact('lecture', 'topic', 'chapter','course'));



        $lecture = Lecture::findOrFail($id);
        $topic = Topic::findOrFail($tid);
        $chapter = $topic->chapter;
        $course=$chapter->course;

    return view('admin.lectures.show', compact('lecture', 'topic', 'chapter','course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,$tid)
    {
        $lecture = Lecture::findOrFail($id);
        $topic = Topic::findOrFail($tid);
        return view('admin.lectures.edit', compact('lecture', 'topic',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$tid)
    {
        $lecture = Lecture::findOrFail($id);
        $topic = Topic::findOrFail($tid);
        $request->validate([
            'lecture_name' => 'required', 'string', 'max:255', 'unique:lectures,lecture_name',
            'lecture_description' => 'required', 'string', 'max:255',
            'lecture_file' => 'mimes:pdf,doc,docx,txt,xlsx,xls,ppt,pptx|max:10240',
            'lecture_video' => 'mimes:mp4,mov,avi,wmv|max:204800', // 200MB max size for video file
        ]);
        $lectureVideoPath=NULL;
        $lectureFilePath=NULL;
          // Handle lecture_file upload
    if ($request->hasFile('lecture_file')) {
        Storage::delete('public/' . $lecture->lecture_file);
        $lectureFile = $request->file('lecture_file');
        $lectureFileName = time() . '-' . $lectureFile->getClientOriginalName();
        $lectureFilePath = $lectureFile->storeAs('lecture_files', $lectureFileName, 'public');
        // Save $lectureFilePath to database or process as needed
    }

    // Handle lecture_video upload
    if ($request->hasFile('lecture_video')) {
        Storage::delete('public/' . $lecture->lecture_video);
        $lectureVideo = $request->file('lecture_video');
        $lectureVideoName = time() . '-' . $lectureVideo->getClientOriginalName();
        $lectureVideoPath = $lectureVideo->storeAs('lecture_videos', $lectureVideoName, 'public');
        // Save $lectureVideoPath to database or process as needed
    }


    $lecture->update([
        'lecture_name' => $request->input('lecture_name'),
        'lecture_description' => $request->input('lecture_description'),
        'lecture_video' =>$lectureVideoPath,
        'lecture_file' => $lectureFilePath,
        'lecture_status' => '1', // Assuming this means 'active'
        'topic_id'=>$tid,
    ]);
    return redirect()->route('lecture.show', ['id' => $lecture->id,'tid'=>$topic->id])
    ->with('success', 'lecture updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
