@extends('layouts.app')
@section('script')
    <script src="/js/controllers/HomeCtrl.js"></script>
@endsection
@section('content')
    @can('manage')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{config('app.name')}} - {{trans('strings.settings')}}</div>

                    <div class="panel-body">
                        <li><a href="{{ url('/users') }}">{{trans('strings.usersManagement')}}</a></li>
                        <li><a href="{{ url('/units') }}">{{trans('strings.unitsSystem')}}</a></li>
                        <li><a href="{{ url('/parameters') }}">{{trans('strings.parametersManagement')}}</a></li>
                        <li><a href="{{ url('/watersheds') }}">{{trans('strings.watershedsManagement')}}</a></li>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endcan
    <div class="container" ng-controller="HomeCtrl">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        {{Form::open([
                            'url' => '/watersheds/search',
                            'ng-submit' => 'search($event)',
                            'novalidate',
                            'ng-model' => 'searchForm'
                        ])}}
                        {{Form::text('search', '', [
                            'title' => 'Pesquisar Bacia Hidrográfica',
                            'ng-model' => 'searchTerm',
                            'autofocus'
                        ])}}

                        {{Form::button(trans('strings.search'), [
                            'title' => 'Pesquisar Bacia Hidrográfica',
                            'ng-disabled' => 'isBtnDisabled($event)',
                            'disabled',
                            'ng-click' => 'search()'
                        ])}}
                        {{Form::close()}}
                    </div>
                    @if(count($watersheds) > 0)
                    <div class="panel-body">

                        {{$resultLabel}}:

                        @foreach($watersheds as $watershed)
                            <li><a href="{{url("/watersheds/edit/{$watershed->id}")}}">{{$watershed->name}}</a></li>
                        @endforeach

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
