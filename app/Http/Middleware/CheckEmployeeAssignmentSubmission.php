<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeAssignmentSubmission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if ($user->usertype !== 'employee') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $assignmentId = $request->input('assignment_id');

        $isValid = DB::table('assignments')
            ->join('topics', 'assignments.topic_id', '=', 'topics.id')
            ->join('chapters', 'topics.chapter_id', '=', 'chapters.id')
            ->join('courses', 'chapters.course_id', '=', 'courses.id')
            ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id')
            ->join('employee_courses', 'courses.id', '=', 'employee_courses.course_id')
            ->join('users as parent_user', 'parent_user.id', '=', 'organization_courses.user_id')
            ->where('assignments.id', $assignmentId)
            ->where('assignments.status', '1') // Assignment status must be 1
            ->where('courses.status', '1') // Course status must be 1
            ->where('employee_courses.user_id', $user->id) // Employee user ID must match
            ->where('employee_courses.status', '1') // Employee_courses status must be 1
          //  ->where('parent_user.id', $user->reference_id) // Reference ID must match the parent user ID
            ->exists();


        if (!$isValid) {
            return response()->json(['error' => 'Invalid submission. Conditions not met.'], 403);
        }

        return $next($request);
    }
}
