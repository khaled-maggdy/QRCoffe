<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequst;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function login(LoginRequst $request){
        $request = $request->validated();
        $login =  Auth::attempt($request);
        if($login){
            $user = Auth::user();
            $token = $user->createToken('khaled')->plainTextToken;
            $user['token'] = $token;
        }
        return $user;
    }
}
