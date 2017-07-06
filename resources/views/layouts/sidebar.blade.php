<div>
    @if (Auth::user())
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

        <a href="/news/create">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Skriv en nyhet</button>
        </a>
        <a href="/news">
            <button class="btn btn-primary btn-sm">Vis alle nyheter</button>
        </a>
    @endif

    @if (Auth::guest())
        <div class="panel panel-default">
            <div class="panel-heading">
                Laravel 5.4
            </div>
            <div class="panel-body">
                <img class="img-circle" src="{{ asset('images/laravel.svg') }}" height="100" width="100" />
            </div>
        </div>
    @endif
</div>