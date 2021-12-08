<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Orders;
Use \Carbon\Carbon;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transactions::latest()->paginate(10);
        $ordersID = Transactions::pluck('orders_id')->toArray();
        
        //get all orders model
        $models = Orders::find($ordersID);
        $sorted = array_flip($ordersID);

        foreach($models as $model)
        {
            $sorted[$model->id] = $model->orderNo;
        }

        $sorted = Collection::make(array_values($sorted));
        $count = 0;
      
        return view('admin.transactions.index')
        ->with('transactions', $transactions)
        ->with('orderNo', $sorted)->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderID = request('orderID');
        $transaction = new Transactions;

        $payment = request('payment');
        $total = request('total');
        
        $transaction->orders_id = $orderID;
        $transaction->total = $total;
        $transaction->payment = $payment;
        $transaction->change = ($payment - $total);

        if($transaction->change < 0) {
            $request->session()->flash('failed', 'Payment Amount Invalid!');
            return redirect(route('admin.orders.show', $transaction->orders_id));
        }

        $transaction->save();
        
        $t = Transactions::all()->last();
        $o = Orders::findOrFail($orderID);
        $o->update(['status' => 'paid']);

        $date = $t->created_at->toFormattedDateString();

        return view('admin.transactions.show')
        ->with('transaction', $t)
        ->with('orders', $o)
        ->with('date',$date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transactions::findOrFail($id);
        $orderID = $transaction->orders_id;
        $order = Orders::findOrFail($orderID);
        $date = $transaction->created_at->toFormattedDateString();
        
        return view('admin.transactions.show')
        ->with('transaction', $transaction)
        ->with('orders', $order)
        ->with('date', $date);
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
}
