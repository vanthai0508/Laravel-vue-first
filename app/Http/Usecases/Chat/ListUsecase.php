<?php

namespace App\Http\Usecases\Chat;

use App\Http\Services\Auth\LoginService;
use App\Http\Services\Chat\ListService;
use App\Http\Services\User\ListUserService;

class ListUsecase
{
    protected $listService;

    public function __construct(ListService $listService)
    {
        $this->listService = $listService;
    }

    public function __invoke(array $data)
    {
        return $this->listService->__invoke($data);
    }
}
