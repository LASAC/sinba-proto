@extends('layouts.crud.list')

@section('links')
    <h2>
        <label class="ativo">{{trans('strings.listParameters')}}</label> |
        <a href="{{ url('/parameters/create') }}">{{trans('strings.createParameter')}}</a> |
        <a href="{{ url('/units') }}">{{trans('strings.unitsSystem')}}</a> |
        <a href="{{ url('/data') }}">{{trans('strings.dataRegister')}}</a>
    </h2>
@endsection

@section('search')
{{ Form::open(['url' => '/parameters/search', 'class' => 'form-inline']) }}
<div class="row searchBar">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar parâmetro'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary'])}}
                {{Form::label(count($parameters) . ' resultado(s)', '',['style' => 'font-style: italic; font-size: x-small;'])}}
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
            <th>{{trans('strings.unit')}}</th>
            <th>{{trans('strings.symbol')}}</th>
            <th class="action">
                {{trans('strings.actions')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($parameters as $parameter)
            <tr>
                <td>{{$parameter->name}}</td>
                <td>{{$parameter->unitName()}}</td>
                <td>{{$parameter->symbol()}}</td>
                <td class="action">
                    {{Form::open([
                        'url' => "/parameters/{$parameter->id}",
                        'method' => 'delete'
                    ])}}
                    <a href="{{url("/parameters/{$parameter->id}/edit")}}">
                            <i class="fa fa-edit fa-2x text-info" data-toggle="tooltip" title="{{trans('strings.edit')}}"></i>
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
                Excluir parâmetro
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir o parâmetro selecionado ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-danger btn-ok"> Excluir </a>
            </div>
        </div>
    </div>
</div>
@endsection
