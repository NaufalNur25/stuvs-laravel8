@extends('layout.main-layout')
@section('content')

@auth
<form action="/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
Hi {{ auth()->user()->username }}
@else
<a href="/login" class="btn btn-warning">Login</a>
@endauth
@endsection

@section('script-extention')

@endsection
