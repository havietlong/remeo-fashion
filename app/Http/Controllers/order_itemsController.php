<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class order_itemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(session('admin')==null){
        $order_id = $request->input('order_id');
        $order_items = order_items::join('products', 'order_items.product_id', '=', 'products.id')
            ->where('order_items.order_id', $order_id)
            ->orderBy('order_items.id', 'DESC')
            ->get();
        return response()->json($order_items);
        }else{
            $order_date = $request->input('order_date');
            $order_items = DB::table('orders')
            ->join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->whereDate('orders.order_date', $order_date)
            ->select('orders.*', 'order_items.*', 'products.*')
            ->get();
        return response()->json($order_items);
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
    public function store(Request $request)
    {
        $newOrder_item = new order_items();
        $newOrder_item->order_id = $request->input('order_id');
        $newOrder_item->product_id = $request->input('productID');
        $newOrder_item->quantity = $request->input('productQuantity');
        $newOrder_item->product_price = $request->input('productPrice');
        $newOrder_item->product_quantity_price = $request->input('productTotalQuantityPrice');
        $newOrder_item->save();

        return response("Successfully added to order_items");
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
