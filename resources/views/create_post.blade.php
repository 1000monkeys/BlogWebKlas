@extends('layouts.default_layout')

@section('extra_javascript')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
    <form method="POST" action="/post/create">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Titel:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" readonly required>
        </div>
        <textarea name="editor1" id="editor1">

        </textarea>
        <br />
        <div class="form-group">
            <input type="submit" value="Submit!" class="form-control btn btn-primary" required>
        </div>
    </form>
@endsection

@section('bottom_javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            CKEDITOR.replace( 'editor1' );

            $("#title").keyup(function () {
                var title = $("#title").val();
                title = title.split(' ').join('_');
                $("#slug").val(title);
            });

            $("#title").change(function () {
                var title = $("#title").val();
                title = title.split(' ').join('_');
                $("#slug").val(title);
            })
        });
    </script>
@endsection