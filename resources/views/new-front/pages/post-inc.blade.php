<div class="box post-box">
    <div class="center">
        <p class="text">{!!  $post->content !!}</p>
        <span class="tags">
        <?php $tags = explode(',', $post->tags);
        unset($tags[sizeof($tags)-1]);
        foreach ($tags as $tag) {
        
            echo '#' . trim($tag) . ' ';
        }
        ?>
        </span>
        <hr class="inner-sep">
        <div class="container-flud post-other-details">
            <strong>{{$post->author}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <small>{{  $post->created_at->diffForHumans() }}</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <small>{{  $post->count }} vues</small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fa fa-twitter"></i>
        </div>
        <div class="icons iconss">
            <span class="leftIcon"><i class="fa fa-ban"></i></span>
            <span class="heart"><i class="fa fa-heart" style=""></i></span>
            <span class="rightIcon"><i class="fa fa-mars" aria-hidden="true"></i></span>
        </div>
    </div>
</div>