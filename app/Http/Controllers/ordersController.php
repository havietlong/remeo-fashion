<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return orders::orderBy('id','DESC')->get();
    }

    public function latestIndex()
    {
        return orders::orderBy('id', 'DESC')->limit(1)->get();
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
        $newOrder = new orders();
        $newOrder->customer_id = $request->input('user_id');
        $newOrder->order_date = now();
        $newOrder->order_price = $request->input('total_order');
        $newOrder->save();
    
        return response("Successfully added to orders");
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
