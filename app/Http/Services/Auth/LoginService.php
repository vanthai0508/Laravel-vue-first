<?php

namespace App\Http\Services\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class LoginService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function __invoke(array $input)
    {
       // Check email exist
       $user = $this->user->where('email', $input['email'])->first();

       // Check password
       if(!$user || !Hash::check($input['password'], $user->password)) {
            throw new BadRequestException('Sai thong tin dang nhap !!!');
       }

       $data['token'] = $user->createToken($input['email'])->plainTextToken;
       $data['user'] = $user;

        return $data;
    }
}
