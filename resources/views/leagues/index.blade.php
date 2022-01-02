@include('partials.header')
    <h5>List of leagues for the {{ $sport_name }} sport</h5>
    <ul class="list-group">
        @foreach($leagues as $league)
            <li class="list-group-item">
                <a href="{{ route('teams.show', [$league->id]) }}">{{ $league->name }}</a>
            </li>
        @endforeach
    </ul>
@include('partials.footer')
