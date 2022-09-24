@extends('dashboard.layout')

@section('content')

    <a href="{{ route('post.create') }}">Crear Post</a>

    <table>
        <thead>
        <tr>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>Posteado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $p)
            <tr>
                <td>{{ $p->title }}</td>
                <td>{{ $p->category->title }}</td>
                <td>{{ $p->posted }}</td>
                <td>
                    <a href="{{ route('post.show', $p) }}">Ver</a>
                    <a href="{{ route('post.edit', $p) }}">Editar</a>
                    <form action="{{ route('post.destroy', $p) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
