@extends('layouts.crud.list')

@section('links')
    <h2>{{trans('strings.watersheds')}}</h2> |
    <a href="{{ url('/watersheds/create') }}">{{trans('strings.createWatershed')}}</a>
@endsection

@section('search')
    {{ Form::open([
        'url' => '/watersheds/search'
    ]) }}
    {{Form::label('search', trans('strings.watershedSearch') . ':')}}
    {{Form::text('search', Session::get('search'))}}
    {{Form::submit(trans('strings.search'), [
        'class' => 'btn btn-primary',
        'style' => 'padding: 2px 2px'
    ])}}
    {{Form::label(count($watersheds) . ' ' . trans('strings.results') , '',[
        'style' => 'font-style: italic; font-size: x-small;'
    ])}}
    {{ Form::close() }}
@endsection

@section('table')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{trans('strings.name')}}</th>
            <th class="action">
                {{trans('strings.actions')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($watersheds as $watershed)
            <tr>
                <td><a href="{{url("/watersheds/{$watershed->id}")}}">{{$watershed->name}}</a></td>
                <td class="action">
                    <a href="{{url("/watersheds/{$watershed->id}/edit")}}">
                        <button type="button" class="btn btn-success">
                            {{trans('strings.edit')}}
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
