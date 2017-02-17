<div ng-controller="ImportDataCtrl" ng-init="init()">
    <div class="checkbox">
        <label style="font-weight: bold">
            <input ng-model="importData" type="checkbox">
            {{trans('strings.importDataFromExistingSheet')}}
        </label>
    </div>

    <div ng-show="importData">

        <br />

        <label>
            {{trans('strings.selectModel')}}: <[models.selected.name]>
        </label>

        <div ng-show="models.all.length" class="centered-spaced-buttons">
            <!-- Trigger the modal with a button -->
            <button
                ng-repeat="model in models.all"
                ng-click="chooseModel(model)"
                ng-disabled="models.selected"
                type="button"
                class="btn btn-info btn-lg"
            >
                <[model.name]>
            </button>
        </div>

        <div>
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

        <div class="form-group">
            <button
                type="submit"
                class="form-control"
                style="margin: 0;"
                ng-click="uploadSheet()"
                ng-disabled="disabledUpload"
            >
                <[uploadLabel]>
            </button>
        </div>

    </div>
</div>