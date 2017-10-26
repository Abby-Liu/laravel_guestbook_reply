<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Comment;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $messages = Message::all();
        return view('messages.index',
        [
            'messages' => $messages,
        ]);
    }    
    public function store(Request $request)
    {
        // 驗證
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);

        $request->user()->messages()->create([
            'body' => $request->body,
        ]);
        return redirect('messages');
    }

    // public function show(Message $message)//$id)
    // {
    //     $message->load('comments.user');
    //     return $message;
    // }

    public function edit(Message $message)
    {
        return view('messages.edit',compact('message'));
    }
    
    
    public function update(Request $request, Message $message)
    {
        $message->update([
            'body' => $request->body
        ]);
        return redirect('/messages');
    }

    public function destroy(Request $request, Message $message)
    {
        $this->authorize('destroy', $message);
        $message->delete();
        return redirect('/messages');
    }

    
}
