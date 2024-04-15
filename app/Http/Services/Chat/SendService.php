<?php

namespace App\Http\Services\Chat;

use App\Events\MessagePosted;
use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class SendService
{
    protected $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function __invoke(array $data)
    {
        $user = Auth::user();
        $data['from'] = $user->id;
        $infoSend = [
            'from'=> $user->id,
            'to' => (int)$data['to']
        ];

        $message = $this->message->create($data)->toArray();
        $result = Message::where('id', $message['id'])->with('file')->first();
        broadcast(new MessagePosted($infoSend, $result))->toOthers();

        return $result;
    }
}
