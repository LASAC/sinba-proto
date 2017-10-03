@extends('layouts.app')

@section('script')

@endsection

@section('style')
    <link href="/css/watersheds/model.css?<?=date('YmdHis')?>" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
             <div class="col-md-12">
                 <div class="x_panel">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1>{{$watershed->name}}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>
                                 {{trans('strings.levelAbove')}}:
                                 @if($parent)
                                <a href="{{ url('watersheds/' . $parent->id) }}">{{ $parent->name }}</a>
                                @else
                                -
                                @endif
                            </h5>
                        </div>
                    </div>

                    <hr />

                    <div class="row">
                        <div class="col-sm-12">
                             @include('watersheds.includes.importData')
                        </div>
                    </div>
                    <hr />

                    <div class="row">
                        <div class="col-sm-12">
                             @include('watersheds.includes.createNewSheet')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
