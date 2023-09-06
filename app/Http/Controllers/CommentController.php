<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::get();

        return view('comments.index', ['comments' => $comments]);
    }

    public function store(CommentRequest $request)
    {

    }
}
