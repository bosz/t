@extends('frontend.master')
@section('title', 'Latest Posts')
@section('class', 'latest')
@section('main')
    <div class="col-md-10 col-md-offset-1">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                @if(!empty($tags))
                    <h3>Related post by tag name <b>({{$name}})</b></h3>
                @else
                    <h3>Search Result by <b>{{$name}}</b></h3>
                @endif
                <div class="tabs-warp question-tab">

                    <div class="tab-inner-warp">
                        <div class="tab-inner">
                            @include('frontend.partials.posts')
                        </div>
                        <div class="load-part clearfix"><h4>Loading...</h4></div>
                    </div>
                </div><!-- End page-content -->
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1">
            @if(!empty($tags))
                {!! $posts->render() !!}
            @endif
        </div>
    </div>

@endsection