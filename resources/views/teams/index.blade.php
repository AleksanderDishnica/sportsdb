<h4><a href="{{ url()->previous() }}">Back</a></h4>
<h5>List of teams for the {{ $league_name }} league</h5>
<ul>
    @foreach($teams as $team)
        <li>
            <a href="{{ route('singleTeam', [$team->id]) }}">{{ $team->name }}</a>
        </li>
    @endforeach
</ul>
