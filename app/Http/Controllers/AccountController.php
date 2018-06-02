<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bet;

class AccountController extends Controller
{
    public function index()
    {
        $bets = Bet::all();
        return view('account')->with('bets', $bets);
    }
}
