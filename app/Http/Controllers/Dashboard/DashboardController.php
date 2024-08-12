<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends UserController
{
    /**
     * Display a listing of the resource.
     */

     public function getCourses(){
        $courses=Course::all();
        return $courses;
    }

    public function showDashboard()
    {
        $totalOrganizations = User::where('usertype', 'organization')->count();
        $totalEmployee = User::where('usertype', 'employee')->count();
        $totalCourses=Course::count();
        $organization_id = Auth::user()->id;
        $employees = DB::table('users as e')
        ->select(
            'e.name as employee_name',
            'e.id as employee_id',
            'e.email as employee_email',
            'e.status as employee_status',
            'ep.address',
            'ep.post',
            'ep.experence',
            'ep.created_at',
            'ep.updated_at',
            'ep.qualification',
            'o.name as organization_name'
        )
        ->join('users as o', 'o.id', '=', 'e.reference_id')  // Join employees with organizations
        ->leftJoin('employee_profiles as ep', 'ep.user_id', '=', 'e.id')  // Join employee_profiles with users (employees)
        ->where('e.usertype', 'employee')  // Filter by user type 'employee'
        ->where('e.reference_id', '=', $organization_id)  // Ensure the employee's reference ID matches the logged-in organization ID
        ->orderBy('e.created_at', 'desc')  // Order by creation date in descending order
        ->limit(3)  // Limit the results to 3
        ->get();

        $courses = $this->getCourses();
        return view('home',compact('totalOrganizations','totalEmployee','employees','courses','totalCourses'));

        }






}
