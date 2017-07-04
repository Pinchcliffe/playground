@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>{{ $users->name }} <div class="label label-danger pull-right">{{ $users->id }}</div></h1>
                        <hr>
                        <h4>E-post: {{ $users->email }}</h4>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection
