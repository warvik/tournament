@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Class: {{ $class->name }}</div>

                <div class="panel-body">
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Teams</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
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
