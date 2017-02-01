@extends('layouts.crud.list')

@section('title')
  {{trans('strings.users')}}
@endsection

@section('links')
    <h2>{{trans('strings.users')}}</h2> |
    <a href="{{ url('/users/create') }}">{{trans('strings.createUser')}}</a>
@endsection

@section('search')
    {{ Form::open([
        'url' => '/users/search'
    ]) }}
    {{Form::label('search', trans('strings.searchUser') . ':')}}
    {{Form::text('search', Session::get('search'), [
        'placeholder' => 'Buscar usuário...'
    ])}}
    {{Form::submit(trans('strings.search'), [
        'class' => 'btn btn-primary',
        'style' => 'padding: 2px 2px'
    ])}}
    {{Form::label(count($users) . ' resultado(s)', '',[
        'style' => 'font-style: italic; font-size: x-small;'
    ])}}
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
                        <button type="button" class="btn btn-success">
                            {{trans('strings.edit')}}
                        </button>
                    </a>
                    <a href="{{url("/users/{$user->id}")}}">
                        <button type="button" class="btn btn-info">
                            {{trans('strings.view')}}
                        </button>
                    </a>
                    @if(!$user->isAdmin)
                    {{Form::submit(trans('strings.delete'), [
                        'class' => 'btn btn-warning',
                        'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");',
                        'style' => 'padding: 1px 1px'
                    ])}}
                    @endif
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
