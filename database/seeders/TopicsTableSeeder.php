<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;

class TopicsTableSeeder extends Seeder
{

    public function run(): void
    {
        Topic::create([
            'user_id' => 1,
            'text' => 'Португалия по пенальти обыгрывает Словению', 
            'body' => 'Криштиану Роналду обязан своему вратарю, который отбил 3 пенальти',
            'is_published' => false
        ]);
        Topic::create([
            'user_id' => 5,
            'text' => 'Почему Саутгейт так труслив', 
            'body' => 'Разбираемся с трусливой игрой сборной Англии',
            'is_published' => true
        ]);
    }
}
