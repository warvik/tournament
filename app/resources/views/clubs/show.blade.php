@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">Clubs: {{$club->name}}</div>

                <div class="panel-body">
                    <div class="row">
                        
                        <div class="col-md-2 text-right">
                            <strong>Name:</strong>
                        </div>
                        <div class="col-md-10">{{$club->name}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Short name:</strong>
                        </div>
                        <div class="col-md-10">{{$club->short_name}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Email:</strong>
                        </div>
                        <div class="col-md-10">{{$club->email}}</div>

                        <div class="col-md-2 text-right">
                            <strong>Telephone:</strong>
                        </div>
                        <div class="col-md-10">{{$club->telephone}}</div>

                        <div class="col-md-2 text-right">
                            <strong>URL:</strong>
                        </div>
                        <div class="col-md-10">{{$club->url}}</div>

                    </div>
                </div>

                <div class="panel-footer text-right">
                    <a href="/clubs" class="link">Back</a>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Teams</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Registered</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($club->teams as $team)
                            <tr>
                                <td>{{$team->name}}</td>
                                <td>
                                    <a href="/class/{{$team->tournamentClass->id}}">{{$team->tournamentClass->name}}</a>
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
