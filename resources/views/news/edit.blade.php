@extends('layouts.app')

@section('content')

    @include('layouts.error')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span> Rediger nyhet</div>
        <div class="panel-body">
            <form method="POST" action="/news/{{ $news->id }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tittel</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tittel" value="{{ $news->title }}">
                </div>
                <div class="form-group">
                    <img class="img-responsive" width="33%" src="{{ $news->getImagePath() }}" />
                </div>
                <div class="form-group">
                    <label for="image">Last opp bilde</label>
                    <input type="file" id="image" name="image" value="{{ $news->getImagePath() }}">
                </div>
                <div class="form-group">
                    <label for="intro">Ingress</label>
                    <textarea class="form-control" id="intro" name="intro" placeholder="Ingress.." rows="2">{{ $news->intro }}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Innhold</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Innhold.." rows="4">{{ $news->content }}</textarea>
                </div>
                <!--
                <div class="form-group">
                    <label for="image">Last opp et bilde</label>
                    <input type="file" id="image" name="image">
                </div>
                -->
                <button type="submit" class="btn btn-primary">Endre</button>
            </form>
        </div>
    </div>
@endsection
