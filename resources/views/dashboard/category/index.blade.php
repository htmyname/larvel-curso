@extends('dashboard.layout')

@section('content')

    <a href="{{ route('category.create') }}">Crear Categoria</a>

    <table>
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
                    <a href="{{ route('category.show', $c) }}">Ver</a>
                    <a href="{{ route('category.edit', $c) }}">Editar</a>
                    <form action="{{ route('category.destroy', $c) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $category->links() }}
@endsection
