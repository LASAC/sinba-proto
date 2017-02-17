<div ng-controller="CreateModelCtrl" ng-init="init()">
    <div class="checkbox">
        <label style="font-weight: bold">
            <input ng-model="createNewSheet" type="checkbox">
            {{trans('strings.createNewSheet')}}
        </label>
    </div>

    <div ng-show="createNewSheet">
        <br>
        <h3>{{trans('strings.step')}} <[ step ]>: <[ getStepDescription() ]></h3>

        <!-- STEP 1 -->
        <div ng-show="step === 1">
            <div class="white-box-container">

                <div class="form-group">
                    <label for="parameter_id">{{trans('strings.availableParameteres')}}:</label>
                    <select multiple id="parameter_id" class="form-control box"
                            ng-model="availableParameters.selected"
                            ng-options="nameAndSymbol(parameter) for parameter in availableParameters.all | orderBy:'name':false:localeSensitiveComparator"
                    >
                    </select>
                </div>

                <div class="white-box-buttons">
                    <button ng-click="add()" type="button" class="btn btn-default">{{trans('strings.add')}}</button>
                    <button ng-click="remove()" type="button" class="btn btn-default">{{trans('strings.remove')}}</button>
                </div>

                <div class="form-group">
                    <label for="selectedParametersDisplay">{{trans('strings.selectedParameters')}}:</label>
                    <select multiple id="chosenSelected" class="form-control box"
                            ng-model="chosenParameters.selected"
                            ng-options="nameAndSymbol(parameter) for parameter in chosenParameters.all | orderBy:'name':false:localeSensitiveComparator"
                    >
                    </select>
                </div>

            </div>

            <br>

            <div>
                <form class="form-group" action="action_page.php">
                    <label for="modelName">{{trans('strings.modelName')}}:</label>
                    <input class="form-control" type="text" id="modelName" name="modelName" ng-model="model.name">
                </form>
            </div>
        </div>

        <!-- STEP 2 -->
        <div ng-show="step === 2">
            <div class="white-box-container">
                <div class="form-group">
                    <label for="parameter_id">{{trans('strings.orderedColumns')}}:</label>
                    <select multiple id="parameter_id" class="form-control box"
                            ng-model="reorderedParameter.selected"
                            ng-options="nameAndSymbol(parameter) for parameter in reorderedParameter.all"
                            ng-blur="reorderedChanged()"
                    >
                    </select>
                </div>

                <div class="white-box-buttons">
                    <button ng-click="moveUp()" type="button" class="btn btn-default">
                        {{trans('strings.moveUp')}}
                    </button>
                    <button ng-click="moveDown()" type="button" class="btn btn-default">
                        {{trans('strings.moveDown')}}
                    </button>
                    <button ng-click="swap()" type="button" class="btn btn-default">
                        {{trans('strings.invert')}}
                    </button>
                    <button ng-click="remove()" type="button" class="btn btn-default">
                        {{trans('strings.remove')}}
                    </button>
                </div>

                <div class="form-group">
                    <label for="selectedParametersDisplay">{{trans('strings.columnLabels')}}:</label>
                    <textarea id="columnLabels" class="form-control box"
                              ng-model="labels.text"
                              ng-blur="updateLabelsFromText()"
                    >
                    </textarea>
                </div>
            </div>

            <br>

            <div>
                <p>{{trans('strings.layout')}}: {{trans('strings.headerOnFirst')}} <b><[getLayout()]></b></p>
                <div class="checkbox">
                    <label style="font-weight: bold">
                        <input ng-model="model.layout_header_in_first_column" type="checkbox">
                        {{trans('strings.invert')}} {{trans('strings.layout')}}
                    </label>
                </div>
            </div>
        </div>

        <!-- STEP 3 -->
        <div ng-show="step === 3">
            <div class="white-box-container">
                <div class="form-group">
                    <label for="parameter_id">{{trans('strings.orderedColumns')}}:</label>
                    <select multiple id="parameter_id" class="form-control box"
                            ng-model="reorderedParameter.selected"
                            ng-options="nameAndSymbol(parameter) for parameter in reorderedParameter.all"
                            disabled
                    >
                    </select>
                </div>

                <div class="white-box-buttons">
                    <span style="width: 90px;">&nbsp;</span>
                </div>

                <div class="form-group">
                    <label for="selectedParametersDisplay">{{trans('strings.columnLabels')}}:</label>
                    <textarea id="columnLabels" class="form-control box"
                              ng-model="labels.text"
                              disabled
                    >
                    </textarea>
                </div>
            </div>

            <br>

            <div>
                <p>{{trans('strings.modelName')}}: <b><[model.name]></b></p>
                <p style="text-transform: uppercase;">{{trans('strings.layout')}}: {{trans('strings.headerOnFirst')}} <b><[getLayout()]></b></p>
            </div>
        </div>

        <div class="white-box-container">
            {{--<button type="button" class="btn btn-default">Definir Linha e Coluna Inicial</button>--}}
            {{--<button type="button" class="btn btn-default">Visualizar Modelo</button>--}}
            <button ng-if="step > 1" ng-click="previousStep()" type="button" class="btn btn-default">{{trans('strings.previousStep')}}</button>
            <button ng-if="step < 3" ng-click="nextStep()" type="button" class="btn btn-default">{{trans('strings.nextStep')}}</button>
            <button ng-if="step === 3" ng-click="exportModel()" type="button" class="btn btn-default">{{trans('strings.exportModel')}}</button>
        </div>

        <br>

    </div>
</div>