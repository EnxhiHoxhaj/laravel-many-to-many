@extends('layouts.app')
@section('content')
    <div class="container-fluid content p-3 px-4">
        <h1 class="n-txt">Crea nuovo post</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <form class="form d-flex flex-column" action="{{ route('admin.posts.store') }}" method="POST"
            class="row g-3 needs-validation" novalidate>

            @csrf
            <div class="col-md-4 py-4 txt">
                <label for="validationCustom01" class="form-label">
                    Titolo
                </label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="validationCustom01"
                    required name="title" value="{{ old('title') }}">
                @error('title')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror

            </div>
            <div>
                <label for="category" class="form-label">
                    Categoria
                </label>
                <select class="form-select" aria-label="Defaulte select exemple" id="category" name="category_id">
                    <option value="" selected>Segli una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 py-4 d-flex flex-column txt">
                <label for="validationCustom02" class="form-label">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="validationCustom02"
                    cols="30" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary add" type="submit">Add to posts list</button>
            </div>
        </form>

    </div>
@endsection
