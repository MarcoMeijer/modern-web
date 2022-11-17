<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

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
            'author_id' => 1, // todo: put in the id of the current logged in user
            'thread_id' => $request->thread_id,
        ]);

        return redirect()->route('threads.show', $request->thread_id);
    }
}
