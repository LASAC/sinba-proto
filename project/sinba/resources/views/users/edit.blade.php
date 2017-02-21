@extends('layouts.app') 

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="panel-heading" style="text-align: center">
                    <h2><a href="{{ url('/users') }}">{{trans('strings.listUsers')}}</a> | 
                    <label class="ativo"> {{$title}} </label> </h2>
                    <hr/>
                </div>
                {{Form::open([ 'url' => $url, 'method' => $method])}} 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                        {{Form::label('institution', trans('strings.institution') . ':')}}
                        {{Form::text('institution', $model->institution, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $model->name, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            {{Form::label('lastName',trans('strings.lastName') . ':')}} 
                            {{Form::text('lastName', $model->lastName, [ $readonly, 'class' => 'form-control'])}} 
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="form-group">
                            {{Form::label('occupation', trans('strings.occupation') . ':')}} 
                            {{Form::text('occupation', $model->occupation, [ $readonly, 'class'=> 'form-control' ])}} 
                            {{Form::hidden('id', $model->id)}} 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('birthDate', trans('strings.birthDate') . ':')}} 
                            {{Form::text('birthDate', $model->birthDate, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('cpf', trans('strings.cpf'). ':')}} 
                            {{Form::text('cpf', $model->cpf, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                    <div class="col-sm-4">    
                        <div class="form-group">
                            {{Form::label('rg',trans('strings.rg') . ':')}} 
                            {{Form::text('rg', $model->rg, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                </div>

                <div class="form-group">
                {{Form::label('address',trans('strings.address') . ':')}} 
                {{Form::text('address', $model->address, [ $readonly, 'class' => 'form-control'])}} 
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('email', trans('strings.email') . ':')}} 
                            {{Form::text('email', $model->email, [ $readonly, 'class' => 'form-control' ])}} 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('phone', trans('strings.phone') . ':')}} 
                            {{Form::text('phone', $model->phone, [ $readonly,'class' => 'form-control' ])}} 
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {{Form::label('cellphone', trans('strings.cellphone') . ':')}} 
                            {{Form::text('cellphone',$model->cellphone, [ $readonly, 'class' => 'form-control' ])}}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                {{Form::label('justification', trans('strings.justification'). ':')}} 
                {{Form::text('justification', $model->justification, [ 'readonly', 'class' => 'form-control' ])}}
                </div>

                <div class="form-group">
                @if(!empty($readonly)) 
                    {{Form::label( 'isAdmin', trans('strings.isAdmin') . ' ' . ($model->isAdmin ? trans('strings.yes'): trans('strings.no')) . '.' )}} 
                @else 
                    {{Form::label('isAdmin', trans('strings.isAdmin'))}}
                    {{Form::checkbox('isAdmin',$model->isAdmin, [ 'readonly','disabled'])}} 
                @endif
                </div>

                <hr /> @if($saveEnabled)
                <div style="text-align: center"> {{Form::submit(trans('strings.save'), [ 'class' => 'btn btn-primary' ])}}</div>
                @endif 
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection