<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index($id)
    {
        $topic = Topic::with('threads.messages.author.profile.media')->find($id);

        return view('topics.threads.index', compact('topic'));
    }

    public function show($id)
    {
        $thread = Thread::with('messages.author.profile.media', 'messages.author.messages')->find($id);

        return view('threads.show', compact('thread'));
    }

    public function create($id)
    {
        $topic = Topic::find($id);

        return view('threads.create', compact('topic'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:65536',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $thread = Thread::create([
            'title' => $request->title,
            'topic_id' => $request->topic_id,
        ]);

        Message::create([
            'body' => $request->body,
            'published_at' => now(),
            'author_id' => $request->user()->id,
            'thread_id' => $thread->id,
        ]);

        return redirect()->route('topics.threads.index', $request->topic_id);
    }
}
