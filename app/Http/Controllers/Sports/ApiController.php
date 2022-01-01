<?php

namespace App\Http\Controllers\Sports;

use App\Http\Controllers\Controller;
use App\Models\League;
use App\Models\Sport;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    // Api variables
    protected $sportsURL = 'https://www.thesportsdb.com/api/v1/json/2/all_sports.php';
    protected $leaguesURL = 'https://www.thesportsdb.com/api/v1/json/2/all_leagues.php';
    protected $leagueTeamsUrl = 'https://www.thesportsdb.com/api/v1/json/50130162/lookup_all_teams.php?id=';
    protected $teamURL = 'https://www.thesportsdb.com/api/v1/json/50130162/lookupteam.php?id=';
    protected $standings = 'https://www.thesportsdb.com/api/v1/json/2/lookuptable.php?s=2020-2021&l=';

    /**
     * Display all sports.
     */
    public function index()
    {
        $response = Http::get($this->sportsURL);

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

            $addLeague->id = $league['idLeague'];
            $addLeague->name = $league['strLeague'];
            $addLeague->sportName = $league['strSport'];

            $addLeague->save();
        endforeach;
    }

    /**
     * Store all teams
     * @return void
     */
    public function storeTeams(){
        $allLeagues = League::all();

        foreach($allLeagues as $key=>$league):
            $response = Http::get($this->leagueTeamsUrl . $league->id);

            // store all teams to the database
            if(!empty($response->json()['teams'])):
                foreach($response->json()['teams'] as $key=>$team):
                    if(empty(Team::where('id', $team['idTeam'])->get()->first())):
                        $addTeam = new Team();

                        $addTeam->id = $team['idTeam'];
                        $addTeam->name = $team['strTeam'];
                        $addTeam->stadiumName = $team['strStadium'];
                        $addTeam->website = $team['strWebsite'];
                        $addTeam->descriptionEN = $team['strDescriptionEN'];

                        $addTeam->save();
                    endif;
                endforeach;
            endif;
        endforeach;
    }

    /**
     * Store all teams with all leagues
     */
    public function storeLeagueTeams(){
        $allLeagues = League::all();

        foreach($allLeagues as $key=>$league):
            $response = Http::get($this->leagueTeamsUrl . $league->id);

            // store all team_id with league_id to the database
            if(!empty($response->json()['teams'])):
                foreach($response->json()['teams'] as $key=>$team):
                    $addLeagueTeam = DB::table('league_team')->insert([
                        'team_id' => intval($team['idTeam']),
                        'league_id' => $league->id
                    ]);
                endforeach;
            endif;
        endforeach;
    }
}
