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
</div>