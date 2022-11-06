<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChat()
    {
        return view('chat.show');
    }

    public function sendMessage(Request $request){


        broadcast(new MessageSent($request->user, $request->message));

        return "broadcast";
    }
}
