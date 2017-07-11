@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Nyheter
        </div>

        <div class="panel-body">
            @foreach ($news as $new)
                <div class="row">
                    <div class="col-md-8">
                        <a href="/news/{{ $new->id }}"><h4>{{ $new->title }}</h4></a>
                        <small>Publisert: {{ $new->created_at->toFormattedDateString() }}, Skrevet av: {{ $new->user->name }}</small><br>
                        <b>{{ $new->intro }}</b><br><br>
                        <a href="/news/{{ $new->id }}"><span class="glyphicon glyphicon-info-sign"></span> Les mer</a>
                    </div>
                    @if ($new->image != '')
                        <div class="col-md-4">
                            <a href="/news/{{ $new->id }}">
                                <img class="img-responsive" src="{{ $new->getImagePath() }}" alt="..." />
                            </a>
                        </div>
                    @endif
                </div>
                <hr>
            @endforeach
        </div>
    </div>

    @if (isset($_GET['month']) && $_GET['year'] != NULL)
     {{ $news->appends(['month' => isset($_GET['month']) ? $_GET['month'] : '', 'year' => isset($_GET['year']) ? $_GET['year'] : ''])->links() }}
    @else

    @endif

@endsection
