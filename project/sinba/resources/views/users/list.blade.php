@extends('layouts.crud.list')

@section('title')
  {{trans('strings.users')}}
@endsection

@section('links')
    <h2> <label class="ativo">{{trans('strings.users')}} </label> |
    <a href="{{ url('/users/create') }}">{{trans('strings.createUser')}}</a></h2>
@endsection


@section('search')
{{ Form::open(['url' => '/users/search', 'class' => 'form-inline']) }}
<div class="row searchBar">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar Usuários'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'title' => 'Buscar usuário'])}}
                {{Form::label(count($users) . ' resultado(s)', '',['style' => 'font-style: italic; font-size: x-small;'])}}
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
            <th>{{trans('strings.email')}}</th>
            <th>{{trans('strings.occupation')}}</th>
            <th>{{trans('strings.institution')}}</th>
            <th>{{trans('strings.isAdmin')}}</th>
            <th class="action">
                {{trans('strings.actions')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->occupation}}</td>
                <td>{{$user->institution}}</td>
                <td>{{$user->isAdmin ? trans('strings.yes') : trans('strings.no')}}</td>
                <td class="action">
                    {{Form::open([
                        'url' => "/users/{$user->id}",
                        'method' => 'delete'
                    ])}}
                    <a href="{{url("/users/{$user->id}/edit")}}">
                            <i class="fa fa-edit fa-2x text-info" data-toggle="tooltip" title="Editar"></i>
                    </a>
                    <a href="{{url("/users/{$user->id}")}}">
                            <i class="fa fa-search fa-2x text-info" data-toggle="tooltip" title="Ver detalhes"></i>
                    </a>
                    @if(!$user->isAdmin)
                    <a href="#" class="excluir" data-toggle="modal" data-target="confirm-delete">
                            <i class="fa fa-trash fa-2x text-danger" data-toggle="tooltip" title="{{trans('strings.delete')}}"></i>
                    </a>
                    @endif
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
                {{ trans('strings.delete') }} {{ trans('strings.user') }}
            </div>
            <div class="modal-body">
                {{ trans('strings.confirmDeleteSelectedUser') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('strings.cancel') }}</button>
                <a class="btn btn-danger btn-ok"> {{ trans('strings.delete') }} </a>
            </div>
        </div>
    </div>
</div>
@endsection



