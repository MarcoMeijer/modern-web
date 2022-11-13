<?php

namespace App\Http\Controllers;

use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();

        return view('topics.index', compact('topics'));
    }

    public function show($id)
    {
        $topic = Topic::find($id);

        return view('topics.show', compact('topic'));
    }
}