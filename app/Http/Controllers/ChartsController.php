<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use Charts;
use DB;
use Illuminate\Support\Facades\Auth;

class ChartsController extends Controller
{
    public function index()
    {
        $totals = DB::table('earnings')->where('user_id', '=', Auth::user()->id)->get();
        $sum = 0;
        $i = 0;
        $chart = new SampleChart;
        $data = [];
        foreach ($totals as $total) {
            $sum = $sum + $total->total;
            $data[] = $sum;
            }
        $chart->dataset('Gains (en €)', 'line', $data);
        return view('chart', ['chart' => $chart]);
    }
}
