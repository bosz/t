<div class="slider">
    <div class="center">
        <h3>week stories</h3>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" id="top-slider">
                @foreach(array_chunk($newestPosts->all(), 3) as $key => $rows)
                <div class="row item @if($key == 0) active @endif">
                    @foreach($rows as $row)
                    <div class="box box1">
                        <div class="center">
                            <div class="slider-text text text2">{!! $row->content !!}</div>
                            <span class="tags">
                            <?php $tags = explode(',', $row->tags);
                            foreach ($tags as $tag) {
                                $tag = trim($tag);
                                if ($tag == "") {
                                    continue;
                                }
                                $t = urlencode('#'.trim($tag));
                                echo '<a href="?search='.$t.'" data-tag="'.$tag.'" >#' . $tag . '</a> ';
                            }
                            ?>
                            </span>
                            <div class="icons">
                                <span class="leftIcon"><i class="fa fa-ban"></i>&nbsp;&nbsp;&nbsp; <i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
                                <span class="heart heart2"><i class="fa fa-heart" style="width:35px; height:35px; line-height:35px;text-align:center; background:#ededed; border-radius:50%; border:1px solid #f9674e;"></i></span>
                                <span class="rightIcon"><i class="fa fa-venus-mars" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <a href="#carousel-example-generic" class="pull-left left" role="button" data-slide="prev" style="margin:-215px 0px 0px -81px;">
    <img src="{{ asset('nova_files/left.png') }}" width="50" height="104">
    </a>
    <a href="#carousel-example-generic" class="pull-right right" role="button" data-slide="next" style="margin:-215px -81px 0px 0px;">
    <img src="{{ asset('nova_files/right.png') }}" width="50" height="104">
    </a> 
</div>
