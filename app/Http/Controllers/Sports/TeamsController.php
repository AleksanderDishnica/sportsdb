<?php

namespace App\Http\Controllers\Sports;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeamsController extends Controller
{
    public function index()
    {
        //
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
     * @param  int  $league_id
     * @return View
     */
    public function show($league_id)
    {
        $teams = League::find($league_id)->teams;
        $league_name = League::find($league_id)->name;

        return view('teams.index', [
            'teams'=>$teams,
            'league_name'=>$league_name,
        ]);
    }

    public function show_single($team_id)
    {
        $team = Team::find($team_id);

        return view('teams.show', [
            'team' => $team,
        ]);
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
        //
    }
}
