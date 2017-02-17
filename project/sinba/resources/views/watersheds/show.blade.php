@extends('layouts.app')

@section('style')
<?php $version = date('YmdHis') ?>
<link href="/css/watersheds.css?<?=$version?>" rel="stylesheet">
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-1">
        </div>

        <div class="col-sm-1">
        </div>


        <div class="col-sm-8">
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

            <h4>{{ trans('strings.information') }}</h4>

            <br>

            <p>{{ $watershed->description }}</p>

            <br>

            @if($watershed->image)
            <img src="{{URL::asset('storage/' . $watershed->image)}}" height="400" width="600" class="img-responsive center-block">
            @endif

            <br>
            <br>

            <div class="centered-spaced-buttons">
                <a href="/watersheds/models/{{ $watershed->id }}">
                    <button id="btnCadastrar" type="button" class="btn btn-default" style="padding: 9px 9px">
                        {{ trans('strings.manageData') }}
                    </button>
                </a>

                <a href="/watersheds/{{ $watershed->id }}/edit">
                    <button type="button" class="btn btn-default" style="padding: 9px 9px">
                        {{ trans('strings.updateWatershed') }}
                    </button>
                </a>
            </div>

        </div>

            <div class="col-sm-1">
            </div>

            <div class="col-sm-1">
            </div>
    </div>

@endsection