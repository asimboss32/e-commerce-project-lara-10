<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function allOrdersList()
    {
        $orders = Order::with('orderDetails.product')->orderBy('id', 'DESC')->paginate(10);   //producter data orderDetails er maddhome order er data gula niye asbe.ei karone orderdetails modeler sathe product model tao neoa hoyeche
        // dd($orders);
        return view('backend.orders.all-order-list', compact('orders'));
    }

    public function orderEdit($id)
    {
        $order = Order::with('orderDetails.product')->where('id', $id)->first(); 
        return view('backend.orders.order-edit', compact('order'));
    }

    public function orderUpdate(Request $request, $id)
    {
        $order = Order::find($id);
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->delivery_charge = $request->delivery_charge;
        $order->courier_name = $request->courier_name;
        $order->price = $request->price;
        
        $order->save();

        return redirect()->back();
    }
        public function orderUpdateStatus($status, $id)
        {
            $order = Order::find($id);
            $order->status = $status;
            $order->save();
    
            return redirect()->back();
        }

        public function statusWiseOrder($status)
        {
            $orders = Order::with('orderDetails.product')->where('status', $status)->get();
            return view('backend.orders.status-wise-order-list', compact('orders'));
        }
}
