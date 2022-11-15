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
}
