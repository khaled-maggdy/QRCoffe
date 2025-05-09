<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGovernorateRequest;
use App\Models\Governorate;
use App\Http\Requests\StoreWhereGovernorate;
use App\Http\Requests\UpdateGovernorateRequest;
use App\Http\Requests\WhereRequestGovernorate;
use Illuminate\Support\Facades\DB;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Governoratees = Governorate::where('deleted_at', null)->get();
        if ($Governoratees) {
            return response()->json($Governoratees, 200);
        } else {
            return response()->json(null, 404);
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
    public function store(StoreGovernorateRequest $request)
    {
    $request=$request->validated();
    $insert=Governorate::create($request);
    if($insert){
        return response()->json($insert, 200);
    } else {
        return response()->json(null, 404);

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Governorate $governorate)
    {
        if ($governorate) {
            return response()->json($governorate, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Governorate $Governorate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGovernorateRequest $request,StoreGovernorateRequest $Governorate)
    {
        $request=$request->validated();
        $Governorate=$Governorate->validated();
        $Governorate_id=Governorate::where('governorate',$Governorate['governorate'])->first()->id;
        $update=DB::table('governorates')->where('id',$Governorate_id)->update([
            'governorate'=>$request['governorate_new']
        ]);
        if ($update) {
            return response()->json($update, 200);
        } else {
            return response()->json(null, 403);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Governorate $Governorate)
    {
        //
    }
    public function delete($Governorate)
    {
        $Governorate = Governorate::find($Governorate);
        $delete = $Governorate->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = Governorate::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($Governorate)
    {
        $restore = Governorate::onlyTrashed()->where('id', $Governorate)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function forcedelete($Governorate)
    {
        $forcedelete = Governorate::where('id', $Governorate)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
