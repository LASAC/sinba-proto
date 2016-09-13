@extends('layouts.app')

@section('content')



    <center>
        <h1>Bacia do Guariroba</h1>
        <h2>Nível 1 - Bacia do Paraná</h2>
    </center>


    <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="checkbox">
                <label><input type="checkbox"> Importar Dados</label>
            </div>

            Selecione o Modelo:

            </br>

            <table>
                <tr><td>
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
                    </div></td>
                </tr>

            </table>

            </br>

            <button type="button" class="btn btn-default">Upload</button>
            <button type="button" class="btn btn-default">Preview</button>

            </br>
            </br>

            <div class="checkbox">
                <label><input type="checkbox"> Criar Planilha</label>
            </div>

            <div class="container">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="email">Nome do Modelo</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                </div>
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
        <div class="col-sm-4">
        </div>
    </div>

@endsection