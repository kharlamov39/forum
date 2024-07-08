<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
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

        return view('topics.index', ['topics' => $topics]);
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        // \Log::info($request->all());

        $request->validate([
            'text' => 'required',
            'body' => 'required',
        ], 
        [
            'text.required' => 'Укажите название вашей темы',
            'body.required' => 'Создайте описание темы',
        ]
        );

        $topic = Topic::create([
            'text' => $request->text,
            'body' => $request->body,
            'is_published' => false,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('topics.index')->with('success', 'Ваша тема будет опубликована после проверки администратором.');
    }

    public function show($id)
    {

        $topic = Topic::with([
            'user:id,name,created_at,role_id'
        ])
        ->findOrFail($id);

         // Пагинация комментариев
        $comments = Comment::where('topic_id', $id)
        ->with('user:id,name,created_at,role_id')
        ->paginate(10);

        $userIds = $topic->comments->pluck('user_id')->unique();

        
        $users = User::select('id')
        ->whereIn('id', $userIds)
        ->withCount('comments')
        ->withCount('topics')
        ->get()
        ->keyBy('id');
        
        return view('topics.show', ['topic' => $topic, 'users' => $users, 'comments' => $comments]);
    }
}
