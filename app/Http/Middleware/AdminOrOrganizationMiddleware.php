<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminOrOrganizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $courseId = $this->getUserCourseIds($user->id);
        if ($user->usertype == 'admin') {
            return $next($request);
        }

        if ($user->usertype == 'organization') {
            $routeName = $request->route()->getName();


            switch ($routeName) {

                case 'orgCourse.index':
                    // $courseId = $request->route('id');

                    if (!$this->courseBelongsToOrganization($user->id, $courseId)) {

                        return redirect()->back()->with('error', 'Unauthorized access to this course');
                    }


                    break;
                case 'course.show':
                    $courseId = $request->route('id');

                    if (!$this->courseBelongsToOrganization($user->id, $courseId)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this course');
                    }
                    break;

                case 'chapter.show':
                    $chapterId = $request->route('id');
                    $courseId = $request->route('cid');
                    if (!$this->courseBelongsToOrganization($user->id, $courseId) || !$this->chapterBelongsToCourse($chapterId, $courseId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this chapter');
                    }
                    break;

                case 'topic.show':
                    $topicId = $request->route('id');
                    $chapterId = $request->route('chid');
                    $courseId = $request->route('cid');
                    if (!$this->topicBelongsToChapter($topicId, $chapterId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this topic');
                    }
                    break;

                case 'lecture.show':
                    $lectureId = $request->route('id');
                    $topicId = $request->route('tid');


                    if (!$this->lectureBelongsToTopic($lectureId, $topicId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this lecture');
                    }
                    break;

                case 'assignment.show':
                    $assignmentId = $request->route('assignment_id');
                    $topicId = $request->route('topic_id');


                    if (!$this->assignmentBelongsToTopic($assignmentId, $topicId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this assignment');
                    }
                    break;



                default:
                    return redirect()->back()->with('error', 'Unauthorized access');
            }

            return $next($request);
        }

        //User Type is employee
        if ($user->usertype == 'employee' || $user->usertype == 'admin') {
            $routeName = $request->route()->getName();


            switch ($routeName) {
                case 'empCourse.index':
                    $courseId = $request->route('id');

                    if (!$this->courseBelongsToEmployee($user->id, $courseId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this course');
                    }
                    break;
                case 'course.show':
                    $courseId = $request->route('id');

                    if (!$this->courseBelongsToEmployee($user->id, $courseId)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this course');
                    }
                    break;

                case 'chapter.show':
                    $chapterId = $request->route('id');
                    $courseId = $request->route('cid');
                    if (!$this->courseBelongsToEmployee($user->id, $courseId) || !$this->chapterBelongsToCourse($chapterId, $courseId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this chapter');
                    }
                    break;

                case 'topic.show':
                    $topicId = $request->route('id');
                    $chapterId = $request->route('chid');
                    $courseId = $request->route('cid');
                    if (!$this->topicBelongsToChapter($topicId, $chapterId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this topic');
                    }
                    break;

                case 'lecture.show':
                    $lectureId = $request->route('id');
                    $topicId = $request->route('tid');


                    if (!$this->lectureBelongsToTopic($lectureId, $topicId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this lecture');
                    }
                    break;

                case 'assignment.show':
                    $assignmentId = $request->route('assignment_id');
                    $topicId = $request->route('topic_id');


                    if (!$this->assignmentBelongsToTopic($assignmentId, $topicId, $user->id)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this assignment');
                    }
                    break;

                default:
                    return redirect()->back()->with('error', 'Unauthorized access');
            }

            return $next($request);
        }

        return redirect()->back()->with('error', 'Unauthorized access');
    }






    /**
     * Check if the course belongs to the organization.
     *
     * @param  int  $userId
     * @param  int  $courseId
     * @return bool
     */

    protected function getUserCourseIds($userId)
    {
        return DB::table('organization_courses')
            ->where('user_id', $userId)->where('status', '1')
            ->pluck('course_id')
            ->toArray();
    }
    protected function courseBelongsToOrganization($userId, $courseId)
    {
        return DB::table('organization_courses')
            ->join('courses', 'organization_courses.course_id', '=', 'courses.id') // Join with courses table
            ->where('organization_courses.user_id', $userId) // Filter by user ID
            ->where('organization_courses.course_id', $courseId) // Filter by course ID
            ->where('organization_courses.status', '1') // Ensure the status in organization_courses is 1
            ->where('courses.status', '1') // Ensure the status in courses is 1
            ->exists();
    }




    protected function courseBelongsToEmployee($userId, $courseId)
    {
        return DB::table('employee_courses')
            ->where('user_id', $userId)
            ->where('course_id', $courseId)->where('status', '1')
            ->exists();
    }

    /**
     * Check if the chapter belongs to the course.
     *
     * @param  int  $chapterId
     * @param  int  $courseId
     * @return bool
     */
    protected function chapterBelongsToCourse($chapterId, $courseId, $userId)
    {
        if (auth()->user()->usertype == 'organization') {


            return DB::table('chapters')
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->where('chapters.id', $chapterId)
                ->where('chapters.course_id', $courseId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('organization_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->exists();
        } else {
            return DB::table('chapters')
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id')
                ->join('employee_courses', 'organization_courses.id', '=', 'employee_courses.course_id') // Join with the organization_courses table
                ->where('chapters.id', $chapterId)
                ->where('chapters.course_id', $courseId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('employee_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->where('employee_courses.status', '1')
                ->exists();
        }
    }

    // /**
    //  * Check if the topic belongs to the chapter.
    //  *
    //  * @param  int  $topicId
    //  * @param  int  $chapterId
    //  * @return bool
    //  */
    protected function topicBelongsToChapter($topicId, $chapterId, $userId)
    {
        if (auth()->user()->usertype == 'organization') {
            return DB::table('topics')
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table

                ->where('topics.id', $topicId)
                ->where('chapters.id', $chapterId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('organization_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->exists();
        } else {
            return DB::table('topics')
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->join('employee_courses', 'organization_courses.id', '=', 'employee_courses.course_id')
                ->where('topics.id', $topicId)
                ->where('chapters.id', $chapterId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('employee_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->where('employee_courses.status', '1')
                ->exists();
        }
    }


    protected function lectureBelongsToTopic($lectureId, $topicId, $userId)
    {
        if (auth()->user()->usertype == 'organization') {
            return DB::table('lectures')
                ->join('topics', 'lectures.topic_id', '=', 'topics.id') // Join with the topics table
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->where('lectures.id', $lectureId)
                ->where('topics.id', $topicId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('organization_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->exists();
        } else {
            return DB::table('lectures')
                ->join('topics', 'lectures.topic_id', '=', 'topics.id') // Join with the topics table
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->join('employee_courses', 'courses.id', '=', 'organization_courses.course_id')
                ->where('lectures.id', $lectureId)
                ->where('topics.id', $topicId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('employee_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->where('employee_courses.status', '1')
                ->exists();
        }
    }

    protected function assignmentBelongsToTopic($assignmentId, $topicId, $userId)
    {
        if (auth()->user()->usertype == 'organization') {
            return DB::table('assignments')
                ->join('topics', 'assignments.topic_id', '=', 'topics.id') // Join with the topics table
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->where('assignments.id', $assignmentId)
                ->where('topics.id', $topicId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('organization_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->exists();
        } else {
            return DB::table('assignments')
                ->join('topics', 'assignments.topic_id', '=', 'topics.id') // Join with the topics table
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join with the chapters table
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join with the courses table
                ->join('organization_courses', 'courses.id', '=', 'organization_courses.course_id') // Join with the organization_courses table
                ->join('employee_courses', 'courses.id', '=', 'organization_courses.course_id')
                ->where('assignments.id', $assignmentId)
                ->where('topics.id', $topicId)
                ->where('courses.status', '1') // Ensure the course status is 1
                ->where('employee_courses.user_id', $userId) // Ensure the course is associated with the user
                ->where('organization_courses.status', '1') // Ensure the organization_courses status is 1
                ->where('employee_courses.status', '1')
                ->exists();



        }
    }


}
