@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align: center">
                        @yield('links')
                    </div>

                    <div class="panel-body">
                        <div id="search_form" style="text-align: center">
                            @yield('search')
                        </div>
                    </div>

                    <hr />

                    <div class="table-responsive">
                        @yield('table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection