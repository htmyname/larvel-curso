@extends('dashboard.layout')

@section('content')

    <a class="btn btn-success my-3" href="{{ route('category.create') }}">Crear Categoria</a>

    <table class="table mb-3">
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $c)
            <tr>
                <td>{{ $c->title }}</td>
                <td>
                    <a class="btn btn-primary mb-2" href="{{ route('category.show', $c) }}">Ver</a>
                    <a class="btn btn-primary mb-2" href="{{ route('category.edit', $c) }}">Editar</a>
                    <form class="inline-block" action="{{ route('category.destroy', $c) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger mb-2" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $category->links() }}
@endsection
