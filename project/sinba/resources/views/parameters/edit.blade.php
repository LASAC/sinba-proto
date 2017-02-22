@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="panel-heading" style="text-align: center">
                    <h2>
                       <a href="{{ url('/parameters') }}">{{trans('strings.parameters')}}</a> |
                        <label class="ativo"> {{$title}}  </label> |
                    </h2>
                    <hr />
                </div>

                {{Form::open(['url' => $url, 'method' => $method])}}

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        {{Form::hidden('id', $model->id)}}
                        {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $model->name, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                             {{Form::label('unit_id', trans('strings.unit') . ':')}}

                            {{Form::select(
                                'unit_id',
                                (new App\Unit)->pluckNames(trans('strings.none')),
                                $model->unit_id ? $model->unit_id : 0,
                                [
                                    $readonly,
                                    'class' => 'form-control'
                                ]
                            )}}
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
            </div>
        </div>
    </div>
</div>
@endsection