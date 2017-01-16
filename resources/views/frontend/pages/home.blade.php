@extends('frontend.master')
@section('title', 'Home')
@section('class', 'home')
@section('main')

    {{--<div class="row">--}}
    {{--<h1>{{Config('app.name')}}</h1>--}}
    {{--<p>{{Config('app.description')}}</p>--}}
    {{--<a class="btn btn-danger" href="{{route('latest')}}">Latest Posts</a>--}}
    {{--</div>--}}

    <div id="home">
        <div id="wrap" class="grid_1200">

            <section class="container main-content page-right-sidebar">
                @include('common.errors')
                <div class="row">
                   
                    <div class="with-sidebar-container">
                        <div class="col-md-9 col-xs-12">
                            <div class="tabs-warp question-tab">

                                <div class="tab-inner-warp">
                                    <div class="tab-inner">
                                        @include('frontend.partials.posts')
                                    </div>
                                    <div class="load-part clearfix"><h4>Loading...</h4></div>
                                </div>
                            </div><!-- End page-content -->

                        </div>

                        <aside class="col-md-3 sidebar sticky-sidebar col-xs-12">

                            <div id="tag_cloud-2" class="widget widget_tag_cloud"><h3 class="widget_title">Tags</h3>
                                <div class="tagcloud">
                                    @if(count($tags))

                                        @foreach($tags as $tag)
                                            <a href='{{'tag/'.$tag->title}}'>{{$tag->title}}</a>
                                        @endforeach

                                    @endif


                                </div>
                            </div>

                            <div id="questions-widget-2" class="widget questions-widget"><h3 class="widget_title">
                                    Réponses
                                    de notre sexologue</h3>
                                <ul class='related-posts'>
                                    <li class="related-item">
                                        <div class="questions-div">
                                            <h3>
                                                <a href="#" title="Ask any question and you be sure find your answer ?"
                                                   rel="bookmark">
                                                    Poser une question </a>
                                            </h3>
                                            <p>Blablabla</p>
                                            <div class="clear"></div>
                                            <span>July 18 , 2014</span>
                                        </div>
                                    </li>
                                    <li class="related-item">
                                        <div class="questions-div">
                                            <h3>
                                                <a href="#" title="como va todo?" rel="bookmark">
                                                    Blablabla </a>
                                            </h3>
                                            <p>queria saber como esta todo?
                                                ...</p>
                                            <div class="clear"></div>
                                            <span>July 6 , 2014</span>
                                        </div>
                                    </li>
                                    <li class="related-item">
                                        <div class="questions-div">
                                            <h3>
                                                <a href="#" title="what is the time" rel="bookmark">
                                                    Blablabla </a>
                                            </h3>
                                            <p>time
                                                ...</p>
                                            <div class="clear"></div>
                                            <span>July 6 , 2014</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </aside><!-- End sidebar -->
                    </div>
                </div>

        </div>
    </div>

@endsection