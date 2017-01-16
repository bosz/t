<div class="list hidden-xs" id="left-side-bar">
    <div class="clrBtns">
        <div class="center all-tags">
            <h3>Les XYTags
            </h3>
            <?php $clr = ['clr1', 'clr2', 'clr3', 'clr4', 'clr5', 'clr6']; ?>
            @foreach($tags as $tag)
            <a href="{{url('/')}}?search={{@urlencode('#' . $tag->title)}}">
                <div class="{{$clr[@rand(0, 5)]}} clr">
                    #{{$tag->title}}
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="article">
        <div class="center">
            <h3>Articles</h3>
            <p>Bientôt ;)</p>
           
        </div>
    </div>

</div>