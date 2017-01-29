@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        <a href="{{ url('/parameters') }}">{{trans('strings.listParameters')}}</a> |
                        {{$title}}
                    </div>

                    <div class="panel-body">

                        <div id="parameter">
                            {{Form::open([
                                'url' => $url,
                                'method' => $method
                            ])}}

                            {{Form::hidden('id', $model->id)}}

                            {{Form::label('name', trans('strings.name') . ':')}}
                            {{Form::text('name', $model->name, [
                                $readonly,
                                'class' => 'form-control'
                            ])}}

                            {{Form::label('unit_id', trans('strings.symbol') . ':')}}

                            {{Form::select('unit_id', (new App\Unit)->pluckNames(), [
                                $readonly,
                                'class' => 'selectpicker'
                            ])}}

                            <hr />

                            @if($saveEnabled)
                                <div style="text-align: center">
                                {{Form::submit(trans('strings.save'), [
                                    'class' => 'btn btn-primary'
                                ])}}
                                </div>
                            @endif


                            {{Form::close()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection