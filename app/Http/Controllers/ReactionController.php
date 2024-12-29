<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'reaction' => 'required|string',
        ]);

        $comment->reactions()->create([
            'reaction' => $request->reaction,
        ]);

        return redirect()->back()->with('success', 'Reaksi berhasil ditambahkan!');
    }

}
