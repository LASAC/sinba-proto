<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-sm-12">

            @if(Session::has('message_warning'))
                <div class="alert alert-warning fade in">
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                    <i class="fa-fw fa fa-warning"></i>
                    {{ Session::get('message_warning') }}
                </div>
            @endif

            @if(Session::has('message_success'))
                <div class="alert alert-success fade in">
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                    <i class="fa-fw fa fa-check"></i>
                    {{ Session::get('message_success') }}
                </div>
            @endif

            @if(Session::has('message_info'))
                <div class="alert alert-info fade in">
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                    <i class="fa-fw fa fa-info"></i>
                    {{ Session::get('message_info') }}
                </div>
            @endif

            @if(Session::has('message_danger'))
                <div class="alert alert-danger fade in">
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                    <i class="fa-fw fa fa-times"></i>
                    {{ Session::get('message_danger') }}
                </div>
            @endif

        </article>
        <!-- WIDGET END -->

    </div>

</section>