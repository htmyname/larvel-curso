@extends('dashboard.layout')

@section('content')

    <a class="btn btn-success my-3" href="{{ route('post.create') }}">Crear Post</a>

    <table class="table mb-3">
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
                    <a class="btn btn-primary mb-2" href="{{ route('post.show', $p) }}">Ver</a>
                    <a class="btn btn-primary mb-2" href="{{ route('post.edit', $p) }}">Editar</a>
                    <form class="inline-block" action="{{ route('post.destroy', $p) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input class="btn btn-danger mb-2" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
