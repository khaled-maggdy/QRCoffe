<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */   public function index()
    {
        $categories = Category::where('deleted_at', null)->get();
        if ($categories) {
            return response()->json($categories, 200);
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
    public function store(StoreCategoryRequest $request)
    {
        $request = $request->validated();
        $creation = Category::create($request);
        if ($creation) {
            return response()->json($creation, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if ($category) {
            return response()->json($category, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request)
    {
        $update = Category::where('id', )->update([
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
    public function destroy(Category $category)
    {
        //
    }
    public function delete($category)
    {
        $category = Category::find($category);
        $delete = $category->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = Category::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($category)
    {
        $restore = Category::onlyTrashed()->where('id', $category)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function forcedelete($category)
    {
        $forcedelete = Category::where('id', $category)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
