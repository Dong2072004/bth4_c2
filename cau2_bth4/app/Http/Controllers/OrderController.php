<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order_detail;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();
        return view('orders.create', compact( 'products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => now(),
            'status' => 'Chưa thanh toán',
        ]);

        foreach ($request->products as $product) {
            Order_detail::create([
                'order_id' => $order->id,
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
            ]);
        }

        return redirect()->route('orders.create')->with('success', 'Đơn hàng đã được tạo thành công.');
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
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.edit', compact('customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orders = Order::find($id);
        $orders->update($validate);
        return redirect()->route('orders.index');
    }
    public function updateStatus(Order $order)
    {
        $order->status = ($order->status == 'Chưa thanh toán') ? 'Đã thanh toán' : 'Chưa thanh toán';
        $order->save();

        return redirect()->route('orders.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->route('orders.index');
    }
}
