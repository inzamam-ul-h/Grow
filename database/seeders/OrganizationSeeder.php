<?php

namespace Database\Seeders;

use App\Models\OrganizationProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


         {  // Adjust the number of iterations as needed
            User::create([
                'name' => 'Organization User',
                'email' => 'Organization123@example.com',
                'password' => Hash::make('organization123'),
                'usertype' => 'organization',
                'reference_id' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            // Assuming you want to also create organization profiles
            DB::table('organization_profiles')->insert([
                'user_id' => DB::getPdo()->lastInsertId(),

                'address' =>"asdasd abc",
                'contact' => "03242384412",
                'register_no'=>"uweiy7e",
                // Add more fields as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
