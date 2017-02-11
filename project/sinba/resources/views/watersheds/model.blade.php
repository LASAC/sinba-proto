@extends('layouts.app')
@section('script')
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

            <h4>{{trans('strings.dataRegister')}}</h4>

            <hr />

            <div class="checkbox">
                <label style="font-weight: bold">
                    <input ng-model="importData" type="checkbox"> {{trans('strings.importDataFromExistingSheet')}}
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
                    <input ng-model="createNewSheet" type="checkbox"> {{trans('strings.createNewSheet')}}
                </label>
            </div>

            <div ng-show="createNewSheet">
                <br />

                <div>
                    <form action="action_page.php">
                        <label for="fname">Nome do Modelo</label>
                        <input type="text" id="fname" name="nomeModelo">
                    </form>
                </div>


                </br>

                <div class="form-group">
                    <label for="parameter_id">{{trans('strings.selectParameter')}}:</label>
                    <select id="parameter_id"
                            ng-model="selectedParameter"
                            ng-options="nameAndSymbol(parameter) for parameter in parameterList"
                            ng-change="parameterListChanged()"></select>
                </div>

                <button type="button" class="btn btn-default">Adicionar</button>

                <div class="form-group">
                    <label for="comment">Parâmetros e Unidades selecionados:</label>
                    <textarea id="textareaParameters" class="form-control" rows="5"
                              ng-model="textareaParameters" disabled
                    ></textarea>
                </div>

                </br>

                <button type="button" class="btn btn-default">Definir Linha e Coluna Inicial</button>
                <button type="button" class="btn btn-default">Visualizar Modelo</button>
                <button type="button" class="btn btn-default">Exportar Modelo</button>
            </div>

        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
    </div>

@endsection