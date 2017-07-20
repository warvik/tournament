@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                
                <div class="panel-heading"><h3 class="panel-title">Group</h3></div>

                <div class="panel-body">
                    <div class="col-md-2 text-right">
                        <strong>Class:</strong>
                    </div>
                    <div class="col-md-10">
                        <a href="/classes/{{$class->id}}">{{$class->name}}</a>
                    </div>

                    <div class="col-md-2 text-right">
                        <strong>Name:</strong>
                    </div>
                    <div class="col-md-10">{{$group->name}}</div>

                    <div class="col-md-2 text-right">
                        <strong>Teams:</strong>
                    </div>
                    <div class="col-md-10">{{$teams->count()}}</div>

                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Teams</h3></div>
                <div class="panel-body">
                    <ul>
                        @foreach($teams as $team)
                        <li>{{$team->club->short_name}} {{$team->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
