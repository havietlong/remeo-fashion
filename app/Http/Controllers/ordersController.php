<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customer_id = $request->input('user_id');
        if (!isset($customer_id)) {
            if (session('admin') == null) {
                $orders = orders::orderBy('id', 'DESC')
                    ->join('users', 'orders.customer_id', '=', 'users.id')
                    ->select('orders.*', 'orders.customer_id', 'users.name', 'orders.order_price')
                    ->get();
                return response()->json($orders);
            } else {
                $orders = orders::select(
                    orders::raw('DATE(order_date) as date'),
                    orders::raw('COUNT(*) as count'),
                    orders::raw('SUM(order_price) as total_money')
                )
                ->groupBy('date')
                ->get();
                    return response()->json($orders);
            }
        } else {
            $orders = orders::where('customer_id', $customer_id)
                ->orderBy('id', 'DESC')
                ->get();
            return response()->json($orders);
        }
    }

    public function verifyOrder(Request $request, string $id)
    {

        $order = orders::find($id);
        if ($order) {
            $order->order_status = 'approved';
            $order->save();
            return response()->json(['message' => 'Order status updated to Approved']);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
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
        $newOrder->order_status = "approved";
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
