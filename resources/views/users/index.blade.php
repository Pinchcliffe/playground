@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Brukere <span class="label label-primary">{{ $users->total() }}</span>
            <div class="pull-right">
                <a href="users/new"><button class="btn btn-xs btn-primary">Ny bruker</button></a>
            </div>
        </div>

        <table class="table table-striped table-hover table-bordered table-responsive">
            <thead>
            <tr>
                <th class="small">Brukernavn</th>
                <th class="small">Epost</th>
                <th class="small">Handlinger</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><a href="users/{{$user->id}}">{{$user->name}}</a></td>
                    <td><a href="mailto:{{$user->email}}">{{$user->email}}</a></td>
                    <td width="15%">
                        <form class="form-noblock" action="users/{{$user->id}}/delete" method="POST">
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger">Slett</button>
                        </form>
                        <a href="users/{{$user->id}}/edit"><button type="button" class="btn btn-sm btn-primary">Endre</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links() }}
@endsection