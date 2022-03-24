<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'emp_id'=>0,
        	'full_name'=>'Admin',
        	'email'=>'admin@tihan.com',
        	'password'=>Hash::make('Admin@123'),
        	'contact_no'=>0,
        	'institute'=>null,
        	'department'=>null,
        	'first_manager'=>0,
        	'second_manager'=>0,
        	'leave_balance'=>0,
        	'admin_rights'=>1,
        	'created_at'=>Carbon::now()->toDateTimeString(),
        	'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
    }
}
