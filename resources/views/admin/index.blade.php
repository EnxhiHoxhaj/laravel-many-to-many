@extends('layouts.app')

@section('content')
    <div class="container-fluid p-3 px-4 d-flex flex-column align-items-center">
        <h1 class="n-txt">Benvenuto nella Dashboard</h1>
        <h3 class="n-txt">Sono presenti {{ $n_post }} posts al momento</h3>
    </div>
@endsection
