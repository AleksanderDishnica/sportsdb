<h5>List of sports</h5>
<ul>
    @foreach($sports as $sport)
        <li>
            <a href="{{ route('leagues.show', [$sport->id]) }}">{{ $sport->name }}</a>
        </li>
    @endforeach
</ul>
