<?php

namespace App\Http\Controllers\File;

use App\Http\Controllers\BaseController;
use App\Http\Requests\FileRequest;
use App\Http\Usecases\File\UploadUsecase;

class UploadController extends BaseController
{
    public function __invoke(FileRequest $request, UploadUsecase $useCase)
    {
        return $this->sendResponse($useCase->__invoke($request), 'Upload');
    }
}