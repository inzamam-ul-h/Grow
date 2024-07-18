<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\OrganizationProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */




     public function index(){

     }




    public function create(){
        return view('user.organization.orgprofile');
    }


     public function store(Request $request){


         $existingOrgProfile = OrganizationProfile::where('user_id', Auth::id())->first();

         // Validate the request
         $request->validate([
             'address' => ['required', 'string', 'max:255'],
             'contact' => ['required', 'string', 'max:11'],
             'register_no' => ['required'],
         ]);



         if ($existingOrgProfile) {
             // Redirect to the page to view or edit existing organization profile
             return redirect()->route('organizationProfile.store', $existingOrgProfile)
                              ->with('error', 'You already have an organization profile.');
         }
         else
         // Create a new OrganizationProfile
         $orgProfile = OrganizationProfile::create([
             'user_id' => Auth::id(),
             'address' => $request->address,
             'contact' => $request->contact,
             'register_no' => $request->register_no,
         ]);


         // Redirect to the organization profile page with success message
         return redirect()->route('organizationProfile.store', $orgProfile)
                          ->with('success', 'Organization Profile details added successfully.');
     }



}
