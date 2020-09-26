{{-- PAGINA PRINCIPAL Q SE INVOCA POR LA RUTA EN WEB.PHP  --}}
@extends('layouts.app')<!--q me traiga de la carpeta layouts el app.blade.php-->




@section('content')

<section class="mbr-wowslider-container mbr-section mbr-section__container carousel slide mbr-section-nopadding mbr-wowslider-container--twist mbr-after-navbar" data-ride="carousel" data-keyboard="false" data-wrap="true" data-interval="false" id="wowslider-1" data-rv-view="2" style="background-color: rgb(255, 255, 255);">
    <div class="mbr-wowslider">
        <div class="ws_images">
            <ul>
                <li>

                    <img src="assets/images/slide3-1600x900.jpg" alt="title 1" title="title 1"> text 1
                </li><li>

                    <img src="assets/images/slide2-1600x900.jpg" alt="title 2" title="title 2"> text 2
                </li><li>

                    <img src="assets/images/slide1-1600x900.jpg" alt="title 3" title="title 3"> text 3
                </li>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <a href="#" title="">
                    <span><img alt="slide1" src="assets/images/tooltip3.jpg"></span>
                </a><a href="#" title="">
                    <span><img alt="slide1" src="assets/images/tooltip2.jpg"></span>
                </a><a href="#" title="">
                    <span><img alt="slide1" src="assets/images/tooltip1.jpg"></span>
                </a>
            </div>
        </div>
        <div class="ws_shadow"></div>
        <div class="mbr-wowslider-options">
            <div class="params" data-paddingbottom="0" data-anim-type="book" data-theme="twist" data-autoplay="true" data-paddingtop="0" data-fullscreen="true" data-showbullets="true" data-timeout="2" data-duration="2" data-height="576" data-width="1024" data-responsive="2" data-showcaptions="false" data-captionseffect="slide" data-hidecontrols="false"></div>
        </div>
</div>
</section>



