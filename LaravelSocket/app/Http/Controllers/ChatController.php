<?php

namespace App\Http\Controllers;

use App\Events\GreetingSent;
use App\Events\MessageSent;
use App\User;
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

    public function greetReceived(Request $request, User $user){

        broadcast(new GreetingSent($user->id,"{$request->user-> name} greeted you"));
        broadcast(new GreetingSent($request->user->id,"You Greeted {$user->name}"));

        return "Greeting {$user->name}";
    }
}
