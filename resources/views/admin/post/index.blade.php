@extends('layouts.app')
@section('content')
    <div class="container-fluid content p-3 px-4">

        <h2 class="n-txt">Post List</h2>
        @if (session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Contenuto</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Visite</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Visite</th>
                    <th scope="col">Like</th>
                    <th scope="col">Dislike</th>
                    <th scope="col">Dettaglio</th>
                    <th scope="col">Edita</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->category?->name }}</td>
                        <td>{{ $post->created_at->format('d/m/Y') }}</td>
                        <td>{{ $post->visit }}</td>
                        <td>{{ $post->positive_votes }}</td>
                        <td>{{ $post->negative_votes }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td><a class="bot" href="{{ route('admin.posts.show', $post->id) }}"><i
                                    class="fa-regular fa-eye"></i></a></td>
                        <td><a class="bot" href="{{ route('admin.posts.edit', $post) }}"><i
                                    class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                        <td>
                            @include('admin.partials.formDelete', [
                                'route' => route('admin.posts.destroy', $post),
                                'message' => 'Confermi l\'eliminazione del post: {{ $post->title }}?',
                            ])
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
