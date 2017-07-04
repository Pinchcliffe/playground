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
                                        <h4>{{ $new->title }}</h4>
                                        <small>Publisert: {{ $new->created_at }}, Skrevet av: {{ $new->author }}</small><br>
                                        <b>{{ $new->intro }}</b><br><br>
                                        <a href="/news/{{ $new->id }}"><span class="glyphicon glyphicon-info-sign"></span> Les mer</a>
                                        <hr>
                                    </div>
                                    <div class="col-md-4">
                                        <img class="img-responsive" src="{{ $new->image }}" />
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
