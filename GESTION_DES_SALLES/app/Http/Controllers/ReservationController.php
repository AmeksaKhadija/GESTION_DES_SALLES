<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Salle;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reservation::all();
        return view('reservation',['reservations' => $reservation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $salle = Salle::find($id);
        return view('/reserver',['salle'=> $salle]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {

        $request->validate([
            'date_debut' => 'required|date|after:now',
            'date_fin' => 'required|date|after:date_debut',
            'salle_id' => 'required|exists:salles,id',
        ]);

        // dd($request);

        $salle = Salle::findOrFail($request->salle_id);

        if ($salle->status != 'allowed') {
            return redirect()->back()->with('error', 'Cette salle est déjà réservée.');
        }

        Reservation::create([
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'user_id' => 1,
            'salle_id' => $salle->id,
            'status' => 'pending',
        ]);

        // $salle->status = 'reservee';
        // $salle->save();

        return redirect('/')->with('success', 'attendu, admin doit accepter votre réservation.');
    }


    public function accepter($id){
        // echo "hh";
        $reservation = Reservation::find($id);
        // dd($reservation);
        $reservation->status = 'accepter';
        $reservation->save();

        $salle = Salle::find($reservation->salle_id);

        $salle->status = 'reservee';
        $salle->save();

        return redirect()->back();
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
        $reservation = Reservation::find($id);

        $reservation->delete();
        return redirect()->back();
    }
}
