<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($id)
    {
        $topic = Topic::find($id);

        return view('topics.posts.index', compact('topic'));
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function create($id)
    {
        $topic = Topic::find($id);

        return view('posts.create', compact('topic'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:65536',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'topic_id' => $request->topic_id,
        ]);

        Comment::create([
            'body' => $request->body,
            'published_at' => now(),
            'author_id' => 1, // todo: put in the id of the current logged in user
            'post_id' => $post->id,
        ]);

        return redirect()->route('topics.posts.index', $request->topic_id);
    }
}
