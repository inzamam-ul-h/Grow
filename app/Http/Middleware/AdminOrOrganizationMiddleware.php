<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminOrOrganizationMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if ($user->usertype == 'admin') {
            return $next($request);
        }

        if ($user->usertype == 'organization') {
            $routeName = $request->route()->getName();


            switch ($routeName) {
                case 'orgCourse.index':
                    $courseId = $request->route('id');

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
                    if (!$this->courseBelongsToOrganization($user->id, $courseId) || !$this->chapterBelongsToCourse($chapterId, $courseId)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this chapter');
                    }
                    break;

                    case 'topic.show':
                        $topicId = $request->route('id');
                        $chapterId = $request->route('chid');
                        $courseId = $request->route('cid');
                        if (!$this->topicBelongsToChapter($topicId, $chapterId)) {
                            return redirect()->back()->with('error', 'Unauthorized access to this topic');
                        }
                        break;

                        case 'lecture.show':
                            $lectureId = $request->route('id');
                            $topicId = $request->route('tid');


                            if (!$this->lectureBelongsToTopic($lectureId, $topicId)) {
                                return redirect()->back()->with('error', 'Unauthorized access to this lecture');
                            }
                            break;

                default:
                    return redirect()->back()->with('error', 'Unauthorized access');
            }

            return $next($request);
        }

  //User Type is employee
        if ($user->usertype == 'employee'||$user->usertype=='admin') {
            $routeName = $request->route()->getName();


            switch ($routeName) {
                case 'empCourse.index':
                    $courseId = $request->route('id');

                    if (!$this->courseBelongsToEmployee($user->id, $courseId)) {
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
                    if (!$this->courseBelongsToEmployee($user->id, $courseId) || !$this->chapterBelongsToCourse($chapterId, $courseId)) {
                        return redirect()->back()->with('error', 'Unauthorized access to this chapter');
                    }
                    break;

                    case 'topic.show':
                        $topicId = $request->route('id');
                        $chapterId = $request->route('chid');
                        $courseId = $request->route('cid');
                        if (!$this->topicBelongsToChapter($topicId, $chapterId)) {
                            return redirect()->back()->with('error', 'Unauthorized access to this topic');
                        }
                        break;

                        case 'lecture.show':
                            $lectureId = $request->route('id');
                            $topicId = $request->route('tid');


                            if (!$this->lectureBelongsToTopic($lectureId, $topicId)) {
                                return redirect()->back()->with('error', 'Unauthorized access to this lecture');
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
    protected function courseBelongsToOrganization($userId, $courseId)
    {
        return DB::table('organization_courses')
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->exists();
    }


    protected function courseBelongsToEmployee($userId, $courseId)
    {
        return DB::table('employee_courses')
            ->where('user_id', $userId)
            ->where('course_id', $courseId)
            ->exists();
    }

    /**
     * Check if the chapter belongs to the course.
     *
     * @param  int  $chapterId
     * @param  int  $courseId
     * @return bool
     */
    protected function chapterBelongsToCourse($chapterId, $courseId)
    {
        return DB::table('chapters')
            ->where('id', $chapterId)
            ->where('course_id', $courseId)
            ->exists();
    }

    // /**
    //  * Check if the topic belongs to the chapter.
    //  *
    //  * @param  int  $topicId
    //  * @param  int  $chapterId
    //  * @return bool
    //  */
    protected function topicBelongsToChapter($topicId, $chapterId)
    {
        return DB::table('topics')
            ->where('id', $topicId)
            ->where('chapter_id', $chapterId)
            ->exists();
    }


    protected function lectureBelongsToTopic($lectureId,$topicId)
    {
        return DB::table('lectures')
            ->where('id', $lectureId)
            ->where('topic_id', $topicId)
            ->exists();
    }

    }

