@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Nyheter</div>

                    <div class="panel-body">
                        @foreach ($news as $new)
                            <h4>{{ $new->title }}</h4>
                            <small>Publisert: {{ $new->created_at }}, Skrevet av: {{ $new->author }}</small><br>
                            <b>{{ $new->intro }}</b><br><br>
                            <a href="/news/{{ $new->id }}"><span class="glyphicon glyphicon-info-sign"></span> Les mer</a>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
