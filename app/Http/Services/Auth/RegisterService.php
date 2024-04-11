<?php

namespace App\Http\Services\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegisterService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function __invoke(array $input)
    {
        // $validator = Validator::make($request->all(),
        //     [
        //         'name' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required',
        //         'c_password' => 'required|same:password',
        //     ]
        // );

        // $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = $this->user->create($input);
        $success['token'] = $user->createToken('MyApp')->plainTextToken;
        $success['name'] = $user->name;
        event(new Registered($user));

        return $success;
    }
}
