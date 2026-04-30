<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request): RedirectResponse
    {
        $message = Message::create([
            'user_id' => $request->user()->id,
            'body' => $request->validated('body'),
        ])->load('user');

        broadcast(new MessageSent($message))->toOthers();

        return back();
    }
}
