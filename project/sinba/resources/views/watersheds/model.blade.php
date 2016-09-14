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

            Selecione o Modelo:

            </br>

            <div class="checkbox">
                <label><input type="checkbox"> Modelo 1 </label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox"> Modelo 2 </label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox"> Modelo 3 </label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Modelo 4 </label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox"> Modelo 5 </label>
            </div>

            <div class="checkbox">
                <label><input type="checkbox"> Modelo 6 </label>
            </div>

            </br>

            <button type="button" class="btn btn-default">Upload</button>
            <button type="button" class="btn btn-default">Preview</button>

            </br>
            </br>

            <hr />

            <div class="checkbox">
                <label><input type="checkbox"> Criar nova planilha</label>
            </div>

            <div>
                <form action="action_page.php">
                    <label for="fname">Nome do Modelo</label>
                    <input type="text" id="fname" name="nomeModelo">
            </div>


            </br>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style=background-color:"transparent">Selecionar Parâmetros
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">Vazão</a></li>
                    <li><a href="#">Profundidade</a></li>
                    <li><a href="#">Volume</a></li>
                </ul>
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