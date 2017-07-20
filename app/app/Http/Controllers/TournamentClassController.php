<?php

namespace App\Http\Controllers;

use App\Tournamentclass;
use Illuminate\Http\Request;
use App\Generators\GroupMatchesGenerator;

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
        $class = Tournamentclass::findOrFail($id)->load(['teams.club', 'teams.tournamentClass', 'groups.teams']);

        $teams = $class->teams;
        $groups = $class->groups;
        $matchGenerator = new GroupMatchesGenerator($teams);
        $matches = $matchGenerator->generate();


        return view('tournamentclasses.show', compact('class', 'matches', 'groups'));
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
    public function update(Request $request, Tournamentclass $tournamentclass)
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
