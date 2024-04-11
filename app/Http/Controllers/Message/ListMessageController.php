<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\BaseController;
use App\Http\Usecases\Message\ListMessageUsecase;
use Illuminate\Http\Request;

class ListMessageController extends BaseController
{
    public function __invoke(Request $request, ListMessageUsecase $useCase)
    {
        // dd($request);
        $data = $request->all();
        return $this->sendResponse($useCase->__invoke($data), 'Upload');
    }
}