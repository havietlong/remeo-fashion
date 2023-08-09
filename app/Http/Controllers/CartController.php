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

    public function indexQuantity()
    {
        $cartItems = session('cart', []);

        $totalQuantity = 0;

        // Iterate over cartItems array and accumulate quantities
        foreach ($cartItems as $cartItem) {
            $quantity = $cartItem['quantity'];
            $totalQuantity += $quantity;
        }

        return $totalQuantity;
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
        $quantity = $request->input('quantity');

        // Retrieve the current cart items from the session or initialize an empty array if it doesn't exist
        $cartItems = $request->session()->get('cart', []);

        // Check if the item already exists in the cart
        $existingItemKey = null;
        foreach ($cartItems as $key => $cartItem) {
            if ($cartItem['item'] === $item) {
                $existingItemKey = $key;
                break;
            }
        }

        // If the item exists, update its quantity by adding the new quantity
        if ($existingItemKey !== null) {
            $cartItems[$existingItemKey]['quantity'] += $quantity;
        } else {
            // If the item doesn't exist, add it as a new item in the cart
            $cartItems[] = [
                'item' => $item,
                'quantity' => $quantity
            ];
        }

        // Store the updated cart array back into the session
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
    public function destroy(Request $request)
    {
        $index = $request->input('index');
        // Retrieve the current cart items from the session or initialize an empty array if it doesn't exist
        $cartItems = session()->get('cart', []);
        unset($cartItems[$index]);
        $cartItems = array_values($cartItems);
            
            // Store the updated cart array back into the session
        session()->put('cart', $cartItems);
        // Check if the provided index is within the bounds of the cart array
    
        // Redirect back to the cart page or return a JSON response
        // depending on your application's logic
        return response("deleted from cart"); // Adjust this to your route name
    }
    

    public function destroySessionCart(Request $request)
    {
        $request->session()->forget('cart'); // Flush all session data
        return redirect()->route('home')->with('success', 'Session destroyed successfully.');
    }
}
