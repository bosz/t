@if(count($posts))
    @foreach($posts as $post)


        <?php $tags = explode(',', rtrim($post->tags)); ?>

        <article
                class="question question_author_yes  type-question status-publish hentry question-category-wordpress question_tags-themes"
                role="article" itemscope="">
            <h3 itemprop="name" style="margin-top:-10px">
                <a itemprop="url" href="{{url('post/'.$post->id)}}" title="Le jour ou j'ai mangé une pomme"
                   rel="bookmark">{{$post->title}}</a>
            </h3>


            <div class="post-desc-part">
                <div class="clearfix"></div>
                <div class="question-desc">
                    {!!  $post->content !!}

                    <div style="margin-left:-20px; margin-top:10px">
                        @foreach($tags as $tag)
                            @if(!empty($tag))
                                <a href="{{url('tag/'.trim($tag))}}"> <span class="badge-span"
                                                                            style="background-color: grey">{{$tag}}</span></a>
                            @endif
                        @endforeach
                    </div>

                    <div class="explain-reported">
                        <h3>Please briefly explain why you feel this question should
                            bereported .</h3>
                        <textarea name="explain-reported"></textarea>
                        <div class="clearfix"></div>
                        <div class="loader_3"></div>
                        <div class="color button small report"></div>
                    </div><!-- End reported -->

                    <div class="vote_more"></div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="question-details">
                            <span class="question-answered">{!!  $post->author !!}</span>
                        </div>

                         <span class="question-date" itemprop="datePublished">
                             {{  $post->created_at->diffForHumans() }}
                         </span>

                        <span class="question-view question-date">{{$post->count}} vues</span>
                        <span><a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a></span>
                        <span><a href=""><i class="fa fa-twitter-square" aria-hidden="true"></i></a></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-right soc-medias">
                            <a href=""> <span class="glyphicon glyphicon-thumbs-up" style="color:#028482"></span></a>
                            <a href=""><span class="glyphicon glyphicon-thumbs-down" style="color:#EE3233"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
@else
    <h2>No Posts</h2>
@endif