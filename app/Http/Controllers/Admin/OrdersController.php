<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $orders = Orders::where('status','pending')->paginate(10);
        
        return view('admin.orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::where('isAvailable', true)->get();
        return view('admin.orders.create', ['products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //set OrderNo
        $orderNo = Orders::select('orderNo')->pluck('orderNo')->last();
        if($orderNo >= 15) {
            //given the shop only has 15 seats
            $orderNo = 1;
        } else {
            $orderNo++;
        }

        //create new order
        $newOrder = new Orders;
        $newOrder->user_id = Auth::id();
        
        //get employee name
        $emp = User::findOrFail($newOrder->user_id);
        $newOrder->emp_name = $emp->name;
        $newOrder->orderNo = $orderNo;
        $newOrder->status = 'pending';
        $newOrder->type = request('orderType');

        $prodId = request('orders');

        //check if there is a product in order
        if($prodId == null) {
            $request->session()->flash('failed', 'Order Failed: Need to input a product');
            return redirect(route('admin.orders.index'));
        }

        $newOrder->save();

        //retrieve last order
        $orders = Orders::all()->last();
        $orders->Total = 0;
        $queueCount = request('queueCount');

        
        $prodQty = request('orderQty');

        //attach the product
        
        foreach($prodId as $id) {
            $product = Products::findOrFail($id);
            $orders->products()->attach($product);
        }

        //add the quantity per item
        $count = count($prodId);
        for($i=0; $i < $count; $i++) {
            $orders->products[$i]->pivot->Quantity = $prodQty[$i];
            $orders->products[$i]->pivot->save();
        }
        
        //set the total
        foreach($orders->products as $products) {
            $orders->Total += ($products->UnitPrice * $products->pivot->Quantity);
        }
        
        $orders->save();

        $request->session()->flash('success', 'Created Successfully');
        return redirect(route('admin.orders.index'));   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Orders::find($id);
        // $products = Products::all();
        // $orders->products()->attach($products);
        
        // $orders->Total = 0;
        // foreach($orders->products as $products) {
        //     $orders->Total += $products->UnitPrice;
        //     $products->pivot->Quantity = 2;
        // }
       
        // $orders->save();

        return view('admin.orders.show')->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cancel($id) {
        $order = Orders::findOrFail($id);
        $order->update(['status' => 'cancelled']);
        
        return redirect(route('admin.orders.index'));
    }

    public function complete($id) {
        $order = Orders::findOrFail($id);
        $order->update(['status' => 'completed']);
          
        return redirect(route('admin.orders.index'));
    }
}
