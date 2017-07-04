@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Nyheter</div>

                    <div class="panel-body">
                        @foreach ($news as $new)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <a href="/news/{{ $new->id }}"><h4>{{ $new->title }}</h4></a>
                                        <small>Publisert: {{ $new->created_at }}, Skrevet av: {{ $new->author }}</small><br>
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
        </div>
    </div>
@endsection
