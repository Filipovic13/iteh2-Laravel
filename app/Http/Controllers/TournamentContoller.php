<?php

namespace App\Http\Controllers;

use App\Http\Resources\TournamentCollection;
use App\Http\Resources\TournamentResource;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournamnets = Tournament::all();
        return new TournamentCollection($tournamnets);
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
        $validator = Validator::make($request->all(), [
            'event_name'=> 'required|string',
            'country'=> 'required|string',
            'city'=> 'required|string',
            'ruleset'=> 'required|string',
            'date'=> 'required|string',
           
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $tournament = Tournament::create([
            'event_name'=> $request->event_name,
            'country'=>  $request->country,
            'city'=>  $request->city,
            'ruleset'=> $request->ruleset,
            'date'=>  $request->date,
           
        ]);

        return response()->json(['Tournament successfully stored.', new TournamentResource($tournament)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tournamnet  $tournamnet
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        return new TournamentResource($tournament);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tournamnet  $tournamnet
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournamnet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tournamnet  $tournamnet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $validator = Validator::make($request->all(), [
            'event_name'=> 'required|string',
            'country'=> 'required|string',
            'city'=> 'required|string',
            'ruleset'=> 'required|string',
            'date'=> 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $tournament->event_name = $request->event_name;
        $tournament->country = $request->country;
        $tournament->city = $request->city;
        $tournament->ruleset = $request->ruleset;
        $tournament->date = $request->date;
    
    

        $tournament->save();

        return response()->json(['Tournament is updated successfully',new TournamentResource($tournament)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tournamnet  $tournamnet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return response()->json('Tournamrnt is successfully deleted.');
    }
}
