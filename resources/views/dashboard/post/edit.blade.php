@extends('dashboard.layout')

@section('content')
    <h1>Editar</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        @include('dashboard.fragment._form', ['task' => 'edit'])
    </form>
@endsection
