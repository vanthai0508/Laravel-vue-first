<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\BaseController;
use App\Http\Usecases\Chat\SendUsecase;
use Illuminate\Http\Request;

class SendController extends BaseController
{
    public function __invoke(Request $request, SendUsecase $useCase)
    {

        $data = $request->only([
            'text', 'to', 'file_id'
        ]);

        return $this->sendResponse($useCase->__invoke($data), 'Send message');
    }
}