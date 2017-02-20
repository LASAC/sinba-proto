/**
 * Created by mariliack on 16/02/17.
 */

angular.module('SinbaApp').controller('ImportDataCtrl', function (
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
    $scope.importData = true

    //
    // Methods
    //
    const init = function () {
        $log.debug('ImportDataCtrl.init')

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
            $log.debug('GET OK:', response)
        }).catch(function (response) {
            $log.debug('GET ERROR:', response)
            notify.showDanger(JSON.stringify(response))
        })
    }

    const downloadModel = function () {
        // TODO: downloadModel
        $log.debug('TODO: downloadModel')
    }

    const deleteModel = function () {
        $log.debug('DELETING:', $scope.models.selected.id)
        // if(confirm(locale.str('confirmDelete'))) {
        //     $http({
        //         method: 'DELETE',
        //         url: '/watersheds/models/',
        //         Accept: 'application/json'
        //     }).then(function (response) {
        //         $scope.models.all = response.data
        //         notify.showSuccess(locale.str('modelSuccessfullyDeleted'))
        //         $log.debug('DELETE OK:', response)
        //     }).catch(function (response) {
        //         $log.debug('DELETE ERROR:', response)
        //         notify.showDanger(JSON.stringify(response))
        //     })
        // }
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
        deleteModel: deleteModel
    })
})