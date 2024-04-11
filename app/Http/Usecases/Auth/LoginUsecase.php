<?php

namespace App\Http\Usecases\Auth;

use App\Http\Services\Auth\LoginService;

class LoginUsecase
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function __invoke(array $data)
    {
        // $validator = $request->all();
        return $this->loginService->__invoke($data);
    }
}