<section class="mbr-section mbr-section-hero news" id="news1-7" data-rv-view="14" style="background-color: rgb(255, 255, 255); padding-top: 80px; padding-bottom: 80px;">
    @foreach($temasDestacados as $temaDestacado){{-- esta viene de app/http/controllers/welcomeController.php --}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                    @foreach($temaDestacado->articles->sortByDesc('id')->take(3) as $articulo) {{-- sortByDesc ESTO ES ORDENAR DE MANERA DESCENDENTE CON LARAVEL.. take(3) me trae los 3 primeros..y como se ordeno descendentenmente me trae los ultimos creados --}}
                        <div class="col-xs-12 col-lg-4">
                            <div class="jsNewsCard news__card" modal-id="#{{ $articulo->id }}">
                                <div class="news__image">

                                    <img class="news__img" alt="" src="{{ url('http://www.adrianweb.live/storage/app/public/imagenesArticulos/'.$articulo->imagenDestacada()) }}">
                                </div>
                                <div class="news__inner">
                                    <h5 class="mbr-section-title display-6">{{ $articulo->titulo }}</h5>
                                    <p class="mbr-section-text lead">{{ $articulo->contenido }}</p>
                                    <div class="news__date">
                                        <span class="cm-icon cm-icon-clock"></span>
                                        <p>{{ $articulo->created_at->toDayDateTimeString() }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @foreach($temaDestacado->articles->sortByDesc('id')->take(3) as $articulo)  {{-- sortByDesc ESTO ES ORDENAR DE MANERA DESCENDENTE CON LARAVEL.. take(3) me trae los 3 primeros..y como se ordeno descendentenmente me trae los ultimos creados --}}
            <div data-app-prevent-settings="" class="modal fade" tabindex="-1" data-keyboard="true" data-interval="false" id="{{ $articulo->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="news__card" href="#{{ $articulo->id }}">
                                @if($articulo->images->first())
                                    <div class="news__image">
                                        @foreach($articulo->images as $imagen)
                                            <img class="news__img" alt="" src="{{  url('http://www.adrianweb.live/storage/app/public/imagenesArticulos/'.$imagen->nombre) }}">
                                        @endforeach
                                    </div>
                                @endif
                                <div class="news__inner">
                                    <h5 class="mbr-section-title display-6">{{ $articulo->titulo }}</h5>
                                    <p class="mbr-section-text lead">{!! $articulo->contenido !!}</p>{{-- sem pone asi {!! $articulo->contenido !!} para romper la seguridad de laravel --}}
                                    <div class="news__date">
                                        <span class="cm-icon cm-icon-clock"></span>
                                        <p>{{ $articulo->created_at }}</p>
                                    </div>

                                    <a class="close" href="#" role="button" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                        <span class="sr-only">Cerrar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</section>

<section class="mbr-section mbr-section-hero features16" id="features16-2" data-rv-view="27" style="background-color: #000000; padding-top: 80px; padding-bottom: 80px;">



    <div class="mbr-table-cell">

        <div class="container-fluid">
            <div class="row">

                <div class="mbr-cards-col col-xs-12 col-lg-5">
                    <div class="container">
                        <div class="card cart-block">

                            <div class="col-xs-6 padding-left-0 padding-right-0">
                                {{-- <div class="card-img iconbox"><a href="https://mobirise.com" class="cm-icon cm-icon-cloud mbr-iconfont mbr-iconfont-features16" style="color: rgb(252, 122, 96); text-shadow: rgba(0, 0, 0, 0.298039) 0px 0px 20px, rgba(0, 0, 0, 0.0980392) -10px 10px 7px;"></a></div> --}}
                                <div class="card-img iconbox"><a href="#" data-toggle="modal" data-target="#ventanaModal1"><img src="{{  url('http://www.adrianweb.live/storage/img/php.jpg') }}" alt="php"></a></div> 
                            </div>
                            <div class="col-xs-6 padding-left-0 padding-right-0">
                                <div class="text-xs-left">
                                    <h5 class="mbr-section-subtitle lead">Bootstrap 4 has been noted</h5>
                                    <p class="mbr-section-text lead">Bootstrap 4 has been noted as one of the most reliable and proven frameworks and Mobirise has been equipped to develop websites using this framework.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mbr-cards-col col-xs-12 col-lg-5 col-lg-offset-1">
                    <div class="container">
                        <div class="card cart-block">

                            <div class="col-xs-6 padding-left-0 padding-right-0">
                               {{-- <div class="card-img iconbox"><a href="https://mobirise.com" class="cm-icon cm-icon-note mbr-iconfont mbr-iconfont-features16" style="color: rgb(252, 122, 96); text-shadow: rgba(0, 0, 0, 0.298039) 0px 0px 20px, rgba(0, 0, 0, 0.0980392) -10px 10px 7px;"></a></div> --}}
                               <div class="card-img iconbox"><a href="#" data-toggle="modal" data-target="#ventanaModal2"><img src="{{  url('http://www.adrianweb.live/storage/img/mysql.jpg') }}" alt="php"></a></div>
                            </div>
                            <div class="col-xs-6 padding-left-0 padding-right-0">
                                <div class="text-xs-left">
                                    <h5 class="mbr-section-subtitle lead">One of Bootstrap 4's big points</h5>
                                    <p class="mbr-section-text lead">One of Bootstrap 4's big points is responsiveness and Mobirise makes effective use of this by generating highly responsive website for you.</p>
                                </div>
                            </div>

                        </div>
                  </div>
                </div>

                <div class="col-xs-12 col-lg-8 col-lg-offset-2 text-xs-center">

                    <h1 class="mbr-section-title display-3">Features</h1>

                </div>

                <div class="mbr-cards-col col-xs-12 col-lg-5">
                    <div class="container">
                        <div class="card cart-block">

                            <div class="col-xs-6 padding-left-0 padding-right-0">
                            <div class="card-img iconbox"><a href="#" data-toggle="modal" data-target="#ventanaModal3"><img src="{{  url('http://www.adrianweb.live/storage/img/jquery.jpg') }}" alt="php"></a></div>
                            </div>
                            <div class="col-xs-6 padding-left-0 padding-right-0">
                                <div class="text-xs-left">
                                    <h5 class="mbr-section-subtitle lead">Google has a highly exhaustive list of fonts</h5>
                                    <p class="mbr-section-text lead">Google has a highly exhaustive list of fonts compiled into its web font platform and Mobirise makes it easy for you to use them on your website easily and freely.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mbr-cards-col col-xs-12 col-lg-5 col-lg-offset-1">
                    <div class="container">
                        <div class="card cart-block">

                            <div class="col-xs-6 padding-left-0 padding-right-0">
                            <div class="card-img iconbox"><a href="#" data-toggle="modal" data-target="#ventanaModal4"><img src="{{  url('http://www.adrianweb.live/storage/img/css2.jpg') }}" alt="php"></a></div>
                            </div>
                            <div class="col-xs-6 padding-left-0 padding-right-0">
                                <div class="text-xs-left">
                                    <h5 class="mbr-section-subtitle lead">Mobirise gives you the freedom to develop</h5>
                                    <p class="mbr-section-text lead">Mobirise gives you the freedom to develop as many websites as you like given the fact that it is a desktop app.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</section>

<section class="mbr-section accordion" id="accordion1-3" data-rv-view="30" style="background-color: rgb(255, 255, 255); padding-top: 100px; padding-bottom: 100px;">


        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-lg-offset-2">
                    <div class="section-head text-center space30">
                        <h1 class="mbr-section-title display-4">Accordion fat</h1>

                    </div>
                    <div class="clearfix"></div>
                    <div id="accordion1-3-init" class="panel-group accordionStyles accordion" role="tablist" aria-multiselectable="true">
                      <div class="accordion-group">
                        <div class="panel panel-default" style="display: block;">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <span class="signSpan pseudoMinus"></span>
                                <h4 class="panel-title display-6"><a role="button" class="collapsed" data-toggle="collapse" data-parent="#accordion1-3-init" data-core="" href="#collapseOneaccordion1-3" aria-expanded="false" aria-controls="collapseOne"><span class="sign"></span>What is Mobirise?</a></h4>
                            </div>
                            <div id="collapseOneaccordion1-3" class="panel-collapse noScroll collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body lead"><p>Mobirise is an offline app for Window and Mac to easily create small/medium websites, landing pages, online resumes and portfolios, promo sites for apps, events, services and products.</p></div>
                            </div>
                        </div>
                        <div class="panel panel-default" style="display: block;">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <span class="signSpan pseudoPlus"></span>
                                <h4 class="panel-title display-6"><a role="button" class="" data-toggle="collapse" data-parent="#accordion1-3-init" data-core="" href="#collapseTwoaccordion1-3" aria-expanded="true" aria-controls="collapseTwo">Is it good for me?</a></h4>
                            </div>
                            <div id="collapseTwoaccordion1-3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body lead"><p>Mobirisae is perfect for non-techies who are not familiar with the intricacies of web development and for designers who prefer to work as visually as possible, without fighting with code. Also great for pro-coders for fast prototyping and small customers' projects.</p></div>
                            </div>
                        </div>
                        <div class="panel panel-default" style="display: block;">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <span class="signSpan pseudoPlus"></span>
                                <h4 class="panel-title display-6"><a role="button" class="" data-toggle="collapse" data-parent="#accordion1-3-init" data-core="" href="#collapseThreeaccordion1-3" aria-expanded="true" aria-controls="collapseThree">Why Mobirise?</a></h4>
                            </div>
                            <div id="collapseThreeaccordion1-3" class="panel-collapse noScroll collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body lead"><p>Key differences from traditional builders:<br>* Minimalistic, extremely <strong>easy-to-use</strong> interface<br>* <strong>Mobile</strong>-friendliness, latest website blocks and techniques "out-the-box"<br>* <strong>Free</strong> for commercial and non-profit use</p></div>
                            </div>
                        </div>



                      </div>
                    </div>
                </div>
            </div>
        </div>




</section>




@include('includes.login-modal') {{-- incluimos el archivo de boostrap del login --}}
@include('includes.ventana-modal1') {{-- incluimos el archivo de boostrap de la ventanita --}}
@include('includes.ventana-modal2') {{-- incluimos el archivo de boostrap de la ventanita --}}
@include('includes.ventana-modal3') {{-- incluimos el archivo de boostrap de la ventanita --}}
@include('includes.ventana-modal4') {{-- incluimos el archivo de boostrap de la ventanita --}}

@if($errors->any()) {{-- si hay un error --}}
  @section('include-login-modal') {{-- hace referencia al @yield q invoco en app.blade.php para q este codigo se ejecute ahi--}}
  <script src="{{ asset('js/login-modal.js') }}"></script>{{-- { asset esto hace q vaya a la carpeta public .. y esto js/login-modal.js hace q valla a carpeta js archivo login-modal.js --}}
  @endsection
@endif

@endsection
