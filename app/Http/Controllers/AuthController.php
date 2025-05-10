<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequst;
use App\Models\Branch;
use App\Models\Governorate;
use App\Models\Role;
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
            $role=Role::all()->where('id',$user['role_id'])->first();
            $user['role']=$role;
            $branch=Branch::all()->where('id',$user['branch_id'])->first();
            $user['branch']=$branch;
            $Governorate=Governorate::all()->where('id',$user['governorate_id'])->first();
            $user['governorate']=$Governorate;
        }
        return $user;
    }
}
