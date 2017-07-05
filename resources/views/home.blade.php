@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="#">Hjem</a></li>
                        <li role="presentation"><a href="#">Innboks</a></li>
                        <li role="presentation"><a href="#">Kunder</a></li>
                        <li role="presentation"><a href="#">Innstillinger</a></li>
                        <li role="presentation"><a href="#">Admin Panel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ url('news') }}">Nyheter</a></div>

                <div class="panel-body">
                    @if (count($news) > 0)
                        @foreach ($news as $new)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <a href="/news/{{ $new->id }}"><h4>{{ $new->title }}</h4></a>
                                        <small>Publisert: {{ $new->created_at->toFormattedDateString() }}, Skrevet av: {{ $new->author }}</small><br>
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
                    @else
                        <p>Ingen nyheter</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
