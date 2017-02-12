angular.module('SinbaApp').factory("notify", function() {
    const show = function (type, message) {
        var span = angular.element( document.querySelector( '#message_' + type + '_span' ) );
        span[0].innerHTML = message
        angular.element( document.querySelector( '#message_' + type ) )[0].style.display = ''
    }

    const showWarning = function (message) {
        show('warning', message)
    }
    const showSuccess = function (message) {
        show('success', message)
    }
    const showInfo = function (message) {
        show('info', message)
    }
    const showDanger = function (message) {
        show('danger', message)
    }

    return {
        show: show,
        showDanger: showDanger,
        showSuccess: showSuccess,
        showWarning: showWarning,
        showInfo: showInfo
    }
})