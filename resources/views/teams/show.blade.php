<h4><a href="{{ url()->previous() }}">Back</a></h4>
<h5>{{ $team->name }} team</h5>
<div>
    {{ $team->stadiumName }}<br>
    {{ $team->website }}<br>
    {{ $team->descriptionEN }}<br>
    {{ $team->rank }}<br>
    {{ $team->goalsFor }}<br>
    {{ $team->goalsAgainst }}<br>
    {{ $team->goalDifference }}<br>
    {{ $team->wins }}<br>
    {{ $team->loss }}<br>
    {{ $team->draw }}<br>
    {{ $team->points }}<br>
</div>
