angular.module('SinbaApp').factory("locale", function() {
    const dictionary = {
        'errorsFound': 'Erros encontrados no formulário',
        'fillModelName': 'Preencha o nome do modelo',
        'addAtLeastOneParameter': 'Adicione pelo menos um parâmetro',
        'labelDifferentFromColumn': 'Número de títulos deve ser igual ao número de linhas/colunas',
        'column': 'coluna',
        'line': 'linha',
        'pickTwoParameters': 'Selecione dois parâmetros para efetuar a troca',
        'invalidOperation': 'Operação inválida!',
        'selectParameters': 'Selecionar parâmetros',
        'orderLabelsAndLayout': 'Definir ordem, rótulos e disposição',
        'confirmInformation': 'Confirmar informações'
    }
    const str = function (key) {
        const term = dictionary[key]
        return term ? term : key
    }
    return {
        str: str
    }
})