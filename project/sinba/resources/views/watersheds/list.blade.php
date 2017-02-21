@extends('layouts.crud.list')

@section('links')
    <h2><label class="ativo">{{trans('strings.watersheds')}} </label> |
    <a href="{{ url('/watersheds/create') }}">{{trans('strings.createWatershed')}}</a>
    </h2>
@endsection

@section('search')
{{ Form::open(['url' => '/watersheds/search', 'class' => 'form-inline']) }}
<div class="row searchBar">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="form-group">
                <i class="fa fa-search fa-lg"></i>
                {{Form::text('search', Session::get('search'), ['class' => 'form-control', 'placeholder' => 'Buscar bacia'])}}
                {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary'])}}
                {{Form::label(count($watersheds) . ' ' . trans('strings.results'), '',['style' => 'font-style: italic; font-size: x-small;'])}}
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
                            <i class="fa fa-edit fa-2x text-info" data-toggle="tooltip" title="{{trans('strings.edit')}}"></i>
                    </a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
