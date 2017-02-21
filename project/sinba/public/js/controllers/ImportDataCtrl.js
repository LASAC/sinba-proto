/**
 * Created by mariliack on 16/02/17.
 */

angular.module('SinbaApp').controller('ImportDataCtrl', function (
    $rootScope,
    $scope,
    $http,
    $log,
    locale,
    notify
) {
    $log.debug('ImportDataCtrl')

    //
    // Constants
    //

    //
    // Public Properties
    //
    $scope.importData = false

    //
    // Methods
    //
    const init = function () {
        $log.debug('ImportDataCtrl.init')
        $scope.modelsLoaded = false

        $scope.locale = locale

        $scope.models = {
            all: [],
            selected: null
        }

        $scope.additionalInfo = ''
        $scope.inputFile = null

        $scope.disabledUpload = false
        $scope.uploadLabel = locale.str('upload')

        getModels()
    }

    const chooseModel = function (model) {
        $log.debug('model chosen:', model)
        $scope.models.selected = model
    }

    const uploadSheet = function () {
        if(!validateForm()) {
            // error
            notify.showWarning(locale.str('requiredUploadFields'))
        }
        else {
            $scope.disabledUpload = true
            $scope.uploadLabel = locale.str('uploading')
            postSheet()
        }
    }

    const validateForm = function () {
        return $scope.models.selected
            && $scope.inputFile
    }
    
    //
    // Requests
    //

    const getModels = function () {
        $http({
            method: 'GET',
            url: '/watersheds/models',
            Accept: 'application/json'
        }).then(function (response) {
            $scope.models.all = response.data
            $scope.modelsLoaded = true
            $log.debug('GET OK:', response)
        }).catch(function (response) {
            $log.debug('GET ERROR:', response)
            notify.showDanger(response.data.message)
            $scope.modelsLoaded = true
        })
    }

    const downloadModel = function () {
        var modelId = $scope.models.selected.id
        $log.debug('DOWNLOADING:', modelId)
        $http({
            method: 'GET',
            url: 'watersheds/models/' + modelId + '/download',
            Accept: 'application/json'
        }).then(function (response) {
            $scope.models.all = response.data
            notify.showSuccess(response.data.message)
            $log.debug('DELETE OK:', response)
        }).catch(function (response) {
            $log.debug('DELETE ERROR:', response)
            notify.showDanger(response.data.message)
        })
    }

    const deleteModel = function () {
        $log.debug('DELETING:', $scope.models.selected.id)
        if(confirm(locale.str('confirmDelete'))) {
            $http({
                method: 'DELETE',
                url: '/watersheds/models/' + $scope.models.selected.id,
                Accept: 'application/json'
            }).then(function (response) {
                $scope.models.all = response.data
                notify.showSuccess(response.data.message)
                $log.debug('DELETE OK:', response)

                // reinicia o processo
                init()

            }).catch(function (response) {
                $log.debug('DELETE ERROR:', response)
                notify.showDanger(response.data.message)
            })
        }
    }

    const editModel = function () {
        $log.debug('EDIT MODEL(selected):', $scope.models.selected)
        if ($scope.models.selected) {
            $log.debug('editing...')
            var editModeHiddenInput = angular.element( document.querySelector( '#editMode' ) )[0];
            var modelIdHiddenInput = angular.element( document.querySelector( '#modelId' ) )[0];
            var createNewSheet = angular.element( document.querySelector( '#createNewSheet' ) )[0];

            editModeHiddenInput.value = 1
            modelIdHiddenInput.value = $scope.models.selected.id
            createNewSheet.checked = true

            $log.debug('editModeHiddenInput:', editModeHiddenInput.value)
            $log.debug('modelIdHiddenInput:', modelIdHiddenInput.value)
            $log.debug('createNewSheet:', createNewSheet.checked)

            $scope.importData = false
            $rootScope.initCreateModelCtrl()
        }
    }
    
    const postSheet = function () {
        $log.debug(
            'uploadSheet(model, additionalInfo, inputFile):',
            $scope.models.selected,
            $scope.additionalInfo,
            $scope.inputFile
        )
        // send data
        // TODO: completar esta lógica.
        notify.showSuccess(locale.str('successfullyUploaded'))
        $scope.uploadLabel = locale.str('uploaded')
    }

    // Public Elements
    angular.extend($scope, {
        // Public Methods
        init: init,
        chooseModel: chooseModel,
        uploadSheet: uploadSheet,
        downloadModel: downloadModel,
        deleteModel: deleteModel,
        editModel: editModel
    })
})