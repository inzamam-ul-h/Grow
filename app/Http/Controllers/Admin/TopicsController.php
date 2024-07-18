<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChapterHelper;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TopicsController extends Controller
{
    public function toggleStatus($id)
    {
        $topics =Topic::findOrFail($id);
        $topics->topic_status = $topics->topic_status == '0' ? '1' : '0';
        $topics->save();

        return response()->json(['status' => $topics->topic_status, 'success' => 'topic status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $chapter = Chapter::findOrFail($id);
        $course=$chapter->course;
        // $topic=Topic::findOrFail($id);
        // $abc=$topic->chapter;
        return view('admin.topics.create',compact('course','chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id)
    {

            $chapter = Chapter::findOrFail($id);
            $request->validate([
                'topic_name' => 'required', 'string', 'max:255', 'unique:topics,topic_name',
                'topic_description' => 'required', 'string', 'max:255',
                'topic_image' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048',
                'topic_icon' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024',


            ]);



        // Check if a chapter with the same name already exists
        $existingTopic = Topic::where('topic_name', $request->input('topic_name'))->first();
        if ($existingTopic) {
            return redirect()->back()
                ->withErrors(['topic_name' => 'A topic with this name already exists.'])
                ->withInput();
        }

            if ($request->hasFile('topic_image')) {
                $imagePath = $request->file('topic_image')->store('topic_Images', 'public');
            }

            if ($request->hasFile('topic_icon')) {
                $iconPath = $request->file('topic_icon')->store('topic_Icons', 'public');
            }


            $topic = Topic::create([
                'topic_name' => $request->input('topic_name'),
                'topic_description' => $request->input('topic_description'),
                'topic_image' => $imagePath,
                'topic_icon' => $iconPath,
                'topic_status' => '1', // Assuming this means 'active'
                'chapter_id'=>$id,
            ]);

            return redirect()->route('topic.show', ['id' => $topic->id,'chid'=>$chapter->id])
                ->with('success', 'topic created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id,$chid)
    {
        $topic = Topic::with('lectures')->findOrFail($id);
        $chapter = Chapter::findOrFail($chid);
        $course=$chapter->course;
        return view('admin.topics.show', compact('topic', 'chapter','course'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        $topic = Topic::findOrFail($id);
        $chapter = $topic->chapter;

        // Example: Fetch the course related to the chapter
        $course = $chapter->course;
        return view('admin.topics.edit', compact('topic','chapter','course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$chid)
    {
        $topic = Topic::findOrFail($id);
        $chapter = Chapter::findOrFail($chid);

        $request->validate([
            'topic_name' => 'required', 'string', 'max:255', 'unique:topics,topic_name',
            'topic_description' => 'required', 'string', 'max:255',
            'topic_image' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'topic_icon' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024',
        ]);

         // Handle image and icon uploads
         $imagePath = $topic->topic_image;
         $iconPath = $topic->topic_icon;

         if ($request->hasFile('topic_image')) {
             Storage::delete('public/' . $topic->topic_image); // Delete old image
             $imagePath = $request->file('topic_image')->store('topic_Images', 'public');
         }

         if ($request->hasFile('topic_icon')) {
             Storage::delete('public/' . $topic->topic_icon); // Delete old icon
             $iconPath = $request->file('topic_icon')->store('topic_Icons', 'public');
         }
         $topic->update([
            'topic_name' => $request->input('topic_name'),
            'topic_description' => $request->input('topic_description'),
            'topic_image' => $imagePath,
            'topic_icon' => $iconPath,
            'topic_status' => '1', // Assuming this means 'active'
            'chapter_id'=>$chid,
        ]);
        return redirect()->route('topic.show', ['id' => $topic->id,'chid'=>$chapter->id])
        ->with('success', 'topic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
