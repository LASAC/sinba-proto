angular.module('SinbaApp').factory("locale", function() {
    const dictionary = {
        'errorsFound': 'Errors found in the form',
        'fillModelName': 'Fill in the model\'s name',
        'addAtLeastOneParameter': 'Add at least one parameter',
        'labelDifferentFromColumn': 'Number of label differs from number of lines/columns',
        'column': 'column',
        'columnLabels': 'Labels for lines/columns',
        'orderedColumns': 'Ordered columns/lines',
        'modelName': 'Model Name',
        'layout': 'Layout',
        'headerOnFirst': 'Header on First',
        'line': 'line',
        'pickTwoParameters': 'Pick two parameters to switch',
        'invalidOperation': 'Invalid operation!',
        'selectParameters': 'Select parameters',
        'orderLabelsAndLayout': 'Set up order, labels and layout',
        'confirmInformation': 'Confirm information',
        'requiredUploadFields': 'Required fields: Model and File.',
        'upload': 'Upload',
        'uploading': 'Uploading...',
        'uploaded': 'Uploaded!',
        'successfullyUploaded': 'Successfully Uploaded!'
    }
    const str = function (key) {
        const term = dictionary[key]
        return term ? term : key
    }
    return {
        str: str
    }
})