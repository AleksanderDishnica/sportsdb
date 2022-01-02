<h4><a href="{{ url()->previous() }}">Back</a></h4>
<h5>List of leagues for the {{ $sport_name }} sport</h5>
<ul>
    @foreach($leagues as $league)
        <li>
            <a href="{{ route('teams.show', [$league->id]) }}">{{ $league->name }}</a>
        </li>
    @endforeach
</ul>
