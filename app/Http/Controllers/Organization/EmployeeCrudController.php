<?php

namespace App\Http\Controllers\Organization;

    use App\Http\Controllers\Controller;
    use App\Models\EmployeeProfile;
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;

class EmployeeCrudController extends Controller
{
   

        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return view('organization.EmployeCrud.create');
        }
    
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            //
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
            ]);
            
        //check user email is already exsist 
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput($request->all())->with('error', 'The email address is already in use.');
        }

            // Create a new User record
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'usertype' => 'employee',
                'reference_id'=>Auth::id(),
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
            
            return redirect()->back()
                             ->with('success', 'Employee created successfully.');
        }
    
        /**
         * Display the specified resource.
         */
        public function show(EmployeeProfile $employeeProfile)
        {
            return view('organization.employee', compact('employeeProfile'));
        }
    
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            //
        }
    
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            //
        }
    
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
    