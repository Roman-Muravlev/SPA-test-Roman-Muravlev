<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Services\FileService;
use App\Models\Comment;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index()
    {
        $comments = Comment::get();

        return view('comments.index', ['comments' => $comments]);
    }

    public function store(CommentRequest $request)
    {
        $data = $request->validated();
        $user = User::firstOrCreate(['email' => $data['email']], [
            'name' => $data['name'],
            'password' => bcrypt(Str::random(8))
        ]);
        $comment = Comment::create([
            'user_id' => $user->id,
            'text' => $data['text'],
            'url' => $data['url'],
            'parent_id' => $data['parent_id'],
        ]);

        if (!empty($data['file'])) {
            $comment->commentFile()->create([
                'file' => $this->fileService->saveStorage($request,$comment)
            ]);
        }

        return redirect()->route('comments.index');
    }
}
