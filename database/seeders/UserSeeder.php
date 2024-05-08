<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        User::create([
            'name' => 'adm',
            'lastname' => 'adm1',
            'email' => 'adm@gmail.com',
            'phone_number' => '123456789',
            'password' => bcrypt('123'), 
            'status' => 0 /*activo*/, 
            'created_by' => null, 
        ]);
    }
}
