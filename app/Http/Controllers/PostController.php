<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $post = Post::create($validated);

        return redirect()->route('posts.show', $post)
            ->with('success', 'Postingan berhasil dibuat!');
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        $post->update($validated);

        return redirect()->route('posts.index')
            ->with('success', 'Postingan berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Postingan berhasil dihapus.');
    }
}
