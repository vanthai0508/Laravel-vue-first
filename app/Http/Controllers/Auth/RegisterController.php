<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\RegisterRequest;
use App\Http\Usecases\Auth\RegisterUsecase;

class RegisterController extends BaseController
{
    public function __invoke(RegisterRequest $request, RegisterUsecase $registerUsecase)
    {
        
        $data = $request->all();
        return $this->sendResponse($registerUsecase->__invoke($data), 'Register');
    }
}
