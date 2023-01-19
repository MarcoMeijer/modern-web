<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Thread;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ThreadController extends Controller
{
    public function index(Request $request, $id)
    {
        $topic = Cache::remember("topics.threads.index.$id.topic", 10, function () use ($id) {
            return Topic::find($id);
        });

        $page = $request->has('page') ? $request->query('page') : 1;

        $threads = Cache::remember("topics.threads.index.$id.threads.$page", 10, function () use ($id) {
            $latestMessage = DB::table('messages')
                ->select('thread_id', DB::raw('MAX(published_at) as last_published_at'))
                ->groupBy('thread_id');

            return Thread::with('firstMessage.author.profile.media', 'lastMessage')
                ->joinSub($latestMessage, 'latest_message', function ($join) {
                    $join->on('threads.id', '=', 'latest_message.thread_id');
                })
                ->orderByDesc('latest_message.last_published_at')
                ->where('topic_id', $id)
                ->paginate(5);
        });

        return view('topics.threads.index', compact('topic', 'threads'));
    }

    public function show($id)
    {
        $thread = Cache::remember("threads.show.$id.thread", 60, function () use ($id) {
            return Thread::find($id);
        });

        $messages = Cache::remember("threads.show.$id.messages", 60, function () use ($id) {
            return Message::withRichText()
                ->with('author.profile.media')
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
