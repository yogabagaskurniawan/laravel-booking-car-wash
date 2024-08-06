<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->email = 'admin@example.com';
        $admin->password = Hash::make('admin123');
        $admin->name = 'admin';
        $admin->save();
    }
}
