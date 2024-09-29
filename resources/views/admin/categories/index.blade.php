@extends('layouts.app')
@section('content')
    <div class="container-fluid content p-3 px-4">

        @if (session('delete'))
            <div class="alert alert-success">
                {{ session('delete') }}
            </div>
        @endif

        <h2 class="n-txt">Gestione Categorie</h2>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="cate d-flex align-items-center">
                <input type="text" name="name" class="form-control" placeholder="Aggiungi una nuova categoria">
                <button class="btn btn-success add my-4" type="submit">VAI</button>
            </div>
        </form>
        <table class="table category-list">
            <tbody class="table">
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            <form action="{{ route('admin.categories.update', $category) }}" method="POST"
                                id='form-edit-{{ $category->id }}'>
                                @csrf
                                @method('PUT')
                                <input class="edit" type="text" name="name" value=" {{ $category->name }}">
                            </form>

                        </td>
                        <td>
                            <button class="btn btn-success add my-4" type="submit"
                                onclick="editCategorySubmit({{ $category->id }})">Aggiorna
                            </button>
                        </td>
                        <td>
                            @include('admin.partials.formDelete', [
                                'route' => route('admin.categories.destroy', $category),
                                'message' => 'Confermi l\'eliminazione del post: {{ $category->name }}?',
                            ])
                            ELIMINA
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function editCategorySubmit(id) {
            const form = document.getElementById('form-edit-${id}')
            form.submit();
        }
    </script>
@endsection
