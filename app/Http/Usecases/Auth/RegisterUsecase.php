<?php

namespace App\Http\Usecases\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\Auth\RegisterService;

class RegisterUsecase
{
    protected $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function __invoke(array $data)
    {
        // $validator = $request->all();
        return $this->registerService->__invoke($data);
    }
}
