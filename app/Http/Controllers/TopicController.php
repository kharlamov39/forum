<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['user:id,name', 'latestComment'])->withCount('comments')->get();

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
            'user:id,name,created_at,role_id', 
            'comments.user:id,name,created_at,role_id'
        ])
        ->findOrFail($id);

        return view('topics.show', ['topic' => $topic]);
    }
}
