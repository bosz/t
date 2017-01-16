@extends('new-front.master')

@if(Request::has('search'))
    @section('title', 'XYStories : témoignages ' . @urldecode(Request::get('search')))
@else
    @section('title', 'XYStories, les stories X de la génération Y')
@endif

@section('main')


<section>
    <div class="search">
        <form class="form" >
            <button type="submit" class="searchBtn"><i class="fa fa-search"></i></button>
            <input type="search" name="search" class="searchField" placeholder="Recherche:" value="{{Request::get('search')}}">
            <!-- <ul class="searchField" placeholder="Recherche:"></ul> -->
        </form>
    </div>
    <div class="innerContainer">
        
        <div class="mainSection">
            <form action="{{url('site-post')}}" method="POST">
                <div>
                    <h3>Ecris ta story</h3>
					 <span style="color:#f9674e;">{{$errors->first('content')}}</span> 
                    <img id="pen" style="position: absolute; margin: 5px; display: block;" src="https://cdn1.iconfinder.com/data/icons/hawcons/32/698982-icon-135-pen-angled-128.png" width="20">
                    {{csrf_field()}}
					 <textarea name="content" onblur="$('#pen').show(); $('#story_body').css('height', '15px');" style="width: 97%; border: 1px solid red; margin-bottom: 20px; padding: 5px; height: 15px;" onfocus="$('#pen').hide(); $('#story_body').css('height', '70px');" id="story_body"></textarea>
					
				   <input  class="textBox pass" type="hidden" value="" name="tags" />
                    <div style="margin-top:-15px; margin-bottom:10px; text-align:center; align:center">
                        <span style="color:red">
                            <input type="radio" required value="homme" name="gender"><i class="fa fa-venus-mars"></i>&nbsp;&nbsp;
                            <input type="radio" required value="femme" name="gender"><i class="fa fa-transgender"></i>&nbsp;&nbsp;
                            <input type="radio" required value="bi" name="gender"><i class="fa fa-venus"></i>
                        </span>
                        <button style="width:50px" name="submit" type="submit" class="submit">Poster</button>
                    </div>
                </div>
            </form>
            @include('new-front.partials.sidebar')
            <div class="stories">
                <div class="center">
                    <div class="headings">
                        <h3 class="h11">
                        @if(Request::has('search'))
                            <small>Recherche {{ Request::get('search') }}</small> : 
                        @endif
                        <a href="{{URL::to('/')}}" @if(Request::is('/')) style="color: red;" @else style="color: #ededed" @endif >Last stories</a></h3>
                        <h3 class="h22">
                        <a href="{{URL::to('top-posts')}}" @if(Request::is('top-posts')) style="color: red;" @else style="color: #ededed" @endif >Top stories</a></h3>
                    </div>
                    <article class="question"></article>
                    @if(@sizeof($posts) > 0)
                        @foreach(array_chunk($posts->all(), 3) as $post)
                            @include('new-front.partials.posts')
                        @endforeach
                    @else
                        <center><h1>No Post Matches Search {{Request::get('search')}} </h1></center>
                    @endif
                    <div class="load-part clearfix pagination"><center><h4>Loading . . .</h4></center></div>
                    <div class="emptyArea">
                        <span><i class="fa fa-venus-mars"></i>&nbsp;&nbsp;<i class="fa fa-transgender"></i>&nbsp;&nbsp;<i class="fa fa-venus"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottomSection">
        <div class="bottomLogo">
            <img src="{{ asset('nova_files/logo2.png') }}">
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{ asset('js/init.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var tags = <?php echo json_encode($tags); ?>;
        var availableTags = new Array();
        $.each(tags, function(k, v){
            availableTags.push(v.title);
        })
        // console.log(window.location.pathname)
    });
</script>
@endsection