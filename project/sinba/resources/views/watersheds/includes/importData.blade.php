<div ng-controller="ImportDataCtrl" ng-init="init()">
    <div class="checkbox">
        <label style="font-weight: bold">
            <input ng-model="importData" type="checkbox" ng-click="init()">
            {{ trans('strings.importDataFromExistingSheet') }}
        </label>
    </div>
    <div ng-show="importData">
        <br />
        <p ng-if="!modelsLoaded"><[locale.str('loadingModels')]></p>
        <p ng-if="modelsLoaded && models.all.length === 0"><[locale.str('noModelRegistered')]></p>

        <div ng-if="models.all.length > 0" class="form-group">

            <label for="inputFile">Latitude:</label>
            <input
                    class="form-control"
                    name="latitude"
                    type="text"
            />
            <br>

            <label for="inputFile">Longitude:</label>
            <input
                    class="form-control"
                    name="longitude"
                    type="text"
            />
            <br>

            <!-- PICK FILE -->
            <label for="inputFile">{{trans('strings.pickFile')}}:</label>
            <input
                    class="form-control"
                    name="inputFile"
                    fileread="inputFile"
                    type="file"
            />
            <br>

            <!-- ADDITIONAL INFO -->
            <label for="comment">{{trans('strings.additionalInfo')}}:</label>
            <textarea class="form-control" ng-model="additionalInfo" rows="5" id="comment"></textarea>

        </div>

        <label ng-if="!!models.selected.name">
            {{trans('strings.selectModel')}}: <[models.selected.name]>
        </label>

        <div
                ng-if="!models.selected"
                class="centered-spaced-buttons"
        >
            <!-- Trigger the modal with a button -->
            <button
                    ng-repeat="model in models.all"
                    ng-click="chooseModel(model)"
                    ng-disabled="models.selected"
                    type="button"
                    class="btn btn-success btn-margins"
            >
                <i class="fa fa-file-excel-o"></i>
                <[model.name]>
            </button>
        </div>

        <!-- MODEL DISPLAY -->
        <div ng-if="!!models.selected">
            <model-display model="models.selected" />
        </div>

        <!-- UPLOAD LABEL -->
        <div ng-if="!!uploadLabel" class="form-group"></div>

        <!-- ACTION BUTTONS -->
        <div class="centered-spaced-buttons fixed-width">
            <a data-toggle="tooltip"
                title="<[locale.str('sendSheetBasedOnModel')]>">
                <button
                type="button"
                class="btn btn-success btn-margins"
                ng-click="uploadSheet()"
                ng-disabled="disabledUpload"
                ng-if="models.selected"
                >
                <i class="fa fa-send"></i>
                <[uploadLabel]>
            </button>
            </a>

            <a data-toggle="tooltip"
                title="<[locale.str('downloadSelectedModel')]>">
            <button
                type="button"
                class="btn btn-warning btn-margins"
                ng-click="downloadModel()"
                ng-if="models.selected"
            >
                <i class="fa fa-download"></i>
                Download
            </button>
            </a>
            @can('manage')
            <a data-toggle="tooltip"
                title="<[locale.str('editSelectedModel')]>">
                <button
                        type="button"
                        class="btn btn-primary btn-margins"
                        ng-click="editModel()"
                        ng-if="models.selected"
                >
                <i class="fa fa-edit"></i>
                    <[locale.str('edit')]>
                </button>
                </a>
                
                <a data-toggle="tooltip"
                   title="<[locale.str('deleteSelectedModel')]>"
                >
                    <button
                            type="button"
                            class="btn btn-danger btn-margins"
                            ng-click="deleteModel()"
                            ng-if="models.selected"
                    >
                    <i class="fa fa-remove"></i>
                        <[locale.str('delete')]>
                    </button>
                </a>
            @endcan
        </div>

    </div>
</div>
