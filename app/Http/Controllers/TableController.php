<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Http\Requests\WhereTableRequest;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tables = Table::where('deleted_at', null)->get();
        if ($Tables) {
            return response()->json($Tables, 200);
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
    public function store(StoreTableRequest $request)
    {
$request=$request->validated();
$insert=Table::create($request);
    if($insert){
        return response()->json($insert, 200);
    } else {
        return response()->json(null, 404);

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        if ($table) {
            return response()->json($table, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $Table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request,WhereTableRequest $table)
    {
        $table=$table->validated();
        $request=$request->validated();
        $table_id=Table::where('Number_of_table',$table['Number_of_table'])->first()->id;
        $update=DB::table('tables')->where('id',$table_id)->update([
        'Number_of_table'=>$request['Number_of_table_new']
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
    public function destroy(Table $Table)
    {
        //
    }
    public function delete($Table)
    {
        $Table = Table::find($Table);
        $delete = $Table->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = Table::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($Table)
    {
        $restore = Table::onlyTrashed()->where('id', $Table)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function forcedelete($Table)
    {
        $forcedelete = Table::where('id', $Table)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
