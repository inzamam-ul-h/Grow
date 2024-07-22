<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChapterHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{


    public function toggleStatus($id)
    {
        $courses = Course::findOrFail($id);
        $courses->status = $courses->status == '0' ? '1' : '0';
        $courses->save();

        return response()->json(['status' => $courses->status, 'success' => 'Course status updated successfully.']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $courses = Course::all();
        $courses = Course::with('category', 'subcategory')->paginate(6);
        // $courses = DB::table('courses as cr')
        // ->leftJoin('categories as ct', 'cr.category_id', '=', 'ct.id')
        // ->leftJoin('categories as ch', 'cr.subCategory_id', '=', 'ch.id')
        // ->select('cr.*', 'ct.category_name', 'ch.category_name as subCategoryName')
        // ->get();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $courses = Course::all();
        return view('admin.courses.create', compact('categories', 'courses'));
    }

    public function fetchSubcategories($categoryId)
    {
        $subcategories = Category::where('parent_category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required', 'string', 'max:255', 'unique:courses,course_name',
            'course_description' => 'required', 'string', 'max:255',
            'intro_video' => 'file|mimes:mp4,mov,avi,wmv|max:20480',
            'course_image' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'course_icon' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024',
            'price' => 'required', 'float', 'max:10',
            'course_type' => 'required',
            // 'category_id' => 'required',
            // 'subCategory_id' => 'nullable|exists:categories,id',


        ]);
        $videoPath = NUll;
        if ($request->hasFile('course_image')) {
            $imagePath = $request->file('course_image')->store('course_Images', 'public');
        }

        if ($request->hasFile('course_icon')) {
            $iconPath = $request->file('course_icon')->store('course_Icons', 'public');
        }

        if ($request->hasFile('intro_video')) {
            $videoPath = $request->file('intro_video')->store('intro_videos', 'public');
        }

        $course = Course::create([
            'course_name' => $request->input('course_name'),
            'course_description' => $request->input('course_description'),
            'course_image' => $imagePath,
            'course_icon' => $iconPath,
            'intro_video' => $videoPath,
            'status' => '1', // Assuming this means 'active'
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'subCategory_id' => $request->input('subCategory'),
            'course_type' => $request->input('course_type'),
        ]);

        return redirect()->route('course.show', ['id' => $course->id])
            ->with('success', 'course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $course = Course::findOrFail($id);;



        $organizations = DB::table('users')
            ->join('organization_courses', 'users.id', '=', 'organization_courses.user_id')
            ->join('courses', 'organization_courses.course_id', '=', 'courses.id')
            ->select('users.id', 'users.name', 'users.email', 'users.usertype','organization_courses.id as orgCid',
            'organization_courses.status as orgStatus')
            ->where('courses.id', $id)
            ->where('users.usertype', 'organization')
            ->get();


        $employees = DB::table('users AS e')
            ->join('employee_courses AS ec', 'e.id', '=', 'ec.user_id')
            ->join('courses AS c', 'ec.course_id', '=', 'c.id')
            ->join('users AS o', 'e.reference_id', '=', 'o.id') // Join to get organization details
            ->select('e.id', 'e.name', 'e.email', 'o.name AS organization_name') // Select organization name
            ->where('c.id', $id)
            ->where('e.usertype', 'employee')
            ->get();


        $category = DB::table('courses as cr')
            ->leftJoin('categories as ct', 'cr.category_id', '=', 'ct.id')
            ->leftJoin('categories as ch', 'cr.subCategory_id', '=', 'ch.id')
            ->select('ct.category_name as category_name', 'ch.category_name as subCategoryName', 'ct.category_icon as category_icon')
            ->where('cr.id', $id)
            ->first();
        if ($course == NULL) {
            return redirect()->back()->with("error", "Course Not Found");
        } else {
            return view('admin.courses.show', compact('course', 'category', 'organizations', 'employees'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $course = Course::findOrFail($id);
        $categories = Category::all();
        if (!$course) {
            return redirect()->back('with', "Course not found");
        } else {
            return view('admin.courses.edit', compact('course', 'categories'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        $request->validate([
            'course_name' => 'required', 'string', 'max:255', 'unique:courses,course_name',
            'course_description' => 'required', 'string', 'max:255',
            'intro_video' => 'file|mimes:mp4,mov,avi,wmv|max:20480',
            'course_image' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:2048',
            'course_icon' => 'required', 'mimes:jpeg,png,jpg,gif', 'max:1024',
            'price' => 'required', 'float', 'max:10',
            'course_type' => 'required',
            // 'category_id' => 'required',
            // 'subCategory_id' => 'nullable|exists:categories,id',


        ]);
        $videoPath = NUll;


        if ($request->hasFile('course_image')) {
            $imagePath = $request->file('course_image')->store('course_Images', 'public');
        }

        if ($request->hasFile('course_icon')) {
            $iconPath = $request->file('course_icon')->store('course_Icons', 'public');
        }

        if ($request->hasFile('intro_video')) {
            $videoPath = $request->file('intro_video')->store('intro_videos', 'public');
        }
        $course->update([
            'course_name' => $request->input('course_name'),
            'course_description' => $request->input('course_description'),
            'course_image' => $imagePath,
            'course_icon' => $iconPath,
            'intro_video' => $videoPath,

            'status' => '1', // Assuming this means 'active'
            'price' => $request->input('price'),
            'category_id' => $request->input('category'),
            'subCategory_id' => $request->input('subCategory'),
            'course_type' => $request->input('course_type'),
        ]);



        return redirect()->route('course.show', ['id' => $course->id])
            ->with('success', 'course Updated successfully.');
    }


    public function toggleUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $courseId = $request->input('course_id');
        $action = $request->input('action');

        // Determine if the user is an organization or employee
        $user = User::find($userId);
        $course = Course::find($courseId);

        if ($user && $course) {
            if ($user->usertype == 'organization') {
                $relation = $course->organizations()->where('organization_id', $userId)->first();
                if ($relation) {
                    $course->organizations()->updateExistingPivot($userId, ['status' => $action]);
                }
            } elseif ($user->usertype == 'employee') {
                $relation = $course->employees()->where('employee_id', $userId)->first();
                if ($relation) {
                    $course->employees()->updateExistingPivot($userId, ['status' => $action]);
                }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'User or Course not found.']);
    }
}
