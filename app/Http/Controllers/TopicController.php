<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['user', 'latestComment'])->withCount('comments')->get();

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
        $topic = Topic::with(['user' => function ($query) {
            $query->select('id', 'name');
        }, 'comments' => function ($query) {
            $query->with('user:id,name')->latest();
        }])->findOrFail($id);

        return view('topics.show', ['topic' => $topic]);
    }
}
