@extends('layouts.crud.list')

@section('links')
    <h2> <label class="ativo">{{trans('strings.units')}}</label> |
    <a href="{{ url('/units/create') }}">{{trans('strings.createUnit')}}</a> </h2> 
@endsection

@section('search')
{{ Form::open(['url' => '/units/search', 'class' => 'form-inline']) }}
<div class="row searchBar">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar Unidade'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Buscar unidade'])}}
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
                            <i class="fa fa-edit fa-2x text-info" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="#" class="excluir" data-toggle="modal" data-target="confirm-delete">
                            <i class="fa fa-trash fa-2x text-danger" data-toggle="tooltip" title="{{trans('strings.delete')}}"></i>
                    </a>
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>


<div class="modal" id="confirm-delete" style="z-index: 1050;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Excluir unidade
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir a unidade selecionada ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok"> Excluir </a>
            </div>
        </div>
    </div>
</div>
@endsection

