<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChapterHelper;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ChaptersController extends Controller
{

    public function toggleStatus($id)
    {
        $chapters =Chapter::findOrFail($id);
        $chapters->chapter_status= $chapters->chapter_status== '0' ? '1' : '0';
        $chapters->save();

        return response()->json(['status' => $chapters->chapter_status, 'success' => 'Course status updated successfully.']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $course = Course::findOrFail($id);

        $chapters = DB::table('chapters as chp')
            ->leftJoin('courses as cr', 'cr.id', '=', 'chp.course_id')
            ->select('chp.*', 'cr.course_name')
            ->where('chp.course_id', $course->id)->paginate(6)
            ;


        return view('admin.chapters.index',compact('chapters','course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

       $course = Course::findOrFail($id);

       $chapter = $course->chapter;

        return view('admin.chapters.create',compact('course','chapter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'chapter_name' => 'required', 'string', 'max:255', 'unique:chapters,chapter_name',
            'chapter_description' => 'required', 'string', 'max:255',
            'chapter_image' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'chapter_icon' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024',


        ]);



    // Check if a chapter with the same name already exists
    $existingChapter = Chapter::where('chapter_name', $request->input('chapter_name'))->first();
    if ($existingChapter) {
        return redirect()->back()
            ->withErrors(['chapter_name' => 'A chapter with this name already exists.'])
            ->withInput();
    }

        if ($request->hasFile('chapter_image')) {
            $imagePath = $request->file('chapter_image')->store('chapter_Images', 'public');
        }

        if ($request->hasFile('chapter_icon')) {
            $iconPath = $request->file('chapter_icon')->store('chapter_Icons', 'public');
        }


        $chapter = Chapter::create([
            'chapter_name' => $request->input('chapter_name'),
            'chapter_description' => $request->input('chapter_description'),
            'chapter_image' => $imagePath,
            'chapter_icon' => $iconPath,
            'chapter_status' => '1', // Assuming this means 'active'
            'course_id'=>$id,
        ]);

        return redirect()->route('chapter.show', ['id' => $chapter->id,'cid'=>$course->id])
            ->with('success', 'chapter created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, string $cid)
    {

        // $chapter = Chapter::findOrFail($id);


        // $course = $chapter->course; // Assuming you have defined the relationship in your Chapter model


        // return view('admin.chapters.show', compact('chapter', 'course'));




        $chapter = Chapter::with('topics.lectures')->findOrFail($id);
        $course = Course::findOrFail($cid);

        return view('admin.chapters.show', compact('chapter', 'course'));

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id,$cid)
    {
        $chapter = Chapter::findOrFail($id);
        $course = $chapter->course; // Assuming you have defined the relationship in your models

        return view('admin.chapters.edit', compact('chapter', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,$cid)
    {

        $chapter = Chapter::findOrFail($id);
        $course = Course::findOrFail($cid);

        $request->validate([
            'chapter_name' => ['required', 'string', 'max:255', Rule::unique('chapters')->ignore($chapter->id)],
            'chapter_description' => ['required', 'string', 'max:255'],
            'chapter_image' => ['sometimes', 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'chapter_icon' => ['sometimes', 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
        ]);

        // Handle image and icon uploads
        $imagePath = $chapter->chapter_image;
        $iconPath = $chapter->chapter_icon;

        if ($request->hasFile('chapter_image')) {
            Storage::delete('public/' . $chapter->chapter_image); // Delete old image
            $imagePath = $request->file('chapter_image')->store('chapter_Images', 'public');
        }

        if ($request->hasFile('chapter_icon')) {
            Storage::delete('public/' . $chapter->chapter_icon); // Delete old icon
            $iconPath = $request->file('chapter_icon')->store('chapter_Icons', 'public');
        }

        $chapter->update([
            'chapter_name' => $request->input('chapter_name'),
            'chapter_description' => $request->input('chapter_description'),
            'chapter_image' => $imagePath,
            'chapter_icon' => $iconPath,
            'chapter_status' => 1, // Assuming this means 'active'
            'course_id' => $cid,
        ]);

        return redirect()->route('chapter.show', ['id' => $chapter->id, 'cid' => $course->id])
            ->with('success', 'Chapter updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
