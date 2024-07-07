<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ],
        [
            'comment.required' => 'Текст комментария не может быть пустым'
        ]);

        if($id != $request->topic_id) {
            return redirect()->back()->withErrors(['error' => 'Отказано в доступе']);
        }

        $comment = Comment::create([
            'text' => $request->comment,
            'user_id' => Auth::id(),
            'topic_id' => $id  
        ]);

        return redirect()->back()->with('success', 'Комментарий успешно добавлен');
        
    }

    public function delete($topicId, $commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if (!$comment) {
            return redirect()->back()->withErrors(['error' => 'Комментарий не найден']);
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Комментарий успешно удален');
    }
}
