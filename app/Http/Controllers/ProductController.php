<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\BranchProduct;

class ProductController extends Controller
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
    public function store(StoreProductRequest $request , $branch_id)
    {
        $request = $request->validated();
        $product = Product::create([
           'product_name' => $request['product_name'], 
           'product_image' => $request['product_image'], 
           'category_id' => $request['category_id']
        ]);
      $branchproduct =  BranchProduct::create([
            'product_id' => $product->id,
            'branch_id'  => $request['branch_id'],
            'price' => $request['price']
      ]);
        if ($product && $branchproduct) {
            return response()->json([$product, $branchproduct], 200);
        } else {
            return response()->json(null, 404);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
