<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Organization_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrgCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id)
    {

        $organization = DB::table('users as u')
            ->where('u.id', $id)
            ->select('u.name as username', 'u.id as user_id')
            ->first();

        if (!$organization) {
            return redirect()->back()->with('error', 'User not found');
        }
        $username = $organization->username;
        $user_id = $organization->user_id;
        if (auth()->user()->usertype == 'admin') {
            // Fetch assigned courses for the organization
            $orgCourses = DB::table('organization_courses as oc')
            ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
            ->leftJoin('users as u', 'oc.user_id', '=', 'u.id')
            ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
            ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
            ->where('oc.user_id', $id)

            ->select(
                'oc.*',
                'oc.status as orgCourseStatus',
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
            ->get();

            // Fetch all courses for admin to assign to the organization
            // $totalCourses = DB::table('courses')->pluck('course_name', 'id');

            $totalCourses =   DB::table('courses as c')
                ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
                ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
                ->select(
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
                )->get();



        } else if (auth()->user()->usertype == 'organization') {
            // Ensure the organization user can only access their own courses
            $orgCourses= DB::table('organization_courses as oc')
                ->leftJoin('courses as c', 'oc.course_id', '=', 'c.id')
                ->leftJoin('users as u', 'oc.user_id', '=', 'u.id')
                ->leftJoin('categories as ct', 'c.category_id', '=', 'ct.id')
                ->leftJoin('categories as ch', 'c.subCategory_id', '=', 'ch.id')
                ->where('oc.user_id', $id)->where('oc.status', '=', '1')
                ->select(
                    'oc.*',
                    'oc.status as orgCourseStatus',
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
                ->get();

            // Fetch specific courses for the organization user
            $totalCourses = DB::table('courses as c')
                ->leftJoin('organization_courses as oc', 'c.id', '=', 'oc.course_id')
                ->where('oc.user_id', $id)
                ->pluck('c.course_name', 'c.id');
        } else {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        return view('admin.org_courses.index', compact('orgCourses', 'username', 'user_id', 'totalCourses'));
    }


    public function toggleStatus($id)
    {
        $orgCourse = Organization_courses::findOrFail($id);
        $orgCourse->status = $orgCourse->status == '0' ? '1' : '0';
        $orgCourse->save();

        return response()->json(['status' => $orgCourse->status, 'success' => 'Organization status updated successfully.']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id', // Validate if course_id exists in courses table

        ]);

        // Check if the course is already assigned to the organization
        if (Organization_courses::where('course_id', $request->input('course_id'))
            ->where('user_id', $id)
            ->exists()
        ) {
            return redirect()->back()->with('error', 'Course is already assigned to the organization.');
        }

        $assignCourse = Organization_courses::create([
            'course_id' => $request->input('course_id'),
            'user_id' => $id,
            'status' => '1',
        ]);

        return redirect()->route('orgCourse.index', ['id' => $assignCourse->user_id,])
            ->with('success', 'Course assign successfully.');
    }
}
