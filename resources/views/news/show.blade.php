@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="{{ url('/news') }}">Nyheter</a></div>
                    <div class="panel-body">
                        <h1>{{ $news->title }}</h1>
                        <small>Publisert: {{ $news->created_at }} - Skrevet av: {{ $news->author }}</small>
                        <hr>
                        <img class="img-responsive" src="{{ $news->image }}" />
                        <hr>
                        <b>{{ $news->intro }}</b>
                        <p>{{ $news->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
