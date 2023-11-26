<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::where('username', 'superadmin')->first();

        if (is_null($admin)) {
            $admin           = new User();
            $admin->name     = "Super Admin";
            $admin->email    = "superadmin@example.com";
            $admin->username = "superadmin";
            $admin->password = Hash::make('12341234');
            $admin->save();
        }
    }
}
