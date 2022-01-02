@include('partials.header')
    <div class="border">
        <h5>{{ $team->name }} team</h5>
        <div>
            Stadium name: <strong>{{ $team->stadiumName }}</strong><br>
            Website: <a href="{{ $team->website }}">{{ $team->website }}</a><br>
            Description: <p>{{ $team->descriptionEN }}</p><br>
            Rank: <strong>{{ $team->rank }}</strong><br>
            Goals for: <strong>{{ $team->goalsFor }}</strong><br>
            Goals against: <strong>{{ $team->goalsAgainst }}</strong><br>
            Goal difference: <strong>{{ $team->goalDifference }}</strong><br>
            Wins: <strong>{{ $team->wins }}</strong><br>
            Loss: <strong>{{ $team->loss }}</strong><br>
            Draw: <strong>{{ $team->draw }}</strong><br>
            Points: <strong>{{ $team->points }}</strong><br>
        </div>
    </div>
@include('partials.footer')
