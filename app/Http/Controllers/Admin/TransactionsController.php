<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Orders;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transactions::all();

        return view('admin.transactions.index')->with('transactions', $transactions);
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

        return view('admin.transactions.show')->with('transaction', $t)->with('orders', $o);
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

        // dd($orderID);

        return view('admin.transactions.show')->with('transaction', $transaction)->with('orders', $order);
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
