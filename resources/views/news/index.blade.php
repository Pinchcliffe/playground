@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Nyheter
                    </div>

                    <div class="panel-body">
                        @foreach ($news as $new)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <a href="/news/{{ $new->id }}"><h4>{{ $new->title }}</h4></a>
                                        <small>Publisert: {{ $new->created_at->toFormattedDateString() }}, Skrevet av: {{ $new->user->name }}</small><br>
                                        <b>{{ $new->intro }}</b><br><br>
                                        <a href="/news/{{ $new->id }}"><span class="glyphicon glyphicon-info-sign"></span> Les mer</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/news/{{ $new->id }}">
                                            <img class="img-responsive" src="{{ $new->image }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-3">
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
        </div>
    </div>
@endsection
