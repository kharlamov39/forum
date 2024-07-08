<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Actions\ShowTopicAction;

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
        $action = new ShowTopicAction();
        $data = $action->handle($id);
        
        return view('topics.show', [
            'topic' => $data['topic'], 
            'users' => $data['users'], 
            'comments' => $data['comments']
        ]);
    }
}
