<?php

namespace App\Http\Services\Message;

use App\Models\Message;
use App\Models\User;

class ListMessageService
{
    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function __invoke(array $input)
    {
        $query = $this->message->query();

        // if(isset($input['name'])) {
        //     $query->where('name', 'like', '%' . $input['name'] . '%');
        // }

        return $query->get();
    }
}
