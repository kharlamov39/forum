<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{

    public function run(): void
    {
        Comment::create([
            'user_id' => 1,
            'topic_id' => 1,
            'text' => 'Это было великолепно', 
        ]);

        Comment::create([
            'user_id' => 5,
            'topic_id' => 2,
            'text' => 'Саутгейт аут', 
        ]);
    }
}
