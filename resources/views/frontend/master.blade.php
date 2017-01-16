<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('header')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('editor/dist/ui/trumbowyg.css')}}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/frontend.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


  <div class="login-panel panel_dark">
    <section class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="page-content">
            <h2>M'identifier</h2>
            <div class="form-style form-style-3">
              <div class="ask_form inputs">
                <form class="login-form ask_login" action="http://2code.info/demo/themes/ask-me/"
                      method="post">
                  <div class="ask_error"></div>

                  <div class="form-inputs clearfix">
                    <p class="login-text">
                      <input class="required-item" type="text" value="Pseudonyme"
                             onfocus="if (this.value == 'Pseudonyme') {this.value = '';}"
                             onblur="if (this.value == '') {this.value = 'Pseudonyme';}"
                             name="log">
                      <i class="icon-user"></i>
                    </p>
                    <p class="login-password">
                      <input class="required-item" type="Password" value="Password"
                             onfocus="if (this.value == 'Password') {this.value = '';}"
                             onblur="if (this.value == '') {this.value = 'Password';}"
                             name="pwd">
                      <i class="icon-lock"></i>
                      <a href="#">J'ai oublié mon mot de passe</a>
                    </p>
                  </div>
                  <p class="form-submit login-submit">
                    <span class="loader_2"></span>
                    <input type="submit" value="Here we go"
                           class="button color small login-submit submit sidebar_submit">

                  </p>
                  <div class="rememberme">
                    <label><input type="checkbox" input name="rememberme" checked="checked"> Se
                      souvenir de moi</label>
                  </div>

                  <input type="hidden" name="redirect_to"
                         value="http://2code.info/demo/themes/ask-me/home-2/">
                  <input type="hidden" name="login_nonce" value="224daa604a">
                  <input type="hidden" name="ajax_url"
                         value="http://2code.info/demo/themes/ask-me/admin/admin-ajax.php">
                  <input type="hidden" name="form_type" value="ask-login">
                  <div class="errorlogin"></div>
                </form>
              </div>
            </div>
          </div><!-- End page-content -->
        </div><!-- End col-md-6 -->
        <div class="col-md-6">
          <div class="page-content Register">
            <h2>M'inscrire</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravdio, sit
              amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequa. Vivamus
              vulputate posuere nisl quis consequat.</p>
            <div class="button color small signup">Créer un compte</div>
          </div><!-- End page-content -->
        </div><!-- End col-md-6 -->
      </div>
    </section>
  </div><!-- End login-panel -->
  <div id="header-top" class="clearfix" style="background-color:#EA7D11">
    <section class="container clearfix">
      <div class="row">
        <div class="col-md-6">
          <nav class="header-top-nav">
            <div class="header-top">
              <ul id="menu-top-bar" class="clearfix">
                <li id="menu-item-637"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-637">
                  <a href="{{url('user-post/create')}}"><i class="fa fa-pencil" aria-hidden="true"></i>Ajouter une story</a></li>

                @if(!Auth::check())
                  <li id="menu-item-61" class="login-panel-link menu-item menu-item-type-post_type menu-item-object-page menu-item-61">

                      <a href="{{url('users/login')}}">Se logger /
                        s'inscrire</a>
                  </li>
                @else
                  <li class="login-panel-link menu-item menu-item-type-post_type">
                    <a href="" >Welcome <b>{{Auth::user()->name}}</b> </a>
                  </li>
                  <li class="login-panel-link menu-item menu-item-type-post_type">
                    <a href="{{url('users/logout')}}">Logout</a>
                  </li>
                @endif


              </ul>
            </div>
          </nav>
          <div class="f_left language_selector">
          </div>
          <div class="clearfix"></div>
        </div><!-- End col-md-6 -->
        <div class="col-md-6">
          <div class="social_icons f_right">
            <ul>
              <li class="twitter"><a target="_blank" original-title="Twitter" class="tooltip-n" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li class="facebook"><a target="_blank" original-title="Facebook" class="tooltip-n" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li class="youtube"><a target="_blank" original-title="Youtube" class="tooltip-n" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li class="skype"><a target="_blank" original-title="Skype" class="tooltip-n" href="skype:5?call"><i class="fa fa-skype" aria-hidden="true"></i></a></li>

            </ul>
          </div><!-- End social_icons -->
          <div class="header-search" style="width:200px">
            <form method="GET" action="{{url('search')}}">
              <input type="text" name="by" value="" placeholder="rechercher ici...">

              <button type="submit" class="search-submit"></button>
            </form>
          </div>
          <div class="clearfix"></div>
        </div><!-- End col-md-6 -->
      </div><!-- End row -->
    </section><!-- End container -->
  </div><!-- End header-top -->
  <header id="header" class='cleafix'>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-12">
          <div class="logo">
          <a class="logo-img" href="{{route('home')}}" itemprop="url" title="Ask me">
            <img class="default_logo" itemprop="logo" alt="Ask me" src="{{asset('images/logox.png')}}"
                 style="height:70px">
            <img class="retina_logo" itemprop="logo" alt="Ask me"
                 src="{{asset('images/logox.png')}}">
          </a>
          </div>
        </div>
        <div class="col-sm-9 col-xs-12">
          <nav class="navigation">
            <div class="header-menu">
              <ul id="menu-header-menu" class="clearfix">
                <li id="menu-item-70"
                    class="menu-item menu-item-type-post_type menu-item-object-page current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-70">
                  <a href="#">Accueil</a>
                </li>
                <li id="menu-item-71"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a
                          href="#">Questions</a></li>
                <li id="menu-item-78"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a
                          href="#">Poser une question</a></li>
                <li id="menu-item-79"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a
                          href="#">Ecrire une story</a></li>

              </ul>
            </div>
          </nav>
          <nav class="navigation_mobile navigation_mobile_main">
            <div class="navigation_mobile_click">Menu</div>
            <ul>
              <li id="menu-item-70"
                  class="menu-item menu-item-type-post_type menu-item-object-page current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-70">
                <a href="#">Accueil</a>
              </li>
              <li id="menu-item-71"
                  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-71"><a
                        href="#">Questions</a></li>
              <li id="menu-item-78"
                  class="menu-item menu-item-type-custom menu-item-object-custom menu-item-78"><a
                        href="#">Poser une question</a></li>
              <li id="menu-item-79"
                  class="menu-item menu-item-type-post_type menu-item-object-page menu-item-79"><a
                        href="#">Ecrire une story</a></li>
            </ul>
          </nav><!-- End navigation_mobile -->
        </div>
      </div>
    </div>
  </header><!-- End header -->


    <div class="@yield('class') clearfix">
      @yield('main')
    </div>

    <footer id="footer" class="footer_dark clearfix">
      <section class="container">
        <div class="row">
          <div class="col-md-4">
            <div id="contact-widget-2" class="widget contact-widget"><h3 class="widget_title">XYstories</h3>
              <div class="widget_contact">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu.</p>
                <ul>

                  <li><span class="widget_title">Support :</span>x@xystories.com</li>
                  <li>Support Email Account : <a class="__cf_email__" href="../../../../cdn-cgi/l/email-protection/index.html" data-cfemail="5930373f36193c21383429353c773a3634">[email&#160;protected]</a><script data-cfhash='f9e31' type="text/javascript">/* <![CDATA[ */!function(t,e,r,n,c,a,p){try{t=document.currentScript||function(){for(t=document.getElementsByTagName('script'),e=t.length;e--;)if(t[e].getAttribute('data-cfhash'))return t[e]}();if(t&&(c=t.previousSibling)){p=t.parentNode;if(a=c.getAttribute('data-cfemail')){for(e='',r='0x'+a.substr(0,2)|0,n=2;a.length-n;n+=2)e+='%'+('0'+('0x'+a.substr(n,2)^r).toString(16)).slice(-2);p.replaceChild(document.createTextNode(decodeURIComponent(e)),c)}p.removeChild(t)}}catch(u){}}()/* ]]> */</script></li>
                </ul>
              </div>
            </div>							</div>
          <div class="col-md-2">
            <div id="nav_menu-2" class="widget widget_nav_menu"><h3 class="widget_title">Accès rapide</h3><div class="menu-footer-widget-container"><ul id="menu-footer-widget" class="menu"><li id="menu-item-134" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-134"><a href="#">Accueil</a></li>
                  <li id="menu-item-135" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-135"><a href="#">Poser une question</a></li>
                  <li id="menu-item-136" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-136"><a href="#">Stories</a></li>
                </ul></div></div>							</div>
          <div class="col-md-3">
            <div id="questions-widget-3" class="widget questions-widget"><h3 class="widget_title"></h3><ul class='related-posts'>				<li class="related-item">
                  <div class="questions-div">
                    <h3>
                      <a href="#" title="Ask any question and you be sure find your answer ?" rel="bookmark">
                      </a>
                    </h3>					</li></ul>				<div class="clearfix"></div>
            </div>
          </div>							</div>
        </div><!-- End row -->
      </section><!-- End container -->
    </footer><!-- End footer -->

    <footer id="footer-bottom" class="">
      <section class="container">
        <div class="row">
          <div class="col-sm-8">
        <div class="copyrights f_left">Copyright 2016 XYStories</div>
          </div>
          <div class="col-sm-4">
        <div class="social_icons f_right">
          <ul>
            <li class="twitter"><a target="_blank" original-title="Twitter" class="tooltip-n" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li class="facebook"><a target="_blank" original-title="Facebook" class="tooltip-n" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            <li class="youtube"><a target="_blank" original-title="Youtube" class="tooltip-n" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            <li class="skype"><a target="_blank" original-title="Skype" class="tooltip-n" href="skype:5?call"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
            <li class="flickr"><a target="_blank" original-title="Flickr" class="tooltip-n" href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
            <li class="linkedin"><a target="_blank" original-title="Linkedin" class="tooltip-n" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          </ul>
        </div>
          </div>
        </div><!-- End social_icons -->
      </section><!-- End container -->
    </footer><!-- End footer-bottom -->

    {{--<footer>--}}
      {{--<nav class="navbar navbar-default">--}}
        {{--<div class="container-fluid">--}}
          {{--<div class="navbar-header">--}}
            {{--<a href="{{route('home')}}">Copyright @ {{date('Y')}} - {{Config('app.name')}}</a>--}}
          {{--</div>--}}
        {{--</div>--}}
      {{--</nav>--}}
    {{--</footer>--}}
  <input type="hidden" value="{{csrf_token()}}" id="c_token">
  <input type="hidden" value="{{base_path()}}" id="base_url">

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('editor/dist/trumbowyg.js')}}"></script>
    <script src="{{asset('js/comos.js')}}"></script>
    <script src="{{asset('js/init.js')}}"></script>
  </body>
</html>