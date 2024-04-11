<?php

namespace App\Http\Usecases\File;

use App\Http\Services\File\UploadService;

class UploadUsecase
{
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    public function __invoke($data)
    {
        // $validator = $request->all();
        return $this->uploadService->__invoke($data);
    }
}
