@extends('layouts.app')
@section('script')
    <script src="/js/controllers/HomeCtrl.js"></script>
@endsection
@section('content')

<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Atividades Recentes </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="dashboard-widget-content">
                <ul class="list-unstyled timeline widget" id="timeline">
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="block">
                            <div class="block_content">
                                <h2 class="title">
                                              <a>Dados coletados para a Bacia Hidrográfica X</a>
                                          </h2>
                                <div class="byline">
                                    <span>3 minutos atrás</span> por <a>Marília Kameya</a>
                                </div>
                                <p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...
                                  <a>Read&nbsp;More</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

<script src="/js/jquery.min.js"></script>
<script type="text/javascript">

function loadFeed(){

    var $newLi = $("<li></li>").html('<div class="block">' +
            '<div class="block_content">' +
                ' <h2 class="title">' +
                              '<a>Dados coletados para a Bacia Hidrográfica X</a>'+
                          '</h2>' +
                '<div class="byline">' +
                    '<span>2 minutos atrás</span> por <a>Marília Kameya</a>' +
                '</div>'+
                '<p class="excerpt"> Fiz a coleta dos dados na Bacia X para a pesquisa Y na qual são estabelecidos N parâmetros...'+
                  '<a>Read&nbsp;More</a>'+
                '</p>'+
            '</div>'+
        '</div>');

    $newLi.hide();
    $('#timeline').prepend($newLi);
    $newLi.show('slow');
}

loadFeed(); // This will run on page load
setInterval(function(){
    loadFeed() // this will run after every 5 seconds
}, 5000);


</script>
@endsection



