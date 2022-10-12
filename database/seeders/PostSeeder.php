<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        for ($i = 0; $i < 30; $i++){

            $c = Category::inRandomOrder()->first();
            $title = Str::random(20);
            $posted = random_int(1, 10);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => Lorem::text(),
                'category_id' => $c->id,
                'description' => Lorem::text(50),
                'posted' => ($posted % 2 == 0) ? "yes" : "not",
            ]);
        }
    }
}
