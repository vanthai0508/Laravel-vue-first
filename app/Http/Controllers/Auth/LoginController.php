<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\LoginRequest;
use App\Http\Usecases\Auth\LoginUsecase;

class LoginController extends BaseController
{
    public function __invoke(LoginRequest $request, LoginUsecase $loginUsecase)
    {
        $data = $request->all();
        return $this->sendResponse($loginUsecase->__invoke($data), 'Login');
    }
}
