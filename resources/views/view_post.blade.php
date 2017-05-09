@extends('layouts.default_layout')

@section('extra_javascript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <div class="panel panel-primary col-md-12 col-sm-12">
        <div class="panel-heading col-md-12 col-sm-12">
            <h3>{{ $blog_post->title }}</h3>
        </div>
        <div class="panel-body col-md-12 col-sm-12">
            {!! $blog_post->post !!}
        </div>
        <div class="panel-footer text-right col-md-12 col-sm-12">
            Posted at <b>{{ $blog_post->created_at }}</b> by <b>{{ $user_post->name }}</b>.
            <br />
            {{ $blog_post->view_count }} views.
        </div>
    </div>
    <div class="panel panel-primary col-md-9 col-md-offset-3 col-sm-9 col-sm-offset-3">
        @foreach($comments as $comment)
            <div class="panel panel-primary col-md-12 col-sm-12 top_buffer">
                <div class="panel-heading col-md-12 col-sm-12">
                    <h5>{{ $comment->user->name }} says:</h5>
                </div>
                <div class="panel-body col-md-12 col-sm-12">
                    {!! $comment->comment !!}
                </div>
                <div class="panel-footer text-right col-md-12 col-sm-12">
                    on {{ $comment->created_at }}
                </div>
            </div>
        @endforeach
        @if(\Illuminate\Support\Facades\Auth::check())
            <div class="top_buffer">
                <form method="POST" action="/comment/create">
                    {{ csrf_field() }}
                    <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog_post->id }}">
                    <textarea name="editor1" id="editor1">

                    </textarea>
                    <div class="form-group top_buffer">
                        <input type="submit" class="btn btn-primary btn-block" value="Toevoegen!">
                    </div>
                </form>
            </div>
        @else
            <h4 class="text-center top_buffer">
                Log in om een comment te plaatsen!
            </h4>
        @endif
    </div>
@endsection

@section('bottom_javascript')
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('editor1');
        });
    </script>
@endsection