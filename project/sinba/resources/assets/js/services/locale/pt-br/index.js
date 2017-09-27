var angular = require ('angular')

module.exports = (angularModule) => {
  angularModule.factory('locale', function() {
      const dictionary = {
          'errorsFound': 'Erros encontrados no formulário',
          'fillModelName': 'Preencha o nome do modelo',
          'addAtLeastOneParameter': 'Adicione pelo menos um parâmetro',
          'labelDifferentFromColumn': 'Número de títulos deve ser igual ao número de linhas/colunas',
          'column': 'coluna',
          'columnLabels': 'Títulos para colunas/linhas',
          'orderedColumns': 'Colunas/linhas ordenadas',
          'modelName': 'Nome do Modelo',
          'model': 'Modelo',
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
          'successfullyUploaded': 'Planilha Enviada com Sucesso!',
          'delete': 'Excluir',
          'confirmDelete': 'Tem certeza que deseja excluir o modelo?',
          'noModelRegistered': 'Nenhum modelo de planilha cadastrado!',
          'createNewModel': 'Criar nova planilha modelo',
          'editModel': 'Editar planilha modelo',
          'editSelectedModel': 'Editar planilha modelo selecionada',
          'deleteSelectedModel': 'Excluir planilha modelo selecionada',
          'downloadSelectedModel': 'Baixar planilha modelo selecionada',
          'sendSheetBasedOnModel': 'Enviar planilha preenchida com base no modelo selecionado',
          'edit': 'Editar',
          'loadingModels': 'Carregando modelos de planilha...'
      }
      const str = function (key) {
          const term = dictionary[key]
          return term ? term : key
      }
      return {
          str: str
      }
  })
}
