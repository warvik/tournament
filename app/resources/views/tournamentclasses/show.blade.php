@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-12 mb-1">
            <a href="/classes\{{$class->id}}/groups/generate" class="btn btn-primary">Generate groups</a>
        </div>
    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Class: {{ $class->name }}</div>

                <div class="panel-body">
                    <div class="row">
                        
                        <div class="col-md-2 text-right">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-md-10">{{$class->name}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Type:</strong>
                        </div>
                        <div class="col-md-10">{{$class->type}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Match length:</strong>
                        </div>
                        <div class="col-md-10">{{$class->match_length}} minutes</div>

                        <div class="col-md-2 text-right">
                            <strong>Group size:</strong>
                        </div>
                        <div class="col-md-10">{{$class->group_size}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Teams:</strong>
                        </div>
                        <div class="col-md-10">{{$class->teams->count()}}</div>

                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12 text-right">
                    <a href="/classes\{{$class->id}}/regenerate/groups">Re-generate groups</a>
                </div>
            </div>

            <div class="row">

                @foreach ( $groups as $group )
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading"><a href="/classes/{{$class->id}}/groups/{{$group->id}}">{{$group->name}} (ID: {{$group->id}})</a></div>

                        <div class="panel-body">
                            <ul>
                                @foreach($group->teams as $team)
                                <li>{{$team->club->short_name}} {{$team->name}} - {{$team->group_id}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Teams</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Club</th>
                                <th>Team</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($class->teams as $team)
                            <tr>
                                <td>
                                    {{$team->club->name}}
                                </td>
                                <td>
                                    <a href="/teams/{{$team->id}}">{{$team->name}}</a>
                                </td>
                                <td>{{$team->contact_person}}</td>
                                <td>
                                    <a href="mailto:{{$team->email}}">{{$team->email}}</a>
                                </td>
                                <td>{{$team->telephone}}</td>
                                <td>{{$team->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
