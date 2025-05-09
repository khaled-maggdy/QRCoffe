<?php

namespace App\Http\Controllers;

use App\Models\BranchProduct;
use App\Http\Requests\StoreBranchProductRequest;
use App\Http\Requests\UpdateBranchProductRequest;
use App\Models\Branch;

class BranchProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branch_products = BranchProduct::where('deleted_at' , null)->get();
        if ($branch_products) {
            return response()->json($branch_products , 200);
        }else {
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
    public function store(StoreBranchProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchProduct $branchProduct)
    {
        if($branchProduct){
            return response()->json($branchProduct , 200);
        }else{
            return response()->json(null , 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchProduct $branchProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchProductRequest $request, BranchProduct $branchProduct , $product_id , $branch_id )
    {
        $update = BranchProduct::where('id', $branchProduct )->update([
           'product_id' => $request['product_id'],
           'branch_id' => $request['branch_id'] ,
           'price' => $request['price']
        ]);
        if($update){
            return response()->json($update , 200);
        }else{
            return response()->json(null , 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchProduct $branchProduct)
    {
        //
    }
    public function delete($branch_product)
    {
        $branch_product = BranchProduct::find($branch_product);
        $delete = $branch_product->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = BranchProduct::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($branch_product)
    {
        $restore = BranchProduct::onlyTrashed()->where('id', $branch_product)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function forcedelete($branch_product)
    {
        $forcedelete = BranchProduct::where('id', $branch_product)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
