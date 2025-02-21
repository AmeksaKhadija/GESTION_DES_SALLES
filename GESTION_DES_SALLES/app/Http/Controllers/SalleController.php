<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Salle;
use Illuminate\Support\Facades\Auth;


class SalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salle = Salle::all();
        // dd($salle);
        return view('/salles', ['salles' => $salle]);
    }

    public function showSalleToReserve()
    {
        $salle = Salle::all();
        // dd($salle->status);
        return view('/home', ['salles' => $salle]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/salles');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $salle = new Salle();
        $salle->name = $request->name;
        $salle->description = $request->description;
        $salle->status = 'allowed';

        $salle->save();
        return redirect('/salles');
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
        $salle = Salle::find($id);

        return view('/editeSalle', ['salle' => $salle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $salle = Salle::find($request->id);
        // dd($salle);
        $salle->name = $request->name;
        $salle->description = $request->description;
        $salle->save();

        return redirect('/salles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salle = Salle::find($id);

        $salle->delete();
        return redirect('/salles');
    }

    // public function desactivate($id)
    // {
    //     $salle = Salle::find($id);

    //     $salle->status = 'reservee';
    //     $salle->save();

    //     return redirect('/salles');
    // }

    


    public function mesReservations(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
        ]);

        $reservations = Reservation::where('user_id', $request->user_id)->with('salle')->get();

        return view('mes_reservations', compact('reservations'));
    }
}
