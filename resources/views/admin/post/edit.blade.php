@extends('layouts.app')
@section('content')
    <div class="container-fluid content p-3 px-4">
        <h1 class="n-txt">Modifica post</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <form class="form d-flex flex-column" action="{{ route('admin.posts.update', $edit_post) }}" method="POST"
            class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="col-md-4 d-flex flex-column py-4 txt">
                <label for="validationCustom01" class="form-label">
                    Titolo
                </label>
                <input type="text" class="form-controlid @error('title') is-invalid @enderror" id="validationCustom02"
                    required name="title" value="{{ old('title', $edit_post->title) }}">
                @error('title')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div>
                <select class="form-select" aria-label="Defaulte select exemple" id="category">
                    <option name="category_id">Segli una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}" @if (old('category_id', $edit_post->category?->id) == $category->id) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
            <div class="col-md-4 py-4 d-flex flex-column txt">
                <label for="validationCustom02" class="form-label @error('content') is-invalid @enderror">Contenuto</label>
                <textarea class="form-control " name="content" id="validationCustom02" cols="30" rows="10">{{ old('content', $edit_post->content) }}</textarea>
                @error('content')
                    <small class="text-danger"> {{ $message }}</small>
                @enderror
            </div>
            <div class="col-12">
                <button class="btn btn-primary add" type="submit">Aggiorna</button>
            </div>
        </form>
    @endsection
