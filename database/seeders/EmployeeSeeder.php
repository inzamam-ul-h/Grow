<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  // Adjust the number of iterations as needed
        User::create([
            'name' => 'Employee User',
            'email' => 'employee123@example.com',
            'password' => Hash::make('employee123'),
            'usertype' => 'employee',
            'status'=>1,
            'reference_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Assuming you want to also create organization profiles
        DB::table('employee_profiles')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),

            'address' =>'asdasd abc',

            'post'=>'Manger',
            'qualification'=>'MS',
            'experence'=>'1 year',
            // Add more fields as needed
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}
