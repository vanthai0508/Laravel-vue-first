<?php

namespace App\Http\Services\Chat;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ListService
{
    protected $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function __invoke(array $data)
    {
        return $this->message->where(function ($query) use ($data) {
            $query->where('from', Auth::user()->id)
                ->where('to', $data['to']);
            })
            ->orWhere(function ($query) use ($data) {
                $query->where('to', Auth::user()->id)
                    ->where('from', $data['to']);
            })->with('file')
            ->orderBy('created_at', 'ASC')
            ->get();
    }
}
