<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index() {
        $messages = Message::get()->all();

        return view('messagesindex', compact('messages'));
    }

    public function show(string $id): View
    {
        return view('showmessage', [
            'message' => Message::findOrFail($id)
        ]);
    }
}
