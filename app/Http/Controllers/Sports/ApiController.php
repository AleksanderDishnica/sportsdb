<?php

namespace App\Http\Controllers\Sports;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    // Api variables
    protected $sportsURL = 'https://www.thesportsdb.com/api/v1/json/2/all_sports.php';
    protected $leaguesURL = 'https://www.thesportsdb.com/api/v1/json/2/all_leagues.php';
    protected $teamURL = 'https://www.thesportsdb.com/api/v1/json/50130162/lookupteam.php?id=';
    protected $sportTeamsUrl = 'https://www.thesportsdb.com/api/v1/json/50130162/lookup_all_teams.php?id=';
    protected $standings = 'https://www.thesportsdb.com/api/v1/json/2/lookuptable.php?l=4328&s=2020-2021';
    /**
     * Display all sports.
     */
    public function index()
    {
        $response = Http::get($this->apiURL);

        return $response->json()['sports'];
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idSport
     * @return \Illuminate\Http\Response
     */
    public function show($idSport)
    {
        $allSports = $this->index();

        return $allSports[$idSport];
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

    /**
     * Store all sports
     * @return void
     */
    public function storeSports(){
        $response = Http::get($this->sportsURL);

        // store all sports to the database
        foreach($response->json()['sports'] as $key=>$sport):
            $addSport = new Sport();

            $addSport->sportId = $sport['idSport'];
            $addSport->name = $sport['strSport'];

            $addSport->save();
        endforeach;
    }

    /**
     * Store all leagues
     * @return void
     */
    public function storeLeagues(){
        $response = Http::get($this->leaguesURL);

        // store all leagues to the database
        foreach($response->json()['leagues'] as $key=>$league):
            $addLeague = new League();

            $addLeague->leagueId = $league['idLeague'];
            $addLeague->name = $league['strLeague'];
            $addLeague->sportName = $league['strSport'];

            $addLeague->save();
        endforeach;
    }

    /**
     * Store all leagues
     * @return void
     */
    public function storeTeams(){
        $allLeagues = League::all();

        foreach($allLeagues as $key=>$league):
            $response = Http::get($this->teamsURL . $league->leagueId);

            // store all teams to the database
            foreach($response->json()['teams'] as $key=>$team):
                $addTeam = new League();

                $addTeam->teamId = $team['idTeam'];
                $addTeam->name = $team['strTeam'];
                $addTeam->stadiumName = $team['strStadium'];
                $addTeam->website = $team['strWebsite'];
                $addTeam->descriptionEN = $team['strDescriptionEN'];

                $addTeam->save();
            endforeach;
        endforeach;
    }
}
