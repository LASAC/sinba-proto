angular.module('SinbaApp').factory("locale", function() {
    const dictionary = {
        'errorsFound': 'Errors found in the form',
        'fillModelName': 'Fill in the model\'s name',
        'addAtLeastOneParameter': 'Add at least one parameter',
        'labelDifferentFromColumn': 'Number of label differs from number of lines/columns',
        'column': 'column',
        'line': 'line',
        'pickTwoParameters': 'Pick two parameters to switch',
        'invalidOperation': 'Invalid operation!',
        'selectParameters': 'Select parameters',
        'orderLabelsAndLayout': 'Set up order, labels and layout',
        'confirmInformation': 'Confirm information'
    }
    const str = function (key) {
        const term = dictionary[key]
        return term ? term : key
    }
    return {
        str: str
    }
})