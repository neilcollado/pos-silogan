<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \Carbon\Carbon;
use App\Models\Orders;
use App\Models\Transactions; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //daily sales
        $ordersD = Transactions::where('created_at', '>=', Carbon::today())
            ->where('created_at', '<', Carbon::tomorrow())->get();

        //set month paramenter -- monthly sales
        $month_start = Carbon::now()->startOfMonth();
        $month_end = Carbon::now()->endOfMonth();
        $ordersM = Transactions::where('created_at', '>=', $month_start)
            ->where('created_at', '<', $month_end)->get();

        //set year parameter -- yearly sales
        $year_start = Carbon::now()->startOfYear();
        $year_end = Carbon::now()->endOfYear();
        $ordersY = Transactions::where('created_at', '>=', $year_start)
            ->where('created_at', '<', $year_end)->get();

        $salesYesterday = 0;
        $dailySale = 0;
        $monthlySale = 0;
        $yearlySale = 0;

        //calculate daily sales
        foreach ($ordersD as $order) {
            $dailySale += $order->total;   
        }

        //calculate monthly sales
        foreach ($ordersM as $order) {
            $monthlySale += $order->total;
        }
        //calculate yearly sales
        foreach ($ordersY as $order) {
            $yearlySale += $order->total;
        }

        return view('home')->with('salesT', $dailySale)->with('salesM', $monthlySale)->with('salesY', $yearlySale);
    }
}
