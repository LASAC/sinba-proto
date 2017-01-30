@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <a href="{{ url('/parameters/') }}">{{trans('strings.parametersManagement')}}</a> |
                        <a href="{{ url('/units') }}">{{trans('strings.listUnits')}}</a> |
                        {{$title}}
                    </div>

                    <div class="panel-body">

                        <div id="unit">
                            {{Form::open([
                                'url' => $url,
                                'method' => $method
                            ])}}

                            {{Form::hidden('id', $model->id)}}

                            {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $model->name, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('symbol', trans('strings.symbol') . ':')}}
                            {{Form::text('symbol', $model->symbol, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('inBaseUnits', trans('strings.inBaseUnits') . ':')}}
                            {{Form::text('inBaseUnits', $model->inBaseUnits, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}
                            {{Form::label('inOtherUnits', trans('strings.inOtherUnits') . ':')}}
                            {{Form::text('inOtherUnits', $model->inOtherUnits, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection