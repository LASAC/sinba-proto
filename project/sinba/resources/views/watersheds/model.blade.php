@extends('layouts.app')
@section('script')
    <script src="/js/services/Notify.js?<?=date('YmdHis')?>"></script>
    <script src="/js/controllers/CreateModelCtrl.js?<?=date('YmdHis')?>"></script>
    <script src="/js/controllers/ImportDataCtrl.js?<?=date('YmdHis')?>"></script>
    <script src="/js/directives/ModelDisplay.js?<?=date('YmdHis')?>"></script>
    <script src="/js/directives/FileRead.js?<?=date('YmdHis')?>"></script>
@endsection
@section('style')
    <link href="/css/watersheds/model.css?<?=date('YmdHis')?>" rel="stylesheet">
@endsection
@section('content')
    <div class="row">
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