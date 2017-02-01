@extends('layouts.crud.list')

@section('links')
    <h2>{{trans('strings.units')}}</h2> |
    <a href="{{ url('/units/create') }}">{{trans('strings.createUnit')}}</a>
@endsection

@section('search')
    {{ Form::open([
        'url' => '/units/search'
    ]) }}
    {{Form::label('search', trans('strings.searchUnit') . ':')}}
    {{Form::text('search', Session::get('search'))}}
    {{Form::submit(trans('strings.search'), [
        'class' => 'btn btn-primary',
        'style' => 'padding: 2px 2px'
    ])}}
    {{Form::label(count($units) . ' resultado(s)', '',[
        'style' => 'font-style: italic; font-size: x-small;'
    ])}}
    {{ Form::close() }}
@endsection

@section('table')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{trans('strings.name')}}</th>
            <th>{{trans('strings.symbol')}}</th>
            <th>{{trans('strings.base')}}</th>
            <th>{{trans('strings.other')}}</th>
            <th class="action">
                {{trans('strings.actions')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($units as $unit)
            <tr>
                <td>{{$unit->name}}</td>
                <td>{{$unit->symbol}}</td>
                <td>{{$unit->inBaseUnits}}</td>
                <td>{{$unit->inOtherUnits}}</td>
                <td class="action">
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
                        'class' => 'btn btn-warning',
                        'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");'
                    ])}}
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
