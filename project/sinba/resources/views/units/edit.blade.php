@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="panel-heading" style="text-align: center">
                    <a href="{{ url('/parameters/') }}">{{trans('strings.parametersManagement')}}</a> |
                        <a href="{{ url('/units') }}">{{trans('strings.listUnits')}}</a> |
                        {{$title}}
                </div>

                <fieldset>
                    <legend style="text-align: center">Cadastrar Unidade</legend>
                {{Form::open(['url' => $url, 'method' => $method])}}

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        {{Form::hidden('id', $model->id)}}
                        {{Form::label('name', trans('strings.name') . ':')}}
                        {{Form::text('name', $model->name, [$readonly,
                                'class' => 'form-control'
                        ])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('symbol', trans('strings.symbol') . ':')}}
                            {{Form::text('symbol', $model->symbol, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        {{Form::label('inBaseUnits', trans('strings.inBaseUnits') . ':')}}
                            {{Form::text('inBaseUnits', $model->inBaseUnits, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{Form::label('inOtherUnits', trans('strings.inOtherUnits') . ':')}}
                            {{Form::text('inOtherUnits', $model->inOtherUnits, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}
                        </div>
                    </div>
                </div>
                         <hr /> 
                 @if($saveEnabled)
                                <div style="text-align: center">
                                {{Form::submit(trans('strings.save'), [
                                    'class' => 'btn btn-primary'
                                ])}}
                                </div>
                            @endif
                {{Form::close()}}

                </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
@endsection