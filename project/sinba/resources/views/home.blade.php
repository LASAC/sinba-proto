@extends('layouts.app')

@section('content')
    @if($isAdmin)
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{config('app.name')}} - {{trans('strings.settings')}}</div>

                    <div class="panel-body">
                        <li><a href="{{ url('/units') }}">{{trans('strings.unitsSystem')}}</a></li>
                        <li><a href="{{ url('/watersheds') }}">{{trans('strings.watershedsManagement')}}</a></li>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        {{Form::open(['url' => '/watersheds/search'])}}
                        {{Form::text('search', '', ['title' => 'Pesquisar Bacia Hidrográfica'])}}
                        {{Form::submit(trans('strings.search'), ['title' => 'Pesquisar Bacia Hidrográfica'])}}
                        {{Form::close()}}
                    </div>
                    @if(count($watersheds) > 0)
                    <div class="panel-body">

                        {{$resultLabel}}:

                        @for($i = 0; $i < count($watersheds); $i++)
                            <li><a href="#">{{$watersheds[$i]}}</a></li>
                        @endfor

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
