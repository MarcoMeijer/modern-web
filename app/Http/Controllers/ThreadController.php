<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ThreadController extends Controller
{
    public function index($id)
    {
        $topic = Cache::remember("topics.threads.index.$id", 60, function () use ($id) {
            return Topic::with('threads.messages.author.profile.media')->find($id);
        });

        return view('topics.threads.index', compact('topic'));
    }

    public function show($id)
    {
        $thread = Cache::remember("threads.show.$id.thread", 60, function () use ($id) {
            return Thread::find($id);
        });

        $messages = Cache::remember("threads.show.$id.messages", 60, function () use ($id) {
            return Message::withRichText()
                ->with('author.profile.media', 'author.messages')
                ->where('thread_id', $id)
                ->get();
        });

        return view('threads.show', compact('thread', 'messages'));
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
