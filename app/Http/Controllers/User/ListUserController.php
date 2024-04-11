<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Usecases\User\ListUserUsecase;
use Illuminate\Http\Request;

class ListUserController extends BaseController
{
    public function __invoke(Request $request, ListUserUsecase $useCase)
    {
        // dd($request);
        $data = $request->only([
            'name'
        ]);
        return $this->sendResponse($useCase->__invoke($data), 'List user');
    }
}