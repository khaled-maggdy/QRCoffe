<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Http\Requests\StoreBranchRequest;
use App\Http\Requests\StoreWhereGovernorate;
use App\Http\Requests\UpdateBranchRequest;
use App\Models\Governorate;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::where('deleted_at', null)->get();
        if ($branches) {
            return response()->json($branches, 200);
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
    public function store(StoreBranchRequest $request, StoreWhereGovernorate $governorate)
    {
        $request = $request->validated();
        $governorate = $governorate->validated();
        $governorate_id = Governorate::where('governorate_name', $governorate)->first();
        $request['governorate_id'] = $governorate_id;
        $creation = Branch::create($request);
        if ($creation) {
            return response()->json($creation, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        if ($branch) {
            return response()->json($branch, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchRequest $request, $branch)
    {
        $request = $request->validated();
        $update = Branch::where('id', $branch)->update([
            'branch_name' => $request['branch_name'],
            'address' => $request['address'],
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
    public function destroy(Branch $branch)
    {
        //
    }
    public function delete($branch)
    {
        $branch = Branch::find($branch);
        $delete = $branch->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = Branch::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($branch)
    {
        $restore = Branch::onlyTrashed()->where('id', $branch)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function forcedelete($branch)
    {
        $forcedelete = Branch::where('id', $branch)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
