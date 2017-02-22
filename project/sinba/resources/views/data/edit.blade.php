@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="col-md-12">
                {{Form::open(['url' => $url, 'method' => $method])}}
                <div class="x_panel">
                    <div class="panel-heading" style="text-align: center">
                        <h2>
                            <a href="{{ url('/data') }}">{{trans('strings.data')}}</a> |
                            <label class="ativo"> {{$title}} </label>
                        </h2>
                        <hr/>
                    </div>

                    <!-- DATA VALUE AND PARAMETER -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::hidden('id', $model->id)}}
                                {{Form::label('value', trans('strings.value') . ':')}}
                                {{Form::text('value', $model->value, [$readonly,
                                        'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('parameter_id', trans('strings.parameter') . ':')}}

                                {{Form::select(
                                    'parameter_id',
                                    (new App\Parameter)->pluckNamesAndSymbols(trans('strings.none')),
                                    $model->parameter_id ? $model->parameter_id : 0,
                                    [
                                        $readonly,
                                        'class' => 'form-control'
                                    ]
                                )}}
                            </div>
                        </div>
                    </div>

                    <!-- WATERSHED/LAT/LONG -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('watershed_id', trans('strings.watershed') . ':')}}

                                {{Form::select(
                                    'watershed_id',
                                    (new App\Watershed)->pluckNames(trans('strings.none')),
                                    $model->watershed_id ? $model->watershed_id : (new \App\WatershedAccess)->lastWatershedIdAccessedBy(Auth::id()),
                                    [
                                        $readonly,
                                        'class' => 'form-control'
                                    ]
                                )}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('latitude', 'Latitude:')}}
                                {{Form::text('latitude', $model->latitude, [
                                    $readonly,
                                    'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('longitude', 'Longitude:')}}
                                {{Form::text('longitude', $model->longitude, [
                                    $readonly,
                                    'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                    </div>

                    <!-- COLLECT INFO -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('collected_by', trans('strings.collectedBy') . ':')}}
                                {{Form::text('collected_by', $model->collected_by, [
                                    $readonly,
                                    'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('collected_at', trans('strings.collectedAt') . ':')}}
                                {{Form::text('collected_at', $model->collected_date, [
                                    $readonly,
                                    'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                    </div>

                    <!-- SHARING INFO -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('user_id', trans('strings.registeredBy') . ':')}}
                                {{Form::hidden('user_id', Auth::id())}}
                                {{Form::text('', Auth::user()->fullName(), [
                                    'readonly',
                                    'class' => 'form-control'
                                ])}}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{Form::label('sharing_type', trans('strings.sharingType') . ':')}}
                                {{Form::select(
                                    'sharing_type',
                                    $model->sharingTypes(),
                                    $model->sharing_type ? $model->sharing_type : 'Private',
                                    [
                                        $readonly,
                                        'class' => 'form-control'
                                    ]
                                )}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="x_panel">-->
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