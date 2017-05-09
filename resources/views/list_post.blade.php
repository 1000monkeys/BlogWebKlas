@extends('layouts.default_layout')

@section('content')
    @foreach($posts as $post)
        <div class="panel-group">
            <?php
                $user_post = \App\User::where('id', $post->id)->first();
            ?>
            <div class="panel panel-primary col-md-12 col-sm-12 top_buffer">
                <div class="panel-heading col-md-12 col-sm-12">
                    <h3>{{ $post->title }}</h3>
                </div>
                <div class="panel-body col-md-12">
                    @if(strlen($post->post) > 53)
                        {!! substr($post->post, 0,50) !!}...
                        <br />
                        <a href="/post/{{ $post->slug }}">read more!</a>
                    @else
                        {!! $post->post !!}
                        <br />
                        <a href="/post/{{ $post->slug }}">read more!</a>
                    @endif
                </div>
                <div class="panel-footer text-right col-md-12">
                    <h4>
                        <span class="glyphicon glyphicon-alert"></span>
                        Gepost op <b>{{ $post->created_at }}</b>.
                        <br/>
                        Door <b>{{ $user_post->name }}</b>.
                        <br />
                        {{ $post->view_count }} keer bekeken.
                    </h4>
                </div>
            </div>
        </div>
    @endforeach
@endsection