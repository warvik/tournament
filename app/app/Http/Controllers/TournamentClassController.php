<?php

namespace App\Http\Controllers;

use App\Tournamentclass;
use Illuminate\Http\Request;

class TournamentclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Tournamentclass::latest()->get();
        return view('tournamentclasses.index', compact('classes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournamentclass  $tournamentclass
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = Tournamentclass::findOrFail($id)->load('teams');
        return view('tournamentclasses.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournamentclass  $tournamentclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournamentclass $tournamentclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournamentclass  $tournamentclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tournamentclass $tournamentclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournamentclass  $tournamentclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournamentclass $tournamentclass)
    {
        //
    }
}
