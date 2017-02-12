@extends('layouts.app')
@section('script')
    <script src="/js/services/Notify.js"></script>
    <script src="/js/controllers/WatershedModelCtrl.js"></script>
@endsection
@section('style')
    <link href="/css/watersheds/model.css" rel="stylesheet">
@endsection
@section('content')
    <div class="row" ng-controller="WatershedModelCtrl" ng-init="init()">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-8 content">
            <h1>{{$watershed->name}}</h1>
            <h5>
                {{trans('strings.levelAbove')}}:
                @if($parent)
                    <a href="{{ url('watersheds/' . $parent->id) }}">{{ $parent->name }}</a>
                @else
                    -
                @endif
            </h5>

            <hr />

            <div class="checkbox">
                <label style="font-weight: bold">
                    <input ng-model="importData" type="checkbox" disabled>
                    {{trans('strings.importDataFromExistingSheet')}}
                </label>
            </div>

            <div ng-show="importData">
                <br />

                Selecione o Modelo:

                <br />
                <br />

                <!-- Trigger the modal with a button -->
                <button ng-click="chooseModel()"
                        type="button"
                        class="btn btn-info btn-lg"
                >
                    Modelo 1
                </button>

                <!-- Trigger the modal with a button -->
                <button ng-click="chooseModel()"
                        type="button"
                        class="btn btn-info btn-lg"
                >
                    Modelo 2
                </button>

                <!-- Trigger the modal with a button -->
                <button ng-click="chooseModel()"
                        type="button"
                        class="btn btn-info btn-lg"
                >
                    Modelo 3
                </button>

                <br />
                <br />

                <div class="form-group">
                    <label for="comment">Informações adicionais</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>

                <button type="button" class="btn btn-default">Upload</button>

                <br />
                <br />

                <div ng-show="showError()" class="alert alert-danger">
                    <strong>{{trans('strings.warning')}}!</strong> Planilha não compatível com modelo selecionado.
                </div>
            </div>

            <hr />

            <div class="checkbox">
                <label style="font-weight: bold">
                    <input ng-model="createNewSheet" type="checkbox">
                    {{trans('strings.createNewSheet')}}
                </label>
            </div>

            <div ng-show="createNewSheet">
                <br>

                <div>
                    <form class="form-group" action="action_page.php">
                        <label for="modelName">{{trans('strings.modelName')}}:</label>
                        <input class="form-control" type="text" id="modelName" name="modelName" ng-model="modelName">
                    </form>
                </div>


                <br>

                <div class="white-box-container">
                    <div class="form-group">
                        <label for="parameter_id">{{trans('strings.selectParameter')}}:</label>
                        <select multiple id="parameter_id" class="form-control"
                                ng-model="availableSelected"
                                ng-options="nameAndSymbol(parameter) for parameter in availableParameters | orderBy:'name':false:localeSensitiveComparator"
                        >
                        </select>
                    </div>

                    <div class="white-box-buttons">
                        <button ng-click="add()" type="button" class="btn btn-default">{{trans('strings.add')}}</button>
                        <button ng-click="remove()" type="button" class="btn btn-default">{{trans('strings.remove')}}</button>
                    </div>

                    <div class="form-group">
                        <label for="selectedParametersDisplay">{{trans('strings.selectedParameters')}}:</label>
                        <select multiple id="chosenSelected" class="form-control"
                                ng-model="chosenSelected"
                                ng-options="nameAndSymbol(parameter) for parameter in chosenParameters | orderBy:'name':false:localeSensitiveComparator"
                        ></select>
                    </div>

                </div>

                <div class="white-box-container">
                    {{--<button type="button" class="btn btn-default">Definir Linha e Coluna Inicial</button>--}}
                    {{--<button type="button" class="btn btn-default">Visualizar Modelo</button>--}}
                    <button ng-click="exportModel()" type="button" class="btn btn-default">{{trans('strings.exportModel')}}</button>
                </div>

                <br>

            </div>

        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
    </div>

@endsection