@extends('layouts.crud.list')

@section('title')
  {{trans('strings.users')}}
@endsection

@section('links')
    <h2>{{trans('strings.users')}}</h2> |
    <a href="{{ url('/users/create') }}">{{trans('strings.createUser')}}</a>
@endsection


@section('search')
{{ Form::open(['url' => '/users/search', 'class' => 'form-inline']) }}
<div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar Usuários'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary'])}}
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
                        <button type="button" class="btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i>
                            {{trans('strings.edit')}}
                        </button>
                    </a>
                    <a href="{{url("/users/{$user->id}")}}">
                        <button type="button" class="btn btn-info btn-sm">
                            <i class="fa fa-search"></i>
                            {{trans('strings.view')}}
                        </button>
                    </a>
                    @if(!$user->isAdmin)
                    {{Form::button("<i class='fa fa-trash-o'></i> " . trans('strings.delete'), [
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");'
                    ])}}
                    @endif
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
