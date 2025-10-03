<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Show all posts
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Show create form
    public function create() {
        return view('posts.create');
    }

    // Store new post
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    // Show single post
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}
