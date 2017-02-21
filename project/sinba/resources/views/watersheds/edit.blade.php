@extends('layouts.app')

@section('style')
<link href="/css/watersheds.css" rel="stylesheet">
<link href="/css/custom.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="panel-heading" style="text-align: center">
                    <h2>
                    <a href="{{ url('/watersheds/') }}">{{trans('strings.watershedsManagement')}}</a> |
                        <label class="ativo"> Cadastrar Bacia</label>
                        </h2>
                        <hr/>
                </div>


       {{Form::open([
            'url' => $url,
            'method' => $method,
            'files' => true
        ])}}
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                        {{Form::hidden('id', $watershed->id)}}
                        {{ trans('strings.watershedName') }}:
                    {{Form::text('name', $watershed->name, [
                    'class' => 'form-control'
                    ])}}
            </div>
        </div>
        <div class="col-sm-4"><span></span>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                    {{ trans('strings.levelAbove') }}:
                    {{Form::select(
                    'parent_id',
                    $watershed->pluckOtherNames(trans('strings.none')),
                    $watershed->parent_id ? $watershed->parent_id : 0,
                    [
                        'class' => 'form-control'
                    ]
                )}}
            </div>
        </div>
        
        <div class="col-sm-4">
        </div>
        </div>
        <hr />

         <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                        <h4>{{ trans('strings.information') }}</h4>
                    </div>
            </div>

        <div class="col-sm-4">
            </div>
        </div>
            
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

    </div>
</div>
</div>
</div>
</div>
@endsection