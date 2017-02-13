@extends('layouts.app')
@section('script')
    <?php $version = date('YmdHis') ?>
    <script src="/js/services/Notify.js?<?=$version?>"></script>
    <script src="/js/controllers/WatershedModelCtrl.js?<?=$version?>"></script>
@endsection
@section('style')
    <link href="/css/watersheds/model.css?<?=$version?>" rel="stylesheet">
@endsection
@section('content')
    <div class="row" ng-controller="WatershedModelCtrl" ng-init="init()">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-8 content">
            <h1>{{$watershed->name}}</h1>
            <h5>
                {{trans('strings.levelAbove')}}:
                @if($parent)
                    <a href="{{ url('watersheds/' . $parent->id) }}">{{ $parent->name }}</a>
                @else
                    -
                @endif
            </h5>

            <hr />

            @include('watersheds.includes.importData')

            <hr />

            @include('watersheds.includes.createNewSheet')

        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
    </div>
@endsection