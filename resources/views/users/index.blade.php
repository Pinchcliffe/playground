@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
                Brukere <span class="label label-primary">{{ $users->total() }}</span>
                <a href="users/new"><button class="btn btn-xs btn-primary pull-right">Ny bruker</button></a>
        </div>

        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th class="small">Brukernavn</th>
                <th class="small">Epost</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="users/{{$user->id}}">{{$user->name}}</a></td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
@endsection