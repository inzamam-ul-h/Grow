<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{



    public function toggleStatus($id)
    {
        $employees = User::findOrFail($id);
        $employees->status = $employees->status == '0' ? '1' : '0';
        $employees->save();

        return response()->json(['status' => $employees->status, 'success' => 'Employee status updated successfully.']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user = Auth::user();

        if ($user->usertype == 'admin') {
            //employees
            $employees = DB::table('users as e')
                ->select('e.name as employee_name',
                'e.id as employee_id',
                'e.email as employee_email',
                'e.status as employee_status',
                'ep.address', 'ep.post',
                'ep.experence',
                'ep.updated_at',
                'ep.created_at',
                'ep.qualification',
                'o.name as organization_name')
                ->join('users as o', 'o.id', '=', 'e.reference_id')
                ->leftJoin('employee_profiles as ep', 'ep.user_id', '=', 'e.id')
                ->where('e.usertype', 'employee')
                ->whereNULL('e.deleted_at')
                ->get();

          return view('user.index', compact('employees'));
        }
        elseif ($user->usertype == 'organization') {
            $organization_id = Auth::user()->id;
            $employees =  DB::table('users as e')
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
                 ->whereNull('e.deleted_at')
                ->get();

            return view('user.index', compact('employees'));
        } else {
            // Handle other user types or provide a default action
            // return redirect()->route('home');
        }


    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = User::where('usertype', 'organization')->get();
        return view('user.create', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post' => ['required', 'string', 'max:255'],
            'experence' => ['required', 'string', 'max:255'],
            'qulification' => ['required', 'string', 'max:255'],
            'address'=>['required','string','max:255']
        ]);

        //check user email is already exsist
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput($request->all())->with('error', 'The email address is already in use.');
        }

        // Create a new User record
        if (auth()->user()->usertype == 'admin') {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => 'employee',
                'reference_id' => $request->organization_id,
                'status' => '0',
            ]);
        } else
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => 'employee',
                'status' => '1',
                'reference_id' => Auth::id(),
            ]);



        // Create a new Employee Profile associated with the user
        $employeeProfile = EmployeeProfile::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'post' => $request->post,
            'qualification' => $request->qulification,
            'experence' => $request->experence,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('user.show', ['id' => $user->id])
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userid = User::find($id);
        if($userid==null){
            return redirect()->back();
        }
        else
        try {

            $employee = User::join('employee_profiles', 'users.id', '=', 'employee_profiles.user_id')
                ->join('organization_profiles', 'users.reference_id', '=', 'organization_profiles.user_id')
                ->where('users.id', $id)
                ->where('users.usertype', 'employee')
                ->select('users.*', 'employee_profiles.*', 'organization_profiles.*')
                ->firstOrFail();

            return view('user.show', compact('employee','userid'));
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userid = User::find($id);
        if($userid==null){
            return redirect()->back();
        }
        else
        $organizations = User::where('usertype', 'organization')->get();

        try {

            $user = User::join('employee_profiles', 'users.id', '=', 'employee_profiles.user_id')
                ->where('users.id', $id)
                ->where('users.usertype', 'employee')
                ->select('users.*', 'employee_profiles.*')
                ->firstOrFail();

            return view('user.edit', compact('user', 'userid', 'organizations'));
        } catch (ModelNotFoundException $e) {

            return redirect()->back()->with('error', 'Employee not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        // Validate the incoming request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255'],
            'post' => ['required', 'string', 'max:255'],
            'experence' => ['required', 'string', 'max:255'],
            'qualification' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        // Find the user with the given ID and usertype 'employee'
        $user = User::where('id', $id)
            ->where('usertype', 'employee')
            ->firstOrFail();

        // Update the user's name and email
        if (auth()->user()->usertype == 'admin') {
            $user->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'reference_id' => $request->organization_id,
                'updated_by' => Auth::id(),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                // 'email' => $request->email,
                'updated_by' => Auth::id(),
            ]);
        }

        // Find the employee profile associated with the user
        $employeeProfile = EmployeeProfile::where('user_id', $id)->firstOrFail();

        // Update the employee profile details
        $employeeProfile->update([
            'address' => $request->address,
            'post' => $request->post,
            'qualification' => $request->qualification,
            'experence' => $request->experence,

        ]);

        // Redirect to the show route with a success message
        return redirect()->route('user.show', $user->id)->with('success', 'Employee updated successfully.');
    }















    /**
     * Remove the specified resource from storage.
     */



    public function trash()
    {

        {
            $user = Auth::user();

            if ($user->usertype == 'admin') {
                //employees
                $employees = DB::table('users as e')
                    ->select('e.name as employee_name',
                    'e.id as employee_id',
                    'e.email as employee_email',
                    'e.status as employee_status',
                    'ep.address',
                    'ep.post', 'ep.experence',
                    'ep.created_at',
                    'ep.qualification',
                    'o.name as organization_name')
                    ->join('users as o', 'o.id', '=', 'e.reference_id')
                    ->leftJoin('employee_profiles as ep', 'ep.user_id', '=', 'e.id')
                    ->where('e.usertype', 'employee')
                    ->whereNotNull('e.deleted_at')
                    ->get();

                return view('user.usertrash', compact('employees'));
            }
             elseif ($user->usertype == 'organization') {
                $organization_id = Auth::user()->id;
                $employees =  DB::table('users as e')
                    ->select(
                        'e.name as employee_name',
                        'e.id as employee_id',
                        'e.email as employee_email',
                        'e.status as employee_status',
                        'ep.address',
                        'ep.post',
                        'ep.experence',
                        'ep.created_at',
                        'ep.qualification',
                        'o.name as organization_name'
                    )
                    ->join('users as o', 'o.id', '=', 'e.reference_id')  // Join employees with organizations
                    ->leftJoin('employee_profiles as ep', 'ep.user_id', '=', 'e.id')  // Join employee_profiles with users (employees)
                    ->where('e.usertype', 'employee')  // Filter by user type 'employee'
                    ->where('e.reference_id', '=', $organization_id)  // Ensure the employee's reference ID matches the logged-in organization ID
                    ->whereNotNull('e.deleted_at')
                    ->get();

                return view('user.usertrash', compact('employees'));
            } else {
                // Handle other user types or provide a default action
                // return redirect()->route('home');
            }
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->employeeProfile) {
            $user->employeeProfile->delete();
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Employee soft deleted successfully.');
    }

//this function in not use any where

    // public function delete(string $id)
    // {
    //     $user = User::find($id);
    //     if ($user == NUll) {
    //         return redirect()->back()->with('error', "User Not Found");
    //     } else {

    //         $user->forceDelete();
    //         return redirect()->back()->with('success', "User remove to trash successfully ");
    //     }
    // }


    public function restore(string $id)
    {
        $user = User::withTrashed()->find($id);
        if ($id == NUll) {
            return redirect()->back()->with('error', "User Not Found");
        } else {

            $user->restore();
                 // Restore related employee profile if exists
            $employeeProfile = EmployeeProfile::withTrashed()
            ->where('user_id', $user->id)
            ->first();

        if ($employeeProfile) {
            $employeeProfile->restore();
        }


            return redirect()->back()->with('success', "User data restored successfully ");
        }
    }
}
