<?php

namespace App\Http\Usecases\User;

use App\Http\Services\Auth\LoginService;
use App\Http\Services\User\ListUserService;

class ListUserUsecase
{
    protected $listUserService;

    public function __construct(ListUserService $listUserService)
    {
        $this->listUserService = $listUserService;
    }

    public function __invoke(array $data)
    {
        return $this->listUserService->__invoke($data);
    }
}
