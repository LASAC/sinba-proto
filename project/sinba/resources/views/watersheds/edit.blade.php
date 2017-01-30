@extends('layouts.app')

@section('style')
<link href="/css/watersheds.css" rel="stylesheet">
@endsection

@section('content')

    <div class="row">

        <div class="col-sm-1">
        </div>

        <div class="col-sm-1">
        </div>


        <div class="col-sm-8">
        {{Form::open([
            'url' => $url,
            'method' => $method,
            'files' => true
        ])}}
            {{Form::hidden('id', $watershed->id)}}

            <h1>
                {{ trans('strings.watershedName') }}:
                {{Form::text('name', $watershed->name, [
                    'class' => 'form-control'
                ])}}
            </h1>
            <h5>
                {{ trans('strings.levelAbove') }}:
                {{Form::select(
                    'parent_id',
                    $watershed->pluckOtherNames(trans('strings.none')),
                    $watershed->parent_id ? $watershed->parent_id : 0,
                    [
                        'class' => 'form-control'
                    ]
                )}}
            </h5>

            <hr />

            <h4>{{ trans('strings.information') }}</h4>

            <br>

            <p>
            {{Form::textarea('description', $watershed->description, [
                'class' => 'form-control'
            ])}}
            </p>

            <br>

            @if($watershed->image)
                <img src="{{Storage::disk('public')->url($watershed->image)}}" height="400" width="600" class="img-responsive center-block">
            @endif
            {{Form::file('image', [
                'class' => 'form-control'
            ])}}

            <br>
            <br>

            <div align="center">
                {{Form::submit(trans('strings.save'), [
                    'class' => 'btn btn-primary'
                ])}}
            </div>

        {{Form::close()}}
        </div>

            <div class="col-sm-1">
            </div>

            <div class="col-sm-1">
            </div>
    </div>

@endsection