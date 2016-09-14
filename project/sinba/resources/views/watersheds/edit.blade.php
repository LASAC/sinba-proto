@extends('layouts.app')

@section('style')
<style>
    body{

    }

    h1{
        color: #204d74;
        font-family: "Arial";
    }

    h4{
        color: "black";
    }

    h5{
        color: #204d74;
        font-family: "Arial";
    }

    p{
        color: #1f648b;
        text-align: justify;
    }

    #btnCadastrar{
        margin: 0 auto;
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
    <h1>{{$watershed->name}}</h1>
    <h5> Nível acima: Bacia do Rio Pardo</h5>

    </br>

    <h4>Informações</h4>

    </br>

    <p>A bacia do Córrego Guariroba possui extensão de aproximadamente 37.000 ha e situa-se entre os paralelos
    20º29'30”(N), 20º46'05”(S) e meridianos 54º19'39”(L) e 54º28'30”(O), com altitude variando de 440 m a
    640 m. Está localizada na grande unidade geológica denominada Bacia Sedimentar do Paraná e encontra-se
    inserida na sub-bacia hidrográfica do Rio Pardo.
    De acordo com o projeto RADAMBRASIL (BRASIL, 1982), a bacia hidrográfica do Guariroba encontra-se
    geomorfologicamente inserida no Planalto de Maracaju -Campo Grande, possuindo superfície de aplanamento,
    elaborada por processos de pediplanação, cortando litologias pré-cambrianas do Grupo Cuiabá e Corumbá,
    rochas devonianas e permocarboníferas da Bacia Sedimentar do Paraná. Os relevos de topo convexo, com
    diferentes ordens de grandeza e de aprofundamento de drenagem, são separados por vales de fundo plano
    ou em forma de “V” (ALVES SOBRINHO, 2010).
    </p>

    </br>

    <img src="img/guariroba.gif">

    </br>
    </br>

        <button id="btnCadastrar" type="button" class="btn btn-default" style="padding: 3px 3px"><a href="{{url('watersheds/model/1')}}">Cadastrar Dados</a> </button>

        </br>
        </br>

        <button type="button" class="btn btn-default" style="padding: 3px 3px"; ><a href="/">Visualizar Dados</a></button>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-1">
            </div>
        </div>

@endsection