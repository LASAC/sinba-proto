@extends('layouts.crud.list')

@section('links')
    {{trans('strings.listParameters')}} |
    <a href="{{ url('/parameters/create') }}">{{trans('strings.createParameter')}}</a>
@endsection

@section('search')
    {{ Form::open([
        'url' => '/parameters/search'
    ]) }}
    {{Form::label('search', trans('strings.searchParameter') . ':')}}
    {{Form::text('search', Session::get('search'))}}
    {{Form::submit(trans('strings.search'), [
        'class' => 'btn btn-primary',
        'style' => 'padding: 2px 2px'
    ])}}


    {{Form::label(count($parameters) . ' resultado(s)', '',[
        'style' => 'font-style: italic; font-size: x-small;'
    ])}}
    {{ Form::close() }}
@endsection

@section('table')
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{trans('strings.name')}}</th>
            <th>{{trans('strings.unit')}}</th>
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
                <td class="action">
                    {{Form::open([
                        'url' => "/parameters/{$parameter->id}",
                        'method' => 'delete'
                    ])}}
                    <a href="{{url("/parameters/{$parameter->id}/edit")}}">
                        <button type="button" class="btn btn-success"
                                style="padding: 1px 1px">
                            {{trans('strings.edit')}}
                        </button>
                    </a>
                    {{Form::submit(trans('strings.delete'), [
                        'class' => 'btn btn-warning',
                        'onclick' => 'return confirm("' . trans('strings.confirmDelete') .'");',
                        'style' => 'padding: 1px 1px'
                    ])}}
                    {{Form::close()}}
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
