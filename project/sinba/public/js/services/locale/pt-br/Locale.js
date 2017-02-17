angular.module('SinbaApp').factory("locale", function() {
    const dictionary = {
        'errorsFound': 'Erros encontrados no formulário',
        'fillModelName': 'Preencha o nome do modelo',
        'addAtLeastOneParameter': 'Adicione pelo menos um parâmetro',
        'labelDifferentFromColumn': 'Número de títulos deve ser igual ao número de linhas/colunas',
        'column': 'coluna',
        'columnLabels': 'Títulos para colunas/linhas',
        'orderedColumns': 'Colunas/linhas ordenadas',
        'modelName': 'Nome do Modelo',
        'layout': 'Disposição',
        'headerOnFirst': 'Cabeçalho na Primeira',
        'line': 'linha',
        'pickTwoParameters': 'Selecione dois parâmetros para efetuar a troca',
        'invalidOperation': 'Operação inválida!',
        'selectParameters': 'Selecionar parâmetros',
        'orderLabelsAndLayout': 'Definir ordem, rótulos e disposição',
        'confirmInformation': 'Confirmar informações',
        'requiredUploadFields': 'Campos obrigatórios: Modelo e Arquivo.',
        'upload': 'Enviar',
        'uploading': 'Enviando...',
        'uploaded': 'Enviado!',
        'successfullyUploaded': 'Planilha Enviada com Sucesso!'
    }
    const str = function (key) {
        const term = dictionary[key]
        return term ? term : key
    }
    return {
        str: str
    }
})