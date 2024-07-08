<?php 
namespace App\Actions;

use App\Models\Topic;
use App\Models\Comment;
use App\Models\User;

class ShowTopicAction {

    public function handle($id)
    {
        $topic = Topic::with([
            'user:id,name,created_at,role_id'
        ])
        ->findOrFail($id);
    
         // Пагинация комментариев
        $comments = Comment::where('topic_id', $id)
        ->with('user:id,name,created_at,role_id')
        ->paginate(10);
    
        // Id комментаторов в теме
        $userIds = $topic->comments->pluck('user_id')->unique();
    
        $users = User::select('id')
        ->whereIn('id', $userIds)
        ->withCount('comments')
        ->withCount('topics')
        ->get()
        ->keyBy('id');
        
        return compact('topic', 'users', 'comments');
    }   

}
