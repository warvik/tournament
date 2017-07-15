@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                
                <form action="clubs" method="POST">

                    {{ csrf_field() }}
                    {{ method_field('POST') }}
                    
                    <div class="panel-heading">Add new club</div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Short Name</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>URL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control" name="name" /></td>
                                    <td><input type="text" class="form-control" name="short_name" /></td>
                                    <td><input type="text" class="form-control" name="email" /></td>
                                    <td><input type="text" class="form-control" name="telephone" /></td>
                                    <td><input type="text" class="form-control" name="url" /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-primary">Add new</button>
                    </div>

                </form>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Classes</div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Teams</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($classes as $class)
                            <tr>
                                <td>
                                    <a href="/classes/{{$class->id}}">{{$class->name}}</a>
                                </td>
                                <td>{{$class->type}}</td>
                                <td>{{$class->teams->count()}}</td>
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
