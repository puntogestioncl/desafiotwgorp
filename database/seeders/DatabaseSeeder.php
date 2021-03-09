<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Publication::factory(50)->create();
        Comment::factory(100)->create();
    }
}
