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
                                    <th style="text-align: center">{{trans('strings.name')}}</th>
                                    <th style="text-align: center">{{trans('strings.symbol')}}</th>
                                    <th style="text-align: center">{{trans('strings.actions')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                <tr>
                                    <td style="text-align: center">{{$unit->name}}</td>
                                    <td style="text-align: center">{{$unit->symbol}}</td>
                                    <td style="text-align: center">
                                        {{Form::open([
                                            'url' => "/units/{$unit->id}",
                                            'method' => 'delete'
                                        ])}}
                                        <a href="{{url("/units/{$unit->id}/edit")}}">
                                            <button type="button" class="btn btn-success">
                                                {{trans('strings.edit')}}
                                            </button>
                                        </a>
                                        {{Form::submit(trans('strings.delete'), [
                                            'class' => 'btn btn-warning'
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