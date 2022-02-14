<?php

namespace Database\Seeders;

use App\Models\Tag;
use Database\Factories\VideoTagFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(10)->create();
        $tags = \App\Models\Tag::factory(10)->create();
        \App\Models\Video::factory(100)->hasAttached($tags->random(3), [], "tags")->create();
    }
}
