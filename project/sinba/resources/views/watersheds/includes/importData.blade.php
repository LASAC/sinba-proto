<div ng-controller="ImportDataCtrl" ng-init="init()">
    <div class="checkbox">
        <label style="font-weight: bold">
            <input ng-model="importData" type="checkbox">
            {{trans('strings.importDataFromExistingSheet')}}
        </label>
    </div>

    <div ng-show="importData">

        <br />

        <label ng-if="!!models.selected.name">
            {{trans('strings.selectModel')}}: <[models.selected.name]>
        </label>

        <div class="centered-spaced-buttons">
            <!-- Trigger the modal with a button -->
            <button
                ng-if="!models.selected"
                ng-repeat="model in models.all"
                ng-click="chooseModel(model)"
                ng-disabled="models.selected"
                type="button"
                class="btn btn-info"
            >
                <[model.name]>
            </button>
        </div>

        <div ng-if="!!models.selected">
            <model-display model="models.selected" />
        </div>

        <div class="form-group">
            <label for="comment">{{trans('strings.additionalInfo')}}</label>
            <textarea class="form-control" ng-model="additionalInfo" rows="5" id="comment"></textarea>
        </div>

        <div class="form-group">
            <label for="inputFile">{{trans('strings.pickFile')}}</label>
            <input
                class="form-control"
                name="inputFile"
                fileread="inputFile"
                type="file"
                class="btn btn-default"
            />
        </div>

        <div ng-if="!!uploadLabel" class="form-group">
        </div>

        <div class="centered-spaced-buttons fixed-width">
            <button
                type="submit"
                class="btn btn-success"
                ng-click="uploadSheet()"
                ng-disabled="disabledUpload"
                ng-if="models.selected"
            >
                <[uploadLabel]>
            </button>

            <button
                type="submit"
                class="btn btn-warning"
                ng-click="downloadModel()"
                ng-if="models.selected"
            >
                Download
            </button>
            @can('manage')
                <button
                    type="submit"
                    class="btn btn-danger"
                    ng-click="deleteModel()"
                    ng-if="models.selected"
                >
                    <[locale.str('delete')]>
                </button>
            @endcan
        </div>



    </div>
</div>