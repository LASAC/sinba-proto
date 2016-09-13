@extends('layouts.app')

@section('style')
<style>
    h2 {
        font-style: italic;
    }
</style>
@endsection

@section('content')
    <center><h2>Bacia 01</h2></center>
    <table style="width:100%">
        <tr>
            <th>Informações</th>
        </tr>
        <tr>
            <th>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed laoreet commodo pellentesque. Donec id dolor placerat, aliquet risus vitae, vulputate nibh. Phasellus ut diam eros. Integer sodales ligula purus, vel semper turpis vulputate id. Suspendisse suscipit est sed odio pretium, faucibus elementum magna sollicitudin. Nullam posuere accumsan neque. Vivamus ornare nulla et elit pulvinar pharetra. Nam pulvinar, libero id dapibus venenatis, orci turpis pulvinar odio, eget fermentum erat neque sit amet mi. Nullam tincidunt pretium mi, sit amet rutrum eros mattis sed. Aenean fringilla euismod sem, convallis porta ipsum sollicitudin a. Donec sed dui ac turpis faucibus tristique.

                Maecenas id est nec lacus convallis imperdiet ac ac turpis. Cras lorem sapien, finibus id egestas vitae, tincidunt porttitor nulla. Mauris porta tincidunt vulputate. Nullam eu porta sem. In imperdiet, lacus sed molestie cursus, tellus lacus efficitur orci, eget laoreet quam urna non enim. Aenean fringilla nulla in ex pretium finibus. Suspendisse dapibus luctus felis a fringilla.

                Nullam felis erat, suscipit nec arcu nec, lobortis condimentum eros. Aliquam quis viverra massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris congue facilisis finibus. Aenean convallis suscipit sem nec dignissim. Nam eget ipsum et dui ultrices vehicula. Proin ut turpis eget dui feugiat vulputate. Vivamus convallis, enim vel lobortis elementum, turpis turpis condimentum justo, sit amet mattis nulla enim in tortor. Duis id lobortis ex. Curabitur ut pellentesque nisi, in hendrerit neque. Aenean ac eleifend lorem. Nunc malesuada posuere libero eu ullamcorper. Integer id tempus ex, a ullamcorper nibh. Sed ut lectus sed magna iaculis dignissim.

                Aliquam aliquet dapibus odio eu sagittis. In felis eros, consectetur vel mattis eget, aliquet sit amet ipsum. Fusce nec risus arcu. In sagittis, risus at egestas tincidunt, erat leo convallis nisl, quis tincidunt leo diam euismod libero. Fusce eu molestie justo, ut rutrum sem. Nullam porta volutpat metus, in ornare tellus vestibulum pulvinar. Maecenas sollicitudin vel ante ac accumsan. Donec ultrices, risus vitae faucibus malesuada, odio velit efficitur elit, egestas volutpat ligula elit eget mi.</th>
        </tr>

    </table>

    <button type="button" class="btn btn-default"><a href="{{url('watersheds/model/1')}}">Cadastrar Dados</a> </button></br>
    <button type="button" class="btn btn-default"><a href="/">Visualizar Dados</a></button>
@endsection