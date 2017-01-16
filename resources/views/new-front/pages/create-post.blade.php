@extends('new-front.master')
@section('title', 'Create New Post')
@section('class', 'home')
@section('main')


<section>
    <div class="innerContainer">
    <br><br><br><br>
        @include('common.errors')
        <div class="mainSection">
            <div class="stories" style="width: 100%;">
                <div class="center">
                    <div class="form2">
                        <div class="center">
                            <h3>Create Post</h3>
                            <form action="{{url('site-post')}}" method="POST">
                                <input type="hidden" name="title" value="no-title">
                                <br><br>
                                <textarea name="content" id="editor"></textarea>
                                <br><br>
                                <input  class="textBox pass" type="text" placeholder="#tag1, #tag2" name="tags" id="tags" />
                                {{csrf_field()}}
                                <br><br><br>
                                @if(Auth::check())
                                    <div class="checkbox">
                                        <label><input name="anonymous" type="checkbox" value="true">Anonymous</label>
                                    </div>
                                @endif
                                <button type="submit" name="submit" class="submit">Create</button>
                            </form>
                            <hr>
                        </div>
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
<script type="text/javascript">
    
    $(document).ready(function() {
        $('textarea').trumbowyg();
    });

</script>
@endsection