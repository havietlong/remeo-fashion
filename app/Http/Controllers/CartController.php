<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = session('cart', []);

        return response()->json([
            'cartItems' => $cartItems
        ]);
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
        $item = $request->input('item');
        $quantity = $request->input('quantity'); // Get the quantity from the request

        // Add the item and quantity to the cart in the session
        $cartItems = $request->session()->get('cart', []);
        $cartItems[] = [
            'item' => $item,
            'quantity' => $quantity // Include the quantity in the cart item
        ];
        $request->session()->put('cart', $cartItems);

        return response()->json([
            'cartItems' => $cartItems
        ]);
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

    public function destroySession(Request $request)
    {
        session()->flush();
        return Redirect::route('home')->with('success', 'Session destroyed successfully.');
    }
}
