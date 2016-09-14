@extends('layouts.app')

@section('style')
<style>
    h1{
        color: #204d74;
        font-family: "Arial";
    }
    h4{
        color: #204d74;
        font-family: "Arial";
    }
    h5{
        color: #204d74;
        font-family: "Arial";
    }

</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-8">
            <h1>Bacia do Guariroba</h1> <h5>(nível acima: Bacia do Rio Pardo)</h5>

            <hr/>

            <h4>Cadastro de Dados</h4>

            <hr />

            <div class="checkbox">
                <label style="font-weight: bold"><input type="checkbox"> Importar dados de uma planilha existente</label>
            </div>

            <br />

            Selecione o Modelo:

            <br />
            <br />

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modelo 1</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modelo 1</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{URL::asset('/img/excel.jpg')}}" height="400" width="600" class="img-responsive center-block">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Selecionar</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modelo 2</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modelo 2</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{URL::asset('/img/excel.jpg')}}" height="400" width="600" class="img-responsive center-block">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modelo 3</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modelo 3</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{URL::asset('/img/excel.jpg')}}" height="400" width="600" class="img-responsive center-block">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            <br />
            <br />

            <div class="form-group">
                <label for="comment">Informações adicionais</label>
                <textarea class="form-control" rows="5" id="comment"></textarea>
            </div>

            <button type="button" class="btn btn-default">Upload</button>

            <br />
            <br />

            <div class="alert alert-danger">
                <strong>Atenção!</strong> Planilha não compatível com modelo selecionado.
            </div>

            <hr />

            <div class="checkbox">
                <label style="font-weight: bold"><input type="checkbox"> Criar nova planilha</label>
            </div>

            <br />

            <div>
                <form action="action_page.php">
                    <label for="fname">Nome do Modelo</label>
                    <input type="text" id="fname" name="nomeModelo">
            </div>


            </br>

            <div class="form-group">
                <label for="sel1">Selecionar parâmetro:</label>
                <select class="form-control" id="sel1">
                    <option>Vazão</option>
                    <option>Profundidade</option>
                    <option>Volume</option>
                    <option>pH</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Selecionar unidade:</label>
                <select class="form-control" id="sel1">
                    <option>m3/s</option>
                    <option>s</option>
                    <option>m3</option>
                    <option>-</option>
                </select>
            </div>

            <button type="button" class="btn btn-default">Adicionar</button>

            <div class="form-group">
                <label for="comment">Parâmetros e Unidades selecionados:</label>
                <textarea class="form-control" rows="5" id="comment"> Vazão (m3/s)</textarea>
            </div>

            </br>

            <button type="button" class="btn btn-default">Definir Linha e Coluna Inicial</button>
            <button type="button" class="btn btn-default">Visualizar Modelo</button>
            <button type="button" class="btn btn-default">Exportar Modelo</button>
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-1">
        </div>
    </div>

@endsection