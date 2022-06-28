<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Thread;
use Egulias\EmailValidator\Warning\Comment as WarningComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Thread $thread, Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:512'
        ]);

        $thread->comments()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['store']);
    }

    public function comment_destroy(Comment $comment)
    {
        //自分にしか削除できない
        $this->authorize('delete', $comment);
        //削除
        $comment->delete();

        return back();
    }   
}
