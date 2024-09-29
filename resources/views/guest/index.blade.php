@extends('layouts.guest')

@section('content')
    <h1>Guest page</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <button><a href={{ 'login' }}>Admin</a></button>
    </form>
@endsection
