<?php

namespace App\Http\Services\User;

use App\Models\User;

class ListUserService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function __invoke(array $input)
    {
        $query = $this->user->query();

        if(isset($input['name'])) {
            $query->where('name', 'like', '%' . $input['name'] . '%');
        }

        return $query->get();
    }
}
