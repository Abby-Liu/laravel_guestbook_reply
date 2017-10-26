<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Message $message)
    {
        $message->comments()->create([
            'body' => $request->body,
        ]);
        return back();
    }

    public function destroy(Request $request, Comment $comment)
    {
        //$this->authorize('destroy', $message);
        $comment->delete();
        return redirect('/messages');
    }
}

?>