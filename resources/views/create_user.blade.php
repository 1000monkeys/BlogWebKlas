@extends('layouts.default_layout')

@section('content')
    <h1 class="text-center">Registreren!</h1>
    <form method="POST" action="/user/create">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Naam:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Submit!" class="form-control btn btn-primary">
        </div>
    </form>
@endsection