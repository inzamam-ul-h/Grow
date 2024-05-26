<?php

namespace App\Http\Controllers;

use App\Models\OrganizationProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index(){
        if(Auth::id()){
            $usertype=Auth::user()->usertype;
            $referencId=Auth::user()->reference_id;
            if($usertype==='employee'&& $referencId != 0){
                return view('employee.main');
            }
            else if($usertype=='admin'&& $referencId==0){
               
                return view('admin.main');
               
            }
            else if($usertype=='organization' && $referencId==0){
                $organizationProfile = OrganizationProfile::where('user_id', Auth::id())->first();

            if (!$organizationProfile || !$this->isOrganizationProfileComplete($organizationProfile)) {
                return redirect()->route('organizationProfile.store', ['user_id' => Auth::id()]);
            }

            return view('organization.main');
            }

        }
        else 
        { 
            return redirect()->back();
        }
        
    }
}
