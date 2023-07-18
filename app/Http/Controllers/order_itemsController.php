<?php

namespace App\Http\Controllers;

use App\Models\order_items;
use Illuminate\Http\Request;

class order_itemsController extends Controller
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
    public function store(Request $request)
    {
        $newOrder_item = new order_items();
        $newOrder_item->order_id = 1;
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
