<section id="widget-grid" class="">

    <!-- row -->
    <div class="row">

        <!-- NEW WIDGET START -->
        <article class="col-sm-12">

            <div id="message_warning" name="message_warning"
                 class="alert alert-warning fade in"
                 style="{{!(Session::has('message_warning')) ? 'display: none' : ''}}"
            >
                <button class="close" data-dismiss="alert" onclick="document.getElementById('message_warning').style.display = 'none'">
                    X
                </button>
                <i class="fa-fw fa fa-warning"></i>
                <span id="message_warning_span" name="message_warning_span">{{ Session::get('message_warning') }}</span>
                {{ Session::forget('message_warning') }}
            </div>

            <div id="message_success" name="message_success"
                 class="alert alert-success fade in"
                 style="{{!(Session::has('message_success')) ? 'display: none' : ''}}"
            >
                <button class="close" data-dismiss="alert" onclick="document.getElementById('message_success').style.display = 'none'">
                    X
                </button>
                <i class="fa-fw fa fa-check"></i>
                <span id="message_success_span" name="message_success_span">{{ Session::get('message_success') }}</span>
                {{ Session::forget('message_success') }}
            </div>

            <div id="message_info" name="message_info"
                 class="alert alert-info fade in"
                 style="{{!(Session::has('message_info')) ? 'display: none' : ''}}"
            >
                <button class="close" data-dismiss="alert" onclick="document.getElementById('message_info').style.display = 'none'">
                    X
                </button>
                <i class="fa-fw fa fa-info"></i>
                <span id="message_info_span" name="message_info_span">{{ Session::get('message_info') }}</span>
                {{ Session::forget('message_info') }}
            </div>

            <div id="message_danger" name="message_danger"
                 class="alert alert-danger fade in"
                 style="{{!(Session::has('message_danger')) ? 'display: none' : ''}}"
            >
                <button class="close" data-dismiss="alert" onclick="document.getElementById('message_danger').style.display = 'none'">
                    X
                </button>
                <i class="fa-fw fa fa-times"></i>
                <span id="message_danger_span" name="message_danger_span">{{ Session::get('message_danger') }}</span>
                {{ Session::forget('message_danger') }}
            </div>

            @if(count($errors) > 0))
                <div class="alert alert-danger fade in">
                    <button class="close" data-dismiss="alert">
                        X
                    </button>
                    <i class="fa-fw fa fa-times"></i>
                    {{ trans('strings.fixTheErrors') }}
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

        </article>
        <!-- WIDGET END -->

    </div>

</section>