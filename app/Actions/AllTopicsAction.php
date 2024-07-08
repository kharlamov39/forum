<?php 
namespace App\Actions;

use App\Models\Topic;
use App\Models\Comment;

class AllTopicsAction {

    public function handle()
    {
        // Подзапрос для получения ID самого последнего комментария каждой темы
        $latestCommentIdSubquery = Comment::select('id')
        ->whereColumn('topic_id', 'topics.id')
        ->latest('id')
        ->limit(1);

        // Основной запрос с присоединением подзапроса и сортировкой
        $topics = Topic::with(['user:id,name', 'latestComment'])
            ->withCount('comments')
            ->addSelect(['latest_comment_id' => $latestCommentIdSubquery])
            ->orderByDesc('latest_comment_id')
            ->get();
        
        return compact('topics');
    }   

}
