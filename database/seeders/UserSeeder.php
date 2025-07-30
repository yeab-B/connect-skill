<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        User::factory()->count(3)->create()->each(function ($user) {
            $user->assignRole('admin');
        });

        User::factory()->count(3)->create()->each(function ($user) {
            $user->assignRole('teacher');
        });

        User::factory()->count(4)->create()->each(function ($user) {
            $user->assignRole('learner');
        });
    }
}
