<?php

namespace Database\Seeders;

use App\Models\UsersProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersProfile::factory()->count(10)->create();
    }
}
