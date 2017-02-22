@extends('layouts.crud.list')

@section('links')
    <h2><label class="ativo">{{trans('strings.data')}}</label> |
    <a href="{{ url('/data/create') }}">{{trans('strings.createData')}}</a> |
    <a href="{{ url('/parameters/') }}">{{trans('strings.parametersManagement')}}</a> |
    <a href="{{ url('/units') }}">{{trans('strings.unitsSystem')}}</a>
    </h2>
@endsection

@section('search')
{{ Form::open(['url' => '/data/search', 'class' => 'form-inline']) }}
<div class="row">

    <!-- USER -->
    <div class="col-sm-3">
        <div class="form-group">
            {{Form::select(
                'search_user_id',
                (new App\User)->pluckFullNames(trans('strings.all')),
                is_numeric(Session::get('search_user_id')) ? Session::get('search_user_id') : Auth::id(),
                [
                    'class' => 'form-control'
                ]
            )}}
        </div>
    </div>
    <!-- USER -->

    <!-- WATERSHED -->
    <div class="col-sm-3">
        <div class="form-group">
            {{Form::select(
                'search_watershed_id',
                (new App\Watershed)->pluckNames(trans('strings.all')),
                is_numeric(Session::get('search_watershed_id')) ? Session::get('search_watershed_id') : (new \App\WatershedAccess)->lastWatershedIdAccessedBy(Auth::id()),
                [
                    'class' => 'form-control'
                ]
            )}}
        </div>
    </div>
    <!-- WATERSHED -->

    <!-- PARAMETER -->
    <div class="col-sm-3">
        <div class="form-group">
            {{Form::select(
                'search_parameter_id',
                (new App\Parameter)->pluckNamesAndSymbols(trans('strings.all')),
                is_numeric(Session::get('search_parameter_id')) ? Session::get('search_parameter_id') : 0,
                [
                    'class' => 'form-control'
                ]
            )}}
        </div>
    </div>
    <!-- PARAMETER -->

    <!-- SEARCH BUTTON -->
    <div class="col-sm-3">
        <div class="form-group">
            <i class="fa fa-search fa-lg"></i>
            {{Form::submit(trans('strings.search'), ['class' => 'btn btn-primary'])}}
            {{Form::label(count($data) . ' resultado(s)', '',['style' => 'font-style: italic; font-size: x-small;'])}}
        </div>
    </div>
    <!-- SEARCH BUTTON -->

</div>
{{ Form::close() }}
@endsection

@section('table')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{trans('strings.watershed')}}</th>
            <th>{{trans('strings.parameter')}}</th>
            <th>{{trans('strings.value')}}</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>{{trans('strings.collectedAt')}}</th>
            <th>{{trans('strings.collectedBy')}}</th>
            <th>{{trans('strings.registeredBy')}}</th>
            <th>{{trans('strings.sharingType')}}</th>
            <th class="action">
                {{trans('strings.actions')}}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $dat)
            <tr>
                <td><a href="{{url("/watersheds/{$dat->watershed->id}")}}">{{$dat->watershed->name}}</a></td>
                <td>{{$dat->parameter->nameAndSymbol()}}</td>
                <td>{{$dat->value}}</td>
                <td>{{$dat->latitude}}</td>
                <td>{{$dat->longitude}}</td>
                <td>{{$dat->collected_at}}</td>
                <td>{{$dat->collected_by}}</td>
                <td>{{$dat->user->fullName()}}</td>
                <td>{{trans('strings.' . $dat->sharing_type)}}</td>
                <td class="action">
                    {{Form::open([
                        'url' => "/data/{$dat->id}",
                        'method' => 'delete'
                    ])}}
                    <a href="{{url("/data/{$dat->id}/edit")}}">
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

    @if(count($data) > 0)
        {{Form::open([
            'url' => "/data/export",
            'method' => 'post'
        ])}}
            {{Form::hidden('user_id', Session::get('search_user_id'))}}
            {{Form::hidden('watershed_id', Session::get('search_watershed_id'))}}
            {{Form::hidden('parameter_id', Session::get('search_parameter_id'))}}
            <div class="form-group">
                <button
                        type="submit"
                        class="btn btn-success btn-margins"
                >
                    <i class="fa fa-file-excel-o"></i>
                    Exportar
                </button>
            </div>
        {{Form::close()}}
    @endif

    <div class="modal" id="confirm-delete" style="z-index: 1050;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Excluir dado
            </div>
            <div class="modal-body">
                {{ trans('strings.confirmDeleteSelectedData') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('strings.cancel') }}</button>
                <a class="btn btn-danger btn-ok"> {{ trans('strings.delete') }} </a>
            </div>
        </div>
    </div>
</div>
@endsection
