<?php

namespace App\Http\Usecases\Message;

use App\Http\Services\Message\ListMessageService;

class ListMessageUsecase
{
    protected $listMessageService;

    public function __construct(ListMessageService $listMessageService)
    {
        $this->listMessageService = $listMessageService;
    }

    public function __invoke(array $data)
    {
        return $this->listMessageService->__invoke($data);
    }
}
