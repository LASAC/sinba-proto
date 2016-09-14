@extends('layouts.app')

@section('style')
    <style>
        td.action {
            width: 150px;
        }
    </style>
@endsection

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
                        {{ Form::open([
                            'url' => '/units/search'
                        ]) }}
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
                                    <th>{{trans('strings.quantity')}}</th>
                                    <th>{{trans('strings.name')}}</th>
                                    <th>{{trans('strings.symbol')}}</th>
                                    <th>{{trans('strings.other')}}</th>
                                    <th>{{trans('strings.base')}}</th>
                                    <th class="action">
                                        {{trans('strings.actions')}}
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                <tr>
                                    <td>{{$unit->quantity}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->symbol}}</td>
                                    <td>{{$unit->inOtherUnits}}</td>
                                    <td>{{$unit->inBaseUnits}}</td>
                                    <td class="action">
                                        {{Form::open([
                                            'url' => "/units/{$unit->id}",
                                            'method' => 'delete'
                                        ])}}
                                        <a href="{{url("/units/{$unit->id}/edit")}}">
                                            <button type="button" class="btn btn-success"
                                                    style="padding: 1px 1px">
                                                {{trans('strings.edit')}}
                                            </button>
                                        </a>
                                        {{Form::submit(trans('strings.delete'), [
                                            'class' => 'btn btn-warning',
                                            'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");',
                                            'style' => 'padding: 1px 1px'
                                        ])}}
                                        {{Form::close()}}
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