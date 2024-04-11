<?php

namespace App\Http\Usecases\Chat;

use App\Http\Services\Chat\SendService;

class SendUsecase
{
    protected $sendService;

    public function __construct(SendService $sendService)
    {
        $this->sendService = $sendService;
    }

    public function __invoke(array $data)
    {
        return $this->sendService->__invoke($data);
    }
}
