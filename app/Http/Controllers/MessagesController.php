<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:3|max:65536',
            'thread_id' => 'required|exists:threads,id',
        ]);

        Message::create([
            'body' => $request->body,
            'published_at' => now(),
            'author_id' => $request->user()->id,
            'thread_id' => $request->thread_id,
        ]);

        Cache::forget("threads.show.$request->thread_id.messages");

        return redirect()->route('threads.show', $request->thread_id);
    }
}
