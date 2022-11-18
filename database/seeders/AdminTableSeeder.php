<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        
        Admin::create(['name' => 'Admin',
                      'email' => 'admin@app.com', 
                      'password' => '123456789',
                      'mobile' => '01201201201'  
                    ]);
        
    }
}
