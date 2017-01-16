@extends('frontend.master')
@section('title', 'Latest Posts')
@section('class', 'latest')
@section('main')
    <div class="col-md-10 col-md-offset-1">
        <h3>Create Posts</h3>
        @include('common.errors')
        <form action="{{url('site-post')}}" method="POST">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <div class="post-desc">
                    <textarea name="content" class="form-control" id="editor"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label>Tags</label>
                <input type="text" placeholder="#tag1, #tag2" name="tags" id="tags" class="form-control">
            </div>

            @if(Auth::check())
                <div class="checkbox">
                    <label><input name="anonymous" type="checkbox" value="true">Anonymous</label>
                </div>
            @endif

            <hr/>
            <div class="form-group">
                <input type="hidden" name="user" value="user">
                {{csrf_field()}}
                <button class="btn btn-success" type="submit">Create Post</button>
            </div>
        </form>
    </div>

@endsection