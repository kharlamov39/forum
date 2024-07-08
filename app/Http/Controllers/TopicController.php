<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Actions\ShowTopicAction;
use App\Actions\AllTopicsAction;

class TopicController extends Controller
{
    public function index()
    {
       $action = new AllTopicsAction();
       $data = $action->handle();
    
        return view('topics.index', [
            'topics' => $data['topics']
        ]);
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
