@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="x_title">
                  @yield('links')
              </div>
            <br/>
              <div class="row">
                <div class="panel-body">
                    <div id="search_form" style="text-align: center">
                        @yield('search')
                    </div>
                </div>
             </div>
              <div class="x-panel">
                <div class="x_content">
                  @yield('table')
                </div>
            </div>
          </div>
      </div>
@endsection
