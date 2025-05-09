<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Shifts = Shift::where('deleted_at' , null)->get();
        if($Shifts){
            return response()->json($Shifts , 200);
        }else{
            return response()->json(null , 404);
        }
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
    
    public function openshift(StoreShiftRequest $request)
    {
        $user = Auth::user();
       $shift = Shift::create([
          'user_id' => $user->id,
          'branch_id' => $user->branch_id,
          'total_encome' => 0,
          'start_shift' => Carbon::now(),
          'end_shift' => Carbon::now(),
        ]);
        if($shift){
            return response()->json($shift , 200);
        }else{
            return response()->json(null , 404);
        }
    }
    public function closeshift()
    {
        $user = Auth::user();

        $shift = Shift::where('branch_id' , $user->branch_id)->where('is_open' , true)->latest();
        $close = $shift->update([
            'end_shift' => Carbon::now(),
            'is_open' => false
        ]);
        if($close){
            return response()->json($close , 200);
        }else{
            return response()->json(null , 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Shift $shift)
    {
        if($shift){
            return response()->json($shift , 200);
        }else{
            return response()->json(null , 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
