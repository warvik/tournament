@extends('layouts.app')

@section('content')
<div class="container">
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
                        <div class="col-md-10">{{$class->group_size}} minutes</div>

                    </div>
                </div>

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

            <div class="row">

                @foreach ( $groups as $group )
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$group->name}} (ID: {{$group->id}})</div>

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

            <div class="row">
                <div class="col-md-6">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Matches</div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;"></th>
                                        <th style="text-align: center;">Kamp</th>
                                        <th style="width: 50%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ( $matches as $match )
                                    <tr>
                                        <td style="text-align: right;">{{$match->first()->club->short_name}} {{$match->first()->name}} ({{$match->first()->id}})</td>
                                        <td style="text-align: center;">-</td>
                                        <td>{{$match->first()->club->short_name}} {{$match->last()->name}} ({{$match->last()->id}})</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">Table</div>

                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Pl</th>
                                        <th>W</th>
                                        <th>D</th>
                                        <th>L</th>
                                        <th>GD</th>
                                        <th>Pts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class->teams as $team)
                                    <tr>
                                        <td>{{$team->club->short_name}} {{$team->name}}</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
