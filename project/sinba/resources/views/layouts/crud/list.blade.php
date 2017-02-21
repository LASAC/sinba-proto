@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
              <div class="panel-heading" style="text-align: center">
                  @yield('links')
                  <hr />
                <br/>
                  @yield('search')
              </div>
              <div class="x-panel">
                <div class="x_content">
                  @yield('table')
                </div>
            </div>
          </div>
</div>
</div>
</div>

<script src="/js/jquery.min.js" type="text/javascript" ></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.excluir').on('click', function(e) {
            var $form = $(this).closest('form');
            e.preventDefault();
            $('#confirm-delete').modal()
                .one('click', '.btn-ok', function() {
                    $form.trigger('submit');
                });
        });
    });
</script>
@endsection


