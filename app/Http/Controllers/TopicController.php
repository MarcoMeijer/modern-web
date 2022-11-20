<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('threads', 'threads.messages', 'messages')->get();

        return view('topics.index', compact('topics'));
    }
}
