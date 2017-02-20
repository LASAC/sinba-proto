@extends('layouts.crud.list')

@section('links')
    <h2>{{trans('strings.units')}}</h2> |
    <a href="{{ url('/units/create') }}">{{trans('strings.createUnit')}}</a>
@endsection

@section('search')
{{ Form::open(['url' => '/units/search', 'class' => 'form-inline']) }}
<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar Unidade'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary'])}}
                {{Form::label(count($units) . ' resultado(s)', '',['style' => 'font-style: italic; font-size: x-small;'])}}
            </div>
        </div>
</div>
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
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                            {{trans('strings.edit')}}
                        </button>
                    </a>
                    {{Form::button("<i class='fa fa-trash-o'></i> " . trans('strings.delete'), [
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-sm',
                        'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");'
                    ])}}
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
