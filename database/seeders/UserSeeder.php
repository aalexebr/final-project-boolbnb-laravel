<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\User;

// Helpers
use Illuminate\Support\Facades\Hash;

// facades
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Alessio',
                'last_name' => 'Vietri',
                'date_of_birth' => '1991-08-13',
                'email' => 'alessio@boolean.careers',
                'password' => 'password'
            ],
            [
                'name' => 'Michela',
                'last_name' => 'de stefano',
                'date_of_birth' => '1991-08-13',
                'email' => 'michela@boolean.careers',
                'password' => 'password'
            ],
        ];


        
        Schema::withoutForeignKeyConstraints(function(){
            User::truncate();
        });

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'last_name' => $user['last_name'],
                'date_of_birth' => $user['date_of_birth'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}