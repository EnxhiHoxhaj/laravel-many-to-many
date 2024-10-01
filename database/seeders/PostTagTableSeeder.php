<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 150; $i++){
            $post = Post::inRandomOrder()->first();
            $tag_id = Tag::inRandomOrder()->first()->id;
            $post->tags()->attach($tag_id);
        }
    }
}
