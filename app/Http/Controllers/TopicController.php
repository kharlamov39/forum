<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with(['user', 'latestComment'])->withCount('comments')->get();

        return view('topics.index', ['topics' => $topics]);
    }
}
