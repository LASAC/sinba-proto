@extends('layouts.app')

@section('style')
<?php $version = date('YmdHis') ?>
<link href="/css/watersheds.css?<?=$version?>" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">
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
                <br />
                <div class="row">
                     <div class="col-sm-12">        
                        <h4>{{ trans('strings.information') }}</h4>
                    </div>
                </div>
                <hr />
                <div class="row">
                     <div class="col-sm-12">        
                        <p>{{ $watershed->description }}</p>
                    </div>
                </div>
                <div class="row">
                     <div class="col-sm-12">        
                        @if($watershed->image)
                         <img src="{{URL::asset('storage/' . $watershed->image)}}" height="400" width="600" class="img-responsive center-block">
                         @endif
                    </div>
                </div>
                <div class="row">
                     <div class="centered-spaced-buttons">
                        <a href="/watersheds/{{ $watershed->id }}/data/{{ Auth::id() }}">
                            <button id="btnCadastrar" type="button" class="btn btn-primary" style="padding: 9px 9px">
                                <i class="fa fa-database"></i>
                                {{ trans('strings.manageData') }}
                            </button>
                        </a>
                         <a href="/watersheds/models/{{ $watershed->id }}">
                             <button id="btnCadastrar" type="button" class="btn btn-primary" style="padding: 9px 9px">
                                 <i class="fa fa-database"></i>
                                 {{ trans('strings.importData') }}
                             </button>
                         </a>
                        <a href="/watersheds/{{ $watershed->id }}/edit">
                            <button type="button" class="btn btn-primary" style="padding: 9px 9px">
                            <i class="fa fa-refresh"></i>
                            {{ trans('strings.updateWatershed') }}
                            </button>
                        </a>
                    </div>
                </div>
        </div>
        </div>
        </div>
        </div>
@endsection