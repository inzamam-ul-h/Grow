<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class empCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $employee = DB::table('users as u')
        ->where('u.id', $id)
        ->select('u.name as username', 'u.id as user_id')
        ->first();

    if (!$employee) {
        return redirect()->back()->with('error', 'User not found');
    }
    $username = $employee->username;
    $user_id = $employee->user_id;

    if (auth()->user()->usertype == 'admin' ) {
        // Fetch assigned courses for the employee
        $courses = DB::table('employee_courses as oc')
            ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
            ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
            ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
            ->where('oc.user_id', $id)
            ->select(
                'oc.*',
                'c.id as course_id',
                'c.course_name',
                'c.course_description',
                'c.intro_video',
                'c.course_icon',
                'c.course_image',
                'c.price',
                'c.status',
                'ct.category_name as category_name',
                'ct.category_icon as category_icon',
                'ch.category_name as subcategory_name',
                'ch.category_icon as subcategory_icon'
            )
            ->paginate(6);

        // Fetch all courses for admin to assign to the employee
        $totalCourses = DB::table('courses')->pluck('course_name', 'id');
    } else if (auth()->user()->usertype == 'employee') {
        // Ensure the employee user can only access their own courses
        if ($id == auth()->user()->id) {
            $courses = DB::table('employee_courses as oc')
                ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
                ->leftJoin('users as u', 'oc.user_id', '=', 'u.id')
                ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
                ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
                ->where('oc.user_id', $id)
                ->select(
                    'oc.*',
                    'c.id as course_id',
                    'c.course_name',
                    'c.course_description',
                    'c.intro_video',
                    'c.course_icon',
                    'c.course_image',
                    'c.price',
                    'c.status',
                    'ct.category_name as category_name',
                    'ct.category_icon as category_icon',
                    'ch.category_name as subcategory_name',
                    'ch.category_icon as subcategory_icon'
                )
                ->paginate(6);

            // Fetch specific courses for the employee user
            $totalCourses = DB::table('courses as c')
                ->leftJoin('employee_courses as oc', 'c.id', '=', 'oc.course_id')
                ->where('oc.user_id', $id)
                ->pluck('c.course_name', 'c.id');
        }

        else {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
    }

    if (auth()->user()->usertype == 'organization') {
        // Get the organization ID of the authenticated user
        $organizationId = auth()->user()->id;

        // Fetch assigned courses for the employees of the organization
        $courses = DB::table('employee_courses as oc')
            ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
            ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
            ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
            ->leftJoin('users as u', 'oc.user_id', '=', 'u.id')
            ->where('u.reference_id', $organizationId)
            ->where('u.id', $id) // Ensure the user ID matches the employee ID being viewed
            ->select(
                'oc.*',
                'c.id as course_id',
                'c.course_name',
                'c.course_description',
                'c.intro_video',
                'c.course_icon',
                'c.course_image',
                'c.price',
                'c.status',
                'ct.category_name as category_name',
                'ct.category_icon as category_icon',
                'ch.category_name as subcategory_name',
                'ch.category_icon as subcategory_icon'
            )
            ->paginate(6);

        // Fetch only courses assigned to the organization
    $totalCourses = DB::table('organization_courses as oc')
    ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
    ->where('oc.user_id', $organizationId)
    ->pluck('c.course_name', 'c.id');
    }


    // else {
    //     return redirect()->back()->with('error', 'Unauthorized access');
    // }
    return view('admin.emp_courses.index', compact('courses', 'username', 'user_id', 'totalCourses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Validate if course_id exists in courses table
            // 'user_id' => 'required|exists:users,id',
        ]);

        // Check if the course is already assigned to the employee
        if (Employee_courses::where('course_id', $request->input('course_id'))
            ->where('user_id', $id)
            ->exists()
        ) {
            return redirect()->back()->with('error', 'Course is already assigned to the employee.');
        }

        $assignCourse = Employee_courses::create([
            'course_id' => $request->input('course_id'),
            'user_id' => $id,
        ]);

        return redirect()->route('empCourse.index', ['id' => $assignCourse->user_id,])
            ->with('success', 'Course assign successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
