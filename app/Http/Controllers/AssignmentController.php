<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentSubmission;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index()
    {
    }


    public function create($id)
    {
        $topic = Topic::findOrFail($id);
        $chapter = $topic->chapter;

        return view('admin.assignments.create', compact('topic', 'chapter'));
    }


    public function store(Request $request, $id)
    {

        $topic = Topic::findOrFail($id);
        $request->validate([
            'assignment_title' => 'required', 'string', 'max:255', 'unique:assignments,assignment_name',
            'assignment_description' => 'required', 'string', 'max:255',
            'assignment_file' => 'mimes:pdf,doc,docx,txt,xlsx,xls,ppt,pptx|max:10240',
        ]);

        $assignmentFilePath = NULL;
        // Handle assignment_file upload
        if ($request->hasFile('assignment_file')) {
            $assignmentFile = $request->file('assignment_file');
            $assignmentFileName = time() . '-' . $assignmentFile->getClientOriginalName();
            $assignmentFilePath = $assignmentFile->storeAs('assignment_files', $assignmentFileName, 'public');
            // Save $assignmentFilePath to database or process as needed
        }



        $assignment = Assignment::create([
            'title' => $request->input('assignment_title'),
            'description' => $request->input('assignment_description'),
            'file' => $assignmentFilePath,
            'status' => '1', // Assuming this means 'active'
            'topic_id' => $id,
        ]);

        return redirect()->route('assignment.show', ['assignment_id' => $assignment->id, 'topic_id' => $topic->id])
            ->with('success', 'Assignment created successfully.');
    }

    public function show(string $id, $tid)
    {
        $assignment = Assignment::findOrFail($id);
        $topic = Topic::findOrFail($tid);
        $chapter = $topic->chapter;
        $course = $chapter->course;

        return view('admin.assignments.show', compact('assignment', 'topic', 'chapter', 'course'));
    }


    public function edit(string $id, $topic_id)
    {
        $assignment = Assignment::findOrFail($id);
        $topic = Topic::findOrFail($topic_id);
        return view('admin.assignments.edit', compact('assignment', 'topic',));
    }



    public function update(Request $request, $id, $topic_id)
    {

        $assignment = Assignment::findOrFail($id);
        $topic = Topic::findOrFail($topic_id);
        $request->validate([
            'assignment_title' => 'required', 'string', 'max:255', 'unique:assignments,assignment_name',
            'assignment_description' => 'required', 'string', 'max:255',
            'assignment_file' => 'mimes:pdf,doc,docx,txt,xlsx,xls,ppt,pptx|max:10240',
        ]);

        $assignmentFilePath = NULL;
        // Handle assignment_file upload
        if ($request->hasFile('assignment_file')) {
            Storage::delete('public/' . $assignment->file);
            $assignmentFile = $request->file('assignment_file');
            $assignmentFileName = time() . '-' . $assignmentFile->getClientOriginalName();
            $assignmentFilePath = $assignmentFile->storeAs('assignment_files', $assignmentFileName, 'public');
            // Save $assignmentFilePath to database or process as needed
        }


        $assignment->update([
            'title' => $request->input('assignment_title'),
            'description' => $request->input('assignment_description'),
            'file' => $assignmentFilePath,
            'status' => '1', // Assuming this means 'active'
            'topic_id' => $topic_id,
        ]);

        return redirect()->route('assignment.show', ['assignment_id' => $assignment->id, 'topic_id' => $topic->id])
            ->with('success', 'Assignment Updated successfully.');
    }

    public function assignmentSubmission(Request $request, $id)
    {
        // Find the assignment or return a 404 error if not found
        $assignment = Assignment::findOrFail($id);

        // Check if the assignment has already been submitted by this user
        $existingSubmission = AssignmentSubmission::where('assignment_id', $assignment->id)
            ->where('user_id', auth()->id())
            ->first();

        if ($existingSubmission) {
            // If an existing submission is found, return an error message
            return redirect()->back()->with('error', 'You have already submitted this assignment.');
        }

        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,txt,xlsx,xls,ppt,pptx,txt|max:10240', // 10MB max size
        ]);

        $assignmentFilePath = null;

        // Handle file upload
        if ($request->hasFile('file')) {
            $assignmentFile = $request->file('file');
            $assignmentFileName = time() . '-' . $assignmentFile->getClientOriginalName();
            // Store the file in the 'assignment_files' directory in the 'public' disk
            $assignmentFilePath = $assignmentFile->storeAs('assignment_files', $assignmentFileName, 'public');
        }

        // Create a new record in the AssignmentSubmission table
        $submission = AssignmentSubmission::create([
            'user_id' => auth()->id(),
            'file' => $assignmentFilePath,
            'status' => '1', // Assuming this indicates 'active'
            'assignment_id' => $assignment->id,
        ]);

        // Redirect back with a success message
        return redirect()->back()
            ->with('success', 'Assignment submitted successfully.');
    }







    public function getSubmittedAssignment($id)
    {
        // Find the assignment or return a 404 error if not found
        $assignment = Assignment::findOrFail($id);

        if (auth()->user()->usertype == 'admin') {
            // Fetch submissions related to the specific assignment ID
            $submissions = DB::table('assignment_submissions')
                ->join('assignments', 'assignment_submissions.assignment_id', '=', 'assignments.id')
                ->join('users as submitter', 'assignment_submissions.user_id', '=', 'submitter.id') // Join for the user who submitted
                ->join('users as parent_user', 'submitter.reference_id', '=', 'parent_user.id') // Join for the parent user
                ->join('topics', 'assignments.topic_id', '=', 'topics.id') // Join for the topic
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join for the chapter
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join for the course
                ->where('assignments.id', $id) // Filter by specific assignment ID
                ->select('assignment_submissions.*',
                'assignments.title as assignment_title',
                'submitter.name as submitter_name',
                'parent_user.name as organization_name',
                'courses.course_name as course_title')
                ->get(); // Retrieve results

            // Group submissions by organization
            $submissionsByOrganization = $submissions->groupBy('organization_name');

            return view('admin.assignments.viewSubmision', compact('submissionsByOrganization'));
        } else {
            $authUserId = auth()->id(); // Get the ID of the authenticated user

            $submissions = DB::table('assignment_submissions')
                ->join('assignments', 'assignment_submissions.assignment_id', '=', 'assignments.id')
                ->join('users as submitter', 'assignment_submissions.user_id', '=', 'submitter.id') // Join for the user who submitted
                ->join('users as parent_user', 'submitter.reference_id', '=', 'parent_user.id') // Join for the parent user
                ->join('topics', 'assignments.topic_id', '=', 'topics.id') // Join for the topic
                ->join('chapters', 'topics.chapter_id', '=', 'chapters.id') // Join for the chapter
                ->join('courses', 'chapters.course_id', '=', 'courses.id') // Join for the course
                ->where('assignments.id', $id) // Filter by specific assignment ID
                ->where('parent_user.id', $authUserId) // Filter by the authenticated user's ID
                ->select(
                    'assignment_submissions.*',
                    'assignments.title as assignment_title',
                    'submitter.name as submitter_name',
                    'parent_user.name as organization_name',
                    'courses.course_name as course_title'
                )
                ->get(); // Retrieve results
                return view('admin.assignments.orgAssignmentView', compact('submissions'));
        }
    }
}
