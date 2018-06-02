<?php

namespace App\Http\Controllers;

use App\Bet;
use Illuminate\Http\Request;

class BetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bets = Bet::all();
        return view('bets.betslits')->with('bets', $bets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bets.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bet = new bet;
        $bet->user_id = $request->user()->id;
        $bet->libmatch = $request->input('libmatch');
        $bet->libbet = $request->input('libbet');
        $bet->oddofbet = $request->input('oddofbet');
        $bet->stateofbet = $request->input('stateofbet');
        $bet->betsum = $request->input('betsum');
        $bet->save();
        return redirect('mesparis');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bet = Bet::findOrFail($id);

        return view('bets.edit',compact('bet','id'));
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
        $bet = Bet::findOrFail($id);

        $bet->libmatch = $request->input('libmatch');
        $bet->libbet = $request->input('libbet');
        $bet->oddofbet = $request->input('oddofbet');
        $bet->stateofbet = $request->input('stateofbet');
        $bet->betsum = $request->input('betsum');

        $bet->update();
        return redirect()->route('mesparis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bet = Bet::findOrFail($id);
        $bet->delete();
        return redirect('mesparis');
    }
}
