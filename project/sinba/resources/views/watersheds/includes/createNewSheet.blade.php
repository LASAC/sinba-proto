<div ng-controller="CreateModelCtrl" ng-init="init()">
    <input type="hidden" id="editMode" name="editMode" ng-model="editMode" value="0" />
    <input type="hidden" id="modelId" name="modelId" ng-model="modelId" value="0" />
    <div class="checkbox">
        <label style="font-weight: bold">
            <input id="createNewSheet" name="createNewSheet" ng-model="createNewSheet" type="checkbox" ng-click="init()">
            <[ editMode ? locale.str('editModel') : locale.str('createNewModel') ]>
        </label>
    </div>

    <div ng-if="createNewSheet">
        <br>
        <h3 ng-if="step">{{trans('strings.step')}} <[ step ]>: <[ getStepDescription() ]></h3>

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
                    <button ng-click="add()" type="button" class="btn btn-default"><i class="fa fa-plus-square-o"></i> {{trans('strings.add')}} </button>
                    <button ng-click="remove()" type="button" class="btn btn-default"><i class="fa fa-minus-square-o"></i> {{trans('strings.remove')}}</button>
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
                        <i class="fa fa-arrow-up"></i>
                        {{trans('strings.moveUp')}} &nbsp;
                    </button>
                    <button ng-click="moveDown()" type="button" class="btn btn-default">
                        <i class="fa fa-arrow-down"></i>
                        {{trans('strings.moveDown')}}
                    </button>
                    <button ng-click="swap()" type="button" class="btn btn-default">
                    <i class="fa fa-arrows-alt"></i>
                        {{trans('strings.invert')}}
                    </button>
                    <button ng-click="remove()" type="button" class="btn btn-default">
                    <i class="fa fa-remove"></i>
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
            <button ng-if="step > 1" ng-click="previousStep()" type="button" class="btn btn-primary"><i class="fa fa-arrow-left"></i> {{trans('strings.previousStep')}}</button>
            <button ng-if="step < 3" ng-click="nextStep()" type="button" class="btn btn-primary">{{trans('strings.nextStep')}} <i class="fa fa-arrow-right"></i></button>
            <button ng-if="step === 3" ng-click="saveModel()" type="button" class="btn btn-success"><i class="fa fa-save"></i> {{trans('strings.saveModel')}}</button>
        </div>

    </div>
</div>