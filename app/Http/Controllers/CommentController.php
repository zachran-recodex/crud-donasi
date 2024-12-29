<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        // Simpan komentar dengan nama pengguna
        $post->comments()->create([
            'user_name' => Auth::user()->name, // Simpan nama pengguna
            'comment' => $request->comment,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function addReaction(Request $request, Comment $comment)
    {
        $request->validate([
            'reaction' => 'required|string|max:2', // Validasi emoji (misalnya 👍, ❤️)
        ]);

        // Simpan reaksi untuk komentar
        $comment->reactions()->create([
            'reaction' => $request->reaction,
        ]);

        return redirect()->back()->with('success', 'Reaksi berhasil ditambahkan!');
    }
}
