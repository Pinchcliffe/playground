<div>
    <div class="panel panel-default">
        <div class="panel-heading">
            Nyhetsarkiv
        </div>
        <div class="panel-body">
            <ol class="list-unstyled">
                @foreach ($archives as $archive)

                    <li><a href="/news?month={{ $archive['month'] }}&year={{ $archive['year'] }}">{{ $archive['month'] }} {{ $archive['year'] }}</a></li>

                @endforeach
            </ol>
        </div>
    </div>

    @if (Auth::user())
        <a href="/news/create">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Skriv en nyhet</button>
        </a>
        <a href="/news">
            <button class="btn btn-primary btn-sm">Vis alle nyheter</button>
        </a>
    @endif
</div>