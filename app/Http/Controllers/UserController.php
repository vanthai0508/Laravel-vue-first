<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {
        return DB::table('users')->get();
    }

    public function create(Request $request) 
    {
        $data = $request->only([
            'name',
            'age',
            'email',
            'from'
        ]);
        return DB::table('users')->insert($data);
    }

    public function update(int $id, Request $request) 
    {
        $data = $request->only([
            'name',
            'age',
            'email',
            'from'
        ]);
        return DB::table('users')->where('id', $id)->update($data);
    }

    public function delete(int $id) 
    {
        return DB::table('users')->where('id', $id)->delete();
    }
}
