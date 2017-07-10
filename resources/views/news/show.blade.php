@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body news-content">
            @if (Auth::user()->id == $news->user_id)
            <div class="button-group pull-right">
                <h1></h1>
                <a href="/news/{{ $news->id }}/edit"><button type="button" class="btn btn-primary btn-sm">Rediger</button></a>
                <form class="form-noblock" method="post" action="/news/{{ $news->id }}/delete">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm">Slett</button>
                </form>
            </div>
            @endif
            <h1>{{ $news->title }}</h1>
            <small>Publisert: {{ $news->created_at }} - Skrevet av: {{ $news->user->name }}</small>
            <hr>
            @if ($news->image != '')
            <img class="img-responsive" src="{{ $news->getImagePath() }}" />
            <hr>
            @endif
            <b>{{ $news->intro }}</b>
            <p>{{ $news->content }}</p>
        </div>
    </div>

    @include('layouts.error')

    <div class="panel panel-default">
        <div class="panel-heading">Kommentarer <span class="label label-primary">{{ count($news->comments) }}</span></div>
        <div class="panel-body">
            @if(count($news->comments) > 0)
            @foreach ($news->comments as $comment)
                    <div class="label label-primary"><small>{{ $comment->user->name }} commented {{ $comment->created_at->diffForHumans() }}..</small></div>
                    <div class="alert alert-info">
                        {{ $comment->content }}
                    </div>
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
                        <button type="submit" class="btn btn-sm btn-primary">Kommenter</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
