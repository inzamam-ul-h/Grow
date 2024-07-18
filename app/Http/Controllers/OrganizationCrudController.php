<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganizationCrudController extends Controller
{

    public function toggleStatus($id)
    {
        $organization = User::findOrFail($id);
        $organization->status = $organization->status == '0' ? '1' : '0';
        $organization->save();

        return response()->json(['status' => $organization->status, 'success' => 'Organization status updated successfully.']);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $organizations = DB::table('users as o')
            ->select(
                'o.name as organization_name',
                'o.id as organization_id',
                'o.email as organization_email',
                'updated_by_user.name as updated_by_name',
                'o.status',
                'op.address',
                'op.register_no',
                'op.updated_at',
                'op.created_at',
                'op.contact',
            )
            ->leftJoin('organization_profiles as op', 'op.user_id', '=', 'o.id')
            ->leftJoin('users as updated_by_user', 'o.updated_by', '=', 'updated_by_user.id')
            ->where('o.usertype', 'organization')
            ->whereNull('o.deleted_at')
            ->get();

        return view('user.organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:11'],
            'register_no' => ['required', 'unique:organization_Profiles,register_no'],
        ]);


        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput($request->all())->with('error', 'The email address is already in use.');
        }

        // Create a new User record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'organization',
            'reference_id' => '0',
        ]);


        $orgProfile = OrganizationProfile::create([
            'user_id' => $user->id,
            'address' => $request->address,
            'contact' => $request->contact,
            'register_no' => $request->register_no,
        ]);

        return redirect()->route('organization.show', ['id' => $user->id])
            ->with('success', 'Organization created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userid = User::find($id);
        if($userid==Null){
            return redirect()->back()->with('error', 'Employee not found.');
        }else
        try {

            $organization = User::join('organization_profiles', 'users.id', '=', 'organization_profiles.user_id')
                ->where('users.id', $id)
                ->where('users.usertype', 'organization')
                ->select('users.*', 'organization_profiles.*')
                ->firstOrFail();

            return view('user.organization.show', compact('organization','userid'));
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
            return redirect()->back()->with('error', 'organization not found.');
        }
        else

        try {

            $user = User::join('organization_profiles', 'users.id', '=', 'organization_profiles.user_id')
                ->where('users.id', $id)
                ->where('users.usertype', 'organization')
                ->select('users.*', 'organization_profiles.*')
                ->firstOrFail();

            return view('user.organization.edit', compact('user', 'userid'));
        } catch (ModelNotFoundException $e) {

            return redirect()->back()->with('error', 'Organization not found.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255',],
            //'password' => Hash::make($request->password),
            'address' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:11'],
            'register_no' => ['required'],

        ]);

        // Find the user with the given ID and usertype 'organization'
        $user = User::where('id', $id)
            ->where('usertype', 'organization')
            ->firstOrFail();


        // Update the user's name and email
        $user->update([
            'name' => $request->name,
            // 'email' => $request->email,
            'updated_by' => Auth::id(),
        ]);


        // Find the employee profile associated with the user
        $organizationProfile = OrganizationProfile::where('user_id', $id)->firstOrFail();

        // Update the employee profile details
        $organizationProfile->update([
            'address' => $request->address,
            'contact' => $request->contact,
            'register_no' => $request->register_no,
            'updated_by' => Auth::id(),
        ]);
        return redirect()->route('organization.show', $user->id)->with('success', 'Organization updated successfully.');
    }




    /**
     * Remove the specified resource from storage.
     */






     public function destroy($id)
     {
         $organization = User::find($id);
         if($organization==Null){
            return redirect()->back()->with('error', 'Organization Not Found.');
         }
         else
         $organization->delete();

         return redirect()->route('organization.index')->with('success', 'Organization soft deleted successfully.');
     }


      public function trash()
      {

        $organizations = DB::table('users as o')
        ->select(
            'o.name as organization_name',
            'o.id as organization_id',
            'o.email as organization_email',
            'updated_by_user.name as updated_by_name',
            'o.status',
            'op.address',
            'op.register_no',
            'op.updated_at',
            'op.created_at',
            'op.contact',
        )
        ->leftJoin('organization_profiles as op', 'op.user_id', '=', 'o.id')
        ->leftJoin('users as updated_by_user', 'o.updated_by', '=', 'updated_by_user.id')
        ->where('o.usertype', 'organization')
        ->whereNotNull('o.deleted_at')
        ->get();

    return view('user.organization.orgTrash', compact('organizations'));

          }




     public function restore(string $id)
     {
        $organization = User::withTrashed()->find($id);
         if ($id == NUll) {
             return redirect()->back()->with('error', "Organization Not Found");
         } else {

            $organization->restore();


             return redirect()->back()->with('success', "Organization data restored successfully ");
         }
     }
}
