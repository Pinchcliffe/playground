@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $news->title }}</h1>
                <small>Publisert: {{ $news->created_at }} - Skrevet av: {{ $news->author }}</small>
                <hr>
                <b>{{ $news->intro }}</b>
                <p>{{ $news->content }}</p>
            </div>
        </div>
    </div>
@endsection
