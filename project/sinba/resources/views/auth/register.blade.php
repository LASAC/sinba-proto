@extends('layouts.public')

@section('style')
<link href="/css/auth/register.css?<?=date('YmdHis')?>" rel="stylesheet">
@endsection

@section('script')
<script src="/js/libs/masks.js"></script>
@endsection

@section('content')
<div class="container" ng-controller="RegisterCtrl as ctrl" ng-init="init()">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.register.title')}}</div>
                <div class="panel-body">
                    <form name="registerForm" class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
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
                                        md-open-on-focus
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

                        <div
                            class="form-group {{ $errors->has('cpf') ? 'has-error' : '' }}"
                            ng-class="{'has-error': !cpfFocus && registerForm.maskedCpf.$error.cpf}"
                        >
                            <label for="dpf" class="col-md-4 control-label">{{trans('strings.cpf')}}</label>

                            <div class="col-md-6">
                                <input
                                    ui-br-cpf-mask
                                    class="form-control"
                                    type="text"
                                    name="maskedCpf"
                                    ng-model="cpf"
                                    ng-focus="cpfFocus = true"
                                    ng-blur="cpfFocus = false"
                                    placeholder="___.___.___-__"
                                    id="maskedCpf"
                                />

                                <input type="hidden" name="cpf" value="<[ cpf ]>" />
                                <input
                                    name="oldCpf"
                                    type="hidden"
                                    value="{{ old('cpf') }}"
                                    id="oldCpf"
                                />

                                <span class="help-block">
                                    <strong>{{ $errors->first('cpf') }}</strong>
                                    <strong ng-cloak ng-show="!cpfFocus && registerForm.maskedCpf.$error.cpf">{{trans('auth.validations.cpf')}}</strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rg') ? ' has-error' : '' }}">
                            <label for="rg" class="col-md-4 control-label">{{trans('strings.rg')}}</label>

                            <div class="col-md-6">
                                <input
                                    type="text"
                                    name="rg"
                                    value="{{ old('rg') }}"
                                    id="rg"
                                    maxlength="15"
                                    class="form-control"
                                    required
                                    autofocus
                                />

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

                        <div
                            class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}"
                            ng-class="{'has-error': !phoneFocus && !isValidPhone()}"
                        >
                            <label for="phone" class="col-md-4 control-label">{{trans('strings.phone')}}</label>

                            <div class="col-md-6">
                                <input
                                    ui-br-phone-number
                                    class="form-control"
                                    type-"text"
                                    name="maskedPhone"
                                    ng-model="phone"
                                    ng-focus="phoneFocus = true"
                                    ng-blur="phoneFocus = false"
                                    placeholder="(67) 3333-3333"
                                />

                                <input type="hidden" name="phone" value="<[ phone ]>" />
                                <input
                                    name="oldPhone"
                                    type="hidden"
                                    value="{{ old('phone') }}"
                                    id="oldPhone"
                                />

                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                    <strong
                                        ng-cloak
                                        ng-show="!phoneFocus && !isValidPhone()"
                                    >
                                        {{trans('validation.custom.phone.regex')}}
                                    </strong>
                                </span>
                            </div>
                        </div>

                        <div
                            class="form-group {{ $errors->has('cellphone') ? 'has-error' : '' }}"
                            ng-class="{'has-error': !cellphoneFocus && !isValidCellphone()}"
                        >
                            <label for="cellphone" class="col-md-4 control-label">{{trans('strings.cellphone')}}</label>

                            <div class="col-md-6">
                                <input
                                    ui-br-phone-number
                                    class="form-control"
                                    type-"text"
                                    name="maskedPhone"
                                    ng-model="cellphone"
                                    ng-focus="cellphoneFocus = true"
                                    ng-blur="cellphoneFocus = false"
                                    placeholder="(67) 93333-3333"
                                />

                                <input type="hidden" name="cellphone" value="<[ cellphone ]>" />
                                <input
                                    name="oldCellphone"
                                    type="hidden"
                                    value="{{ old('cellphone') }}"
                                    id="oldCellphone"
                                />

                                <span class="help-block">
                                    <strong>{{ $errors->first('cellphone') }}</strong>
                                    <strong
                                        ng-cloak
                                        ng-show="!cellphoneFocus && !isValidCellphone()"
                                    >
                                        {{trans('validation.custom.cellphone.regex')}}
                                    </strong>
                                </span>
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
