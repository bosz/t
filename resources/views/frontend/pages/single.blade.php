@extends('new-front.master')

@if(Request::has('search'))
    @section('title', 'XYStories : témoignages ' . @urldecode(Request::get('search')))
@else
    @section('title', 'XYStories, les stories X de la génération Y')
@endif

@section('main')


<section>
   
    <div class="innerContainer">
        
        <div class="mainSection" style="padding-top:30px;">
            @include('new-front.partials.sidebar')
            <div class="stories" style="padding:0px;padding-top:25px;padding-bottom:10px;">
                <div class="center">
                   
                    @if($post)
                       <div class="box pst oneBox" style="width:100%; float:left; position:relative; margin:0px;">
							<div class="center">
								<div class="text2">{!! $post->content !!}</div>
								<span class="tags"  style="font-size:12px">
									<?php $tags = explode(',', $post->tags);
									foreach ($tags as $tag) {
										$tag = trim($tag);
										if ($tag == "") {
											continue;
										}
										$t = urlencode('#'.trim($tag));
										echo '<a href="'.url('/').'?search='.$t.'" data-tag="'.$tag.'" >#' . $tag . '</a> ';
									}
									?>
								</span>
							   
								<div class="container-flud post-other-details">
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
								</div>
								<div class="icons iconss">
									<span class="leftIcon" style="width:35%;"><i class="fa fa-ban" ></i></span>
									<span class="heart {{$post->liked == true ? 'active' : null }}" data-post-id={{$post->id}}><i class="likes_count">{{ $post->likes_count != NULL ? $post->likes_count : 0 }}</i><i class="fa fa-heart" style="width:35px; height:35px; line-height:35px;text-align:center; background:#ededed; border-radius:50%;"></i></span>
									<span class="rightIcon"><i class="fa fa-mars" aria-hidden="true"></i></span>
								</div>
							</div>
						</div>
                    @else
                        <center><h1>No Post Matches Search {{Request::get('search')}} </h1></center>
                    @endif
					<div style="text-align:center;">
					<span style="color: rgb(0, 0, 0);font-family: Arial;font-size: 13.3333px;white-space: pre-wrap;">Partager la story par</span><br />
                   <div id="share"></div>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var tags = <?php echo json_encode($tags); ?>;
        var availableTags = new Array();
        $.each(tags, function(k, v){
            availableTags.push(v.title);
        })
        // console.log(window.location.pathname)
    });
	 $("#share").jsSocials({
            shares: ["email", "twitter", "facebook"]
        });
</script>
@endsection