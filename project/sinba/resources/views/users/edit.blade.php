@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                <div class="x_panel">
                    <div class="panel-heading" style="text-align: center">
                        <a href="{{ url('/users') }}">{{trans('strings.listUsers')}}</a> |
                        {{$title}}
                    </div>
                    <div class="x_content">
                        <div id="user">
                            {{Form::open([
                                'url' => $url,
                                'method' => $method
                            ])}}

                            {{Form::label('institution', trans('strings.institution') . ':')}}
                            {{Form::text('institution', $model->institution, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('occupation', trans('strings.occupation') . ':')}}
                            {{Form::text('occupation', $model->occupation, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::hidden('id', $model->id)}}

                            {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $model->name, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('lastName', trans('strings.lastName') . ':')}}
                            {{Form::text('lastName', $model->lastName, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('email', trans('strings.email') . ':')}}
                            {{Form::text('email', $model->email, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('birthDate', trans('strings.birthDate') . ':')}}
                            {{Form::text('birthDate', $model->birthDate, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('cpf', trans('strings.cpf') . ':')}}
                            {{Form::text('cpf', $model->cpf, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('rg', trans('strings.rg') . ':')}}
                            {{Form::text('rg', $model->rg, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('address', trans('strings.address') . ':')}}
                            {{Form::text('address', $model->address, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('phone', trans('strings.phone') . ':')}}
                            {{Form::text('phone', $model->phone, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('cellphone', trans('strings.cellphone') . ':')}}
                            {{Form::text('cellphone', $model->cellphone, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('justification', trans('strings.justification') . ':')}}
                            {{Form::text('justification', $model->justification, [
                                'readonly',
                                'class' => 'form-control'
                            ])}}

                            @if(!empty($readonly))
                                {{Form::label(
                                    'isAdmin',
                                    trans('strings.isAdmin') . ' ' . ($model->isAdmin ? trans('strings.yes') : trans('strings.no')) . '.'
                                )}}
                            @else
                                {{Form::label('isAdmin', trans('strings.isAdmin') . ':')}}
                                {{Form::checkbox('isAdmin', $model->isAdmin, [
                                    'readonly','disabled',
                                    'class' => 'form-control'
                                ])}}
                            @endif

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
