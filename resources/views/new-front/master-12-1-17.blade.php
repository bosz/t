<!DOCTYPE html>
<!-- saved from url=(0034)http://geniesis.co/xy2/?search=adf -->
<html class="fa-events-icons-ready">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>

        <meta name="copyright" content="">
        <meta name="description" content="XYstories: histoires de cul, xystories, xystory, anecdotes de cul, histoires porno, témoignages cul, témoignages sex">
        <?php 
            $t = App\Tags::select('title')->get();
            $keyTags = '';
            foreach ($t as $k => $v) {
                $keyTags .= $v->title . ', ';
            }
            $keyTags = substr($keyTags, 0, sizeof($keyTags)-3);
         ?>
        <meta name="keywords" content="{{$keyTags}}">
        <meta name="DC.title" content="XYstories: histoires de cul, xystories, xystory, anecdotes de cul, histoires porno, témoignages cul, témoignages sex">


        @yield('header')
        <title>@yield('title')</title>
        <link href="{{ asset('nova_files/css/style-o.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('nova_files/images/logo.png') }}" rel="icon"  />
        <link rel="shortcut icon" href="http://geniesis.co/favicon.ico">
        <script src="https://use.fontawesome.com/0d8d271ee3.js"></script>
        <link rel="stylesheet" type="text/css" media="all" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <!-- <link href="{{ asset('tag/css/jquery.tagsinput.css') }}" rel="stylesheet" type="text/css"> -->
        <link href="{{ asset('nova_files/css/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('editor/dist/ui/trumbowyg.css')}}">
        <style>
            .carousel-inner {
            height: 256px;
            }
            #sticker{
                /*height: 95px;*/
                /*position: fixed;*/
                z-index: 9999;
                background: white;
                overflow: hidden;
                /*height: 300px;*/
            }
            .spacer
            {
                width: 100%;
                /*height: 300px;*/
            }
            section{
                z-index: 0;
            }
        </style>
    </head>
    <body cz-shortcut-listen="true">

        <div class="container">
            <header id="sticker">
                <div class="innerContainer">
                    @if(!Auth::check())
                    <div class="buttons">
                        <center>
                            <a href="" class="itm xy-logo">
                                <div style="display:inline-block;">
                                    <img src="{{ asset('nova_files/logo.png') }}" width="40px;"><br/>
									
                                </div>
                            </a>
                            <a href="{{URL::to('/')}}" class="itm xy-itm">
                                <div class="link">
                                    <strong>XY</strong> Stories<br/>
									
                                </div>
                            </a>
                           <!--  <a href="{{URL::to('/')}}?search=adf#" class="itm xy-itm">
                                <div class="link">
                                    <strong>XY</strong> Sondages
                                </div>
                            </a> -->

                            <!-- <a href="{{URL::to('auth/login')}}" class="to_hided">
                                <div class="btn">
                                    Se connecter
                                </div>
                            </a>
                            <a href="{{URL::to('auth/login')}}" class="to_hided">
                                <div class="btn">
                                    S'inscrire
                                </div>
                            </a> -->
                        </center>
                    </div>
                    @else
                    <div class="buttons">
                        <a href="{{URL::to('auth/login')}}">
                            <div class="btn">
                                Welcome <b>{{Auth::user()->name}}
                            </div>
                        </a>
                        <a href="{{url('users/logout')}}">
                            <div class="btn">
                                Logout
                            </div>
                        </a>
                    </div>
                    @endif
                    <div class="logo to_hide">
                        <img src="{{ asset('nova_files/logo.png') }}">
                    </div>
                    <div class="links to_hide">
                        <a href="{{URL::to('/')}}">
                            <div class="link">
                                <strong>XY</strong>Stories<br/>
								<font style="font-size:13px">Les stories X de la génération Y</font>
                            </div>
                        </a>
                        <!-- <a href="{{URL::to('/')}}?search=adf#">
                            <div class="link">
                                <strong>XY</strong>Sondages
                            </div>
                        </a> -->
                    </div>
                </div>
            </header>
            <div class="spacer">&nbsp;</div>
            @yield('main')
            <footer>
                <div class="center">
                    <p>copy © right reserved 2015</p>
                </div>
            </footer>
        </div>
        <!-- STOP -->







        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="{{ asset('nova_files/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('editor/dist/trumbowyg.js')}}"></script>
        <!-- <script src="{{ asset('tag/js/jquery.tagsinput.js') }}" type="text/javascript" charset="utf-8"></script> -->
        <!-- <script src="{{ asset('stickyjs/jquery.sticky.js') }}"></script> -->
        @yield('js')
        <script>
            $('.carousel').carousel({
                interval: 4000 //changes the speed
            });

            /*Scroll event to make sticker header*/
            $(window).scroll(function() {
                var sticker = $('#sticker');
                var spacer = $('.spacer');
                var section = $('section');
                var itm = $('.itm');
                // var defacto = $('.defacto');
                // var to_hide = $('.to_hide')

                var scrollHeight = $('body').scrollTop(); 
                if (scrollHeight > 330) {
                    spacer.css({'transition': '0.5s', 'height': '70px'})
                    sticker.css({'transition': '0.5s', 'height': '100px', 'position': 'fixed'})
                    itm.css({'visibility': 'visible'});
                    // defacto.removeClass('pull-right').removeClass('pull-left');
                    // to_hide.css({'visibility': 'hidden'});
                }else{
                    spacer.css({'transition': '0.5s', 'height': 'auto'})
                    sticker.css({'transition': '0.5s', 'height': 'auto', 'position': 'relative'})
                    itm.css({'visibility': 'hidden'});
                    // to_hide.css({'visibility': 'visible'});
                }
            })

            // $("#sticker").stick_in_parent();
        </script>
		
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-89541563-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>
</html>