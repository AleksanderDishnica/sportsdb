@include('partials.header')
    <h5>List of teams for the {{ $league_name }} league</h5>
    <ul class="list-group">
        @foreach($teams as $team)
            <li class="list-group-item">
                <a href="{{ route('singleTeam', [$team->id]) }}">{{ $team->name }}</a>
            </li>
        @endforeach
    </ul>
@include('partials.footer')
