@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{config('app.name')}} - Dashboard</div>

                <div class="panel-body">
                    {{trans('strings.actions')}}:

                    <li><a href="{{ url('/units') }}">{{trans('strings.unitsSystem')}}</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
