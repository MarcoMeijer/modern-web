<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Cache::remember('topics.index', 60, function () {
            return Topic::with('threads.messages', 'lastThread.messages.author.profile.media', 'messages')->get();
        });

        return view('topics.index', compact('topics'));
    }

    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        Topic::create($validated);

        Cache::forget('topics.index');

        return redirect()->route('topics.index');
    }

    public function destroy(Request $request, $id)
    {
        $topic = Topic::find($id);

        $request->validateWithBag("topicDeletion.$topic->id", [
            'topic' => ['required', "in:$topic->name"],
        ]);

        Topic::find($id)->delete();
        Cache::forget("topics.index");

        return redirect()->route('topics.index');
    }
}
