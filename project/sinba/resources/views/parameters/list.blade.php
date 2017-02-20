@extends('layouts.crud.list')

@section('links')
    <h2>{{trans('strings.listParameters')}}</h2> |
    <a href="{{ url('/parameters/create') }}">{{trans('strings.createParameter')}}</a>
@endsection

@section('search')
{{ Form::open(['url' => '/parameters/search', 'class' => 'form-inline']) }}
<div class="row">
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
