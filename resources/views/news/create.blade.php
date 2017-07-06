@extends('layouts.app')

@section('content')

@include('layouts.error')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span> Skriv nyhet</div>
        <div class="panel-body">
            <form method="POST" action="/news">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Tittel</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Tittel">
                </div>
                <div class="form-group">
                    <label for="image">Bilde</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Lim inn URL..">
                </div>
                <div class="form-group">
                    <label for="intro">Ingress</label>
                    <textarea class="form-control" id="intro" name="intro" placeholder="Ingress.." rows="2"></textarea>
                </div>
                <div class="form-group">
                    <label for="content">Innhold</label>
                    <textarea class="form-control" id="content" name="content" placeholder="Innhold.." rows="4"></textarea>
                </div>
                <!--
                <div class="form-group">
                    <label for="image">Last opp et bilde</label>
                    <input type="file" id="image" name="image">
                </div>
                -->
                <button type="submit" class="btn btn-primary">Publiser</button>
            </form>
        </div>
    </div>
@endsection
