@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><a href="{{ url('/news') }}">Nyheter</a></div>
        <div class="panel-body">
            <h1>{{ $news->title }}</h1>
            <small>Publisert: {{ $news->created_at }} - Skrevet av: {{ $news->user->name }}</small>
            <hr>
            <img class="img-responsive" src="{{ $news->image }}" />
            <hr>
            <b>{{ $news->intro }}</b>
            <p>{{ $news->content }}</p>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">Kommentarer <span class="label label-primary">{{ count($news->comments) }}</span></div>
        <div class="panel-body">
            @if(count($news->comments) > 0)
            @foreach ($news->comments as $comment)
                    <small>Av: {{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</small>
                    <div class="alert alert-info">{{ $comment->content }}</div>
            @endforeach
            @else
                <p>Ingen kommentarer.</p>
            @endif
            <hr>
                <form method="POST" action="/news/{{ $news->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content">Kommentar</label>
                        <textarea class="form-control" id="content" name="content" placeholder="Hva har du på hjertet?" rows="2" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Kommenter</button>
                    </div>
                </form>
                @include('layouts.error')
        </div>
    </div>
@endsection
