@extends('layouts.default_layout')

@section('content')
    <div class="panel-group">
        <div class="panel panel-primary col-md-12 col-sm-12">
            <div class="panel-heading col-md-12 col-sm-12">
                <h3>{{ $popular_post->title }}</h3>
            </div>
            <div class="panel-body col-md-12">
                @if(strlen($popular_post->post) > 53)
                    {!! substr($popular_post->post, 0, 50) !!}...
                    <br />
                    <a href="/post/{{ $popular_post->slug }}">read more!</a>
                @else
                    {!! $popular_post->post !!}
                    <br />
                    <a href="/post/{{ $popular_post->slug }}">read more!</a>
                @endif
            </div>
            <div class="panel-footer text-right col-md-12">
                <h4>
                    <span class="glyphicon glyphicon-fire"></span>
                    Posted at <b>{{ $popular_post->created_at }}</b>.
                    <br />
                    By <b>{{ $popular_user_post->name }}</b>.
                    <br />
                    {{ $popular_post->view_count }} views.
                </h4>
            </div>
        </div>
        <div class="panel panel-primary col-md-12 col-sm-12 top_buffer">
            <div class="panel-heading col-md-12 col-sm-12">
                <h3>{{ $new_post->title }}</h3>
            </div>
            <div class="panel-body col-md-12">
                @if(strlen($new_post->post) > 53)
                    {!! substr($new_post->post, 0,50) !!}...
                    <br />
                    <a href="/post/{{ $new_post->slug }}">read more!</a>
                @else
                    {!! $new_post->post !!}
                    <br />
                    <a href="/post/{{ $new_post->slug }}">read more!</a>
                @endif
            </div>
            <div class="panel-footer text-right col-md-12">
                <h4>
                    <span class="glyphicon glyphicon-alert"></span>
                    Posted at <b>{{ $new_post->created_at }}</b>.
                    <br/>
                    By <b>{{ $new_user_post->name }}</b>.
                    <br />
                    {{ $new_post->view_count }} views.
                </h4>
            </div>
        </div>
    </div>
@endsection