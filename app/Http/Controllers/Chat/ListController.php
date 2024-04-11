<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\BaseController;
use App\Http\Usecases\Chat\ListUsecase;
use Illuminate\Http\Request;

class ListController extends BaseController
{
    public function __invoke(Request $request, ListUsecase $useCase)
    {
        $data = $request->only([
            'to'
        ]);
        return $this->sendResponse($useCase->__invoke($data), 'List message');
        
    }
}
