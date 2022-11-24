<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::with('threads.messages.author.profile.media', 'messages')->get();

        return view('topics.index', compact('topics'));
    }
}
