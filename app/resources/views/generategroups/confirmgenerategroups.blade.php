@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <form action="/classes/1/regenerate/groups" method="POST">
                <div class="panel panel-warning">

                    {{ csrf_field() }}
                    
                    <div class="panel-heading"><h3 class="panel-title">Re-generate class groups</h3></div>

                    <div class="panel-body">
                        <p>This will re-create teams into groups for this class. It is not <i>reversable</i>. </p>
                        <p>Do you want to proceed?</p>
                    </div>

                    <div class="panel-footer text-right">
                        <button type="submit" value="proceed" name="action" class="btn btn-warning">Proceed</button>
                        <button type="submit" value="cancel" name="action" class="btn btn-link">Cancel</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
