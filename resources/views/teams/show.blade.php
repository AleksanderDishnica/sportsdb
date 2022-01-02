@include('partials.header')
    <div class="border">
        <h5>{{ $team->name }} team</h5>
        <div>
            @if(!empty($team->stadiumName))
                Stadium name: <strong>{{ $team->stadiumName }}</strong><br>
            @endif
            @if(!empty($team->website))
                Website: <a href="http://{{ $team->website }}" target="_blank">{{ $team->website }}</a><br>
            @endif
            @if(!empty($team->descriptionEN))
                Description: <p>{{ $team->descriptionEN }}</p><br>
            @endif
            @if(!empty($team->rank))
                Rank: <strong>{{ $team->rank }}</strong><br>
            @endif
            @if(!empty($team->goalsFor))
                Goals for: <strong>{{ $team->goalsFor }}</strong><br>
            @endif
            @if(!empty($team->goalsAgainst))
                Goals against: <strong>{{ $team->goalsAgainst }}</strong><br>
            @endif
            @if(!empty($team->goalDifference))
                Goal difference: <strong>{{ $team->goalDifference }}</strong><br>
            @endif
            @if(!empty($team->wins))
                Wins: <strong>{{ $team->wins }}</strong><br>
            @endif
            @if(!empty($team->loss))
                Loss: <strong>{{ $team->loss }}</strong><br>
            @endif
            @if(!empty($team->draw))
                Draw: <strong>{{ $team->draw }}</strong><br>
            @endif
            @if(!empty($team->points))
                Points: <strong>{{ $team->points }}</strong><br>
            @endif
        </div>
    </div>
@include('partials.footer')
