@extends('layouts.app')

@section('content')

    @include('includes.message')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        {{trans('strings.unitsSystem')}} |
                        <a href="{{ url('/units/create') }}">{{trans('strings.createUnit')}}</a>
                    </div>

                    <div class="panel-body">

                        <div id="search_form">
                        {{ Form::open(['url' => '/units']) }}
                            {{Form::label('search', trans('strings.searchUnit') . ':')}}
                            {{Form::text('search')}}
                            {{Form::submit(trans('strings.search'))}}
                        {{ Form::close() }}
                        </div>

                        <div>&nbsp;</div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th style="text-align: center">{{trans('strings.name')}}</th>
                                    <th style="text-align: center">{{trans('strings.symbol')}}</th>
                                    <th style="text-align: center">{{trans('strings.action')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $units = [
                                        (object)['name'=>'Metros', 'symbol'=>'m'],
                                        (object)['name'=>'Quilômetros', 'symbol'=>'km']
                                ];
                                ?>
                                @foreach($units as $unit)
                                <tr>
                                    <td style="text-align: center">{{$unit->name}}</td>
                                    <td style="text-align: center">{{$unit->symbol}}</td>
                                    <td style="text-align: center">
                                        <button type="button" class="btn btn-success"
                                                onclick="return false;">{{trans('strings.edit')}}</button>
                                        <button type="button" class="btn btn-warning"
                                                onclick="return false;">{{trans('strings.delete')}}</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection