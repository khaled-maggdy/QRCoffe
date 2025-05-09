<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Branch;
use App\Models\OrderItem;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('deleted_at', null)->get();
        if ($orders) {
            return response()->json($orders, 200);
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
    public function store(StoreOrderRequest $request)
    {
        $user = Auth::user();

        $shift_id = Shift::whereUserId($user->id)->first()->id;

        $order = Order::create([
            'shift_id' => $shift_id,
            'table_id' => $request->table_id,
            'user_id' => $user->id,
            'order_id' => $user->order_id,
        ]);

        foreach ($request->products as $product) {
            $items =[OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'quantity' => $product['quantity'],
            ])];
        }
        if($order && $items){
            return response()->json([$order , $items] , 201);
        }else{
            return response()->json(null , 404);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        if ($order) {
            return response()->json($order, 200);
        } else {
            return response()->json(null, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function delete($order)
    {
        $order = Order::find($order);
        $delete = $order->delete();
        if ($delete) {
            return response()->json($delete, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function trash()
    {
        $trashed = Order::onlyTrashed()->get();
        if ($trashed) {
            return response()->json($trashed, 200);
        } else {
            return response()->json(null, 404);
        }

    }
    public function restore($order)
    {
        $restore = Order::onlyTrashed()->where('id', $order)->first()->restore();
        if ($restore) {
            return response()->json($restore, 200);
        } else {
            return response()->json(null, 404);
        }
    }
    public function forcedelete($order)
    {
        $forcedelete = Order::where('id', $order)->first()->forceDelete();
        if ($forcedelete) {
            return response()->json($forcedelete, 200);
        } else {
            return response()->json(null, 404);
        }

    }
}
