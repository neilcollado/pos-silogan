<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use \Carbon\Carbon;
use App\Models\Orders;

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
        $ordersD = Orders::where('created_at', '>=', Carbon::today())
            ->where('created_at', '<', Carbon::tomorrow())
            ->where('status','completed')->get();

        //set month paramenter -- monthly sales
        $month_start = Carbon::now()->startOfMonth();
        $month_end = Carbon::now()->endOfMonth();
        $ordersM = Orders::where('created_at', '>=', $month_start)
            ->where('created_at', '<', $month_end)
            ->where('status','completed')->get();

        //set year parameter -- yearly sales
        $year_start = Carbon::now()->startOfYear();
        $year_end = Carbon::now()->endOfYear();
        $ordersY = Orders::where('created_at', '>=', $year_start)
            ->where('created_at', '<', $year_end)
            ->where('status','completed')->get();

        $salesYesterday = 0;
        $dailySale = 0;
        $monthlySale = 0;
        $yearlySale = 0;

        //calculate daily sales
        foreach ($ordersD as $order) {
            $dailySale += $order->Total;
        }
        //calculate monthly sales
        foreach ($ordersM as $order) {
            $monthlySale += $order->Total;
        }
        //calculate yearly sales
        foreach ($ordersY as $order) {
            $yearlySale += $order->Total;
        }

        return view('home')->with('salesT', $dailySale)->with('salesM', $monthlySale)->with('salesY', $yearlySale);
    }
}
