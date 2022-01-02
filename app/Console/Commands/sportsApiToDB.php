<?php

namespace App\Console\Commands;

use App\Http\Controllers\Sports\ApiController;
use Illuminate\Console\Command;

class sportsApiToDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sports:todb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate the database with the sports API data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Please wait while data from the sports API is added to the database, you will be notified once it completes... \n";
        ApiController::storeSports();
        echo "Successfully added all sports into the database! Adding leagues now... \n";
        ApiController::storeLeagues();
        echo "Successfully added leagues into the database! Adding teams now, this will take a long time, grab some coffee ☕... \n";
        ApiController::storeTeams();
        echo "Successfully added teams into the database! Adding teams and league pivot table data now, also takes alot of time please wait... \n";
        ApiController::storeLeagueTeams();
        echo "Successfully added all sports data into the database!";
    }
}
