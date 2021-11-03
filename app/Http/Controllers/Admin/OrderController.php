<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Orders;
use App\Models\productOrder;

class OrderController extends Controller
{
    public function index()
    {
        $order = Orders::select('*')
        ->orderBy('order_id','ASC')
        ->get();
        $orderProduct = productOrder::select('*')
        ->orderBy('order_id','ASC')
        ->get();
        return view('home',compact('order','orderProduct'));
    }
}
