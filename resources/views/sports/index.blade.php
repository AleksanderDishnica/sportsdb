@include('partials.header')
    <h5>List of sports</h5>
    <ul class="list-group">
        @foreach($sports as $sport)
            <li class="list-group-item">
                <a href="{{ route('leagues.show', [$sport->id]) }}">{{ $sport->name }}</a>
            </li>
        @endforeach
    </ul>
@include('partials.footer')
