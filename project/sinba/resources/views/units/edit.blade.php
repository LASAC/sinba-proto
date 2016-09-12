@extends('layouts.app')

@section('content')

    @include('includes.message')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <a href="{{ url('/units') }}">{{trans('strings.listUnits')}}</a> |
                        {{$title}}
                    </div>

                    <div class="panel-body">

                        <div id="unit">
                            {{Form::open(['url' => $url])}}
                            {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $unit->name, $attributes)}}
                            {{Form::label('symbol', trans('strings.symbol') . ':')}}
                            {{Form::text('symbol', $unit->symbol, $attributes)}}

                            @if($saveEnabled)
                            {{Form::submit(trans('strings.save'))}}
                            @endif

                            {{Form::close()}}
                        </div>

                        <div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection