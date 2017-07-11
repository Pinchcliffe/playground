@extends('layouts.app')

@section('content')

    @include('layouts.error')
    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil"></span> Rediger bruker</div>
        <div class="panel-body">
            <h1>{{ $users->name }} <div class="label label-danger pull-right">{{ $users->id }}</div></h1>
            <hr>
            <form method="POST" action="/users/{{ $users->id }}" enctype="multipart/form-data">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Navn</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
                </div>
                <div class="form-group">
                    <label for="title">E-post</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{ $users->email }}">
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
