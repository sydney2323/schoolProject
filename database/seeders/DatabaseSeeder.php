<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
		    'staff_id' => 99,
		    'f_name' => 'Super',
		    'l_name' => 'Admin',
		    'email' => 'admin2023@gmail.com',
            'contact' => '0789968024',
            'is_admin' => 3,
		    'password' => \Illuminate\Support\Facades\Hash::make('@@call2323'),
	    ]);
    }
}
