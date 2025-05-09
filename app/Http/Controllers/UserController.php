<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreWhereGovernorate;
use App\Http\Requests\WherebranchRequest;
use App\Http\Requests\WhereRoleRequest;
use App\Models\Branch;
use App\Models\Governorate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( StoreUserRequest $request,WhereRoleRequest $role,WherebranchRequest $branch,StoreWhereGovernorate $Governorate)
    {
    $request=$request->validated();
    $request['password']=Hash::make($request['password']);


    $role=$role->validated();
    $role_id=Role::where('role_name',$role['role_name'])->first()->id;
    $request['role_id']=$role_id;


    $branch=$branch->validated();
    $branch_id=Branch::where('barnch_name',$branch['barnch_name'])->first()->id;
    $request['branch_id']=$branch_id;


    $Governorate=$Governorate->validated();
    $Governorate_id=Governorate::where('governorate',$Governorate['governorate'])->first()->id;
    $request['governorate_id']=$Governorate_id;

    
    $insert=User::create($request);
    if($insert){
        return response()->json($insert, 200);
    } else {
        return response()->json(null, 404);

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $role)
    {
        //
    }
}
