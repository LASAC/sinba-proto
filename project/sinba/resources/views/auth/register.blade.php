@extends('layouts.public')

@section('style')
<link href="/css/auth/register.css?<?=date('YmdHis')?>" rel="stylesheet">
@endsection

@section('content')
<div class="container" ng-controller="RegisterCtrl as ctrl" ng-init="init()">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.register.title')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('strings.name')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('strings.lastName')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="lastName" value="{{ old('lastName') }}" required >

                                @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthDate') ? ' has-error' : '' }}">
                            <label for="birthDate" class="col-md-4 control-label">{{trans('strings.birthDate')}}</label>

                            <div class="col-md-6">
                                <div class="form-control datepicker-container">

                                    <md-datepicker
                                        ng-model="birthDate"
                                        md-current-view="year"
                                        md-placeholder=""
                                    >
                                    </md-datepicker>

                                    <input type="hidden" name="birthDate" value="<[ birthDate | date:'dd/MM/yyyy' ]>" />

                                    <input
                                        type="hidden"
                                        name="oldBirthDate"
                                        value="{{ old('birthDate') }}"
                                        id="oldBirthDate"
                                    />

                                </div>

                                @if ($errors->has('birthDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birthDate') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                            <label for="dpf" class="col-md-4 control-label">{{trans('strings.cpf')}}</label>

                            <div class="col-md-6">
                                <input
                                    id="cpf"
                                    name="cpf"
                                    value="{{ old('cpf') }}"
                                    type="text"
                                    class="form-control"
                                    placeholder="___.___.___-__"
                                    required
                                    autofocus
                                />

                                @if ($errors->has('cpf'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">{{trans('strings.rg')}}</label>

                            <div class="col-md-6">
                                <input id="rg" type="text" class="form-control" name="rg" value="{{ old('rg') }}" required autofocus>

                                @if ($errors->has('rg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">{{trans('strings.address')}}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">{{trans('strings.phone')}}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cellphone') ? ' has-error' : '' }}">
                            <label for="cellphone" class="col-md-4 control-label">{{trans('strings.cellphone')}}</label>

                            <div class="col-md-6">
                                <input id="cellphone" type="text" class="form-control" name="cellphone" value="{{ old('cellphone') }}" required autofocus>

                                @if ($errors->has('cellphone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cellphone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('occupation') ? ' has-error' : '' }}">
                            <label for="occupation" class="col-md-4 control-label">{{trans('strings.occupation')}}</label>

                            <div class="col-md-6">
                                <input id="occupation" type="text" class="form-control" name="occupation" value="{{ old('occupation') }}" required autofocus>

                                @if ($errors->has('occupation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('institution') ? ' has-error' : '' }}">
                            <label for="institution" class="col-md-4 control-label">{{trans('strings.institution')}}</label>

                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control" name="institution" value="{{ old('institution') }}" required autofocus>

                                @if ($errors->has('institution'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institution') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('justification') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('strings.justification')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="justification" value="{{ old('justification') }}" required >

                                @if ($errors->has('justification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('justification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{trans('strings.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('strings.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">{{trans('strings.confirmPassword')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('strings.register')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
