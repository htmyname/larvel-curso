@extends('dashboard.layout')

@section('content')
    <h1 class="mb-2">Editar</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.update', $category->id) }}" method="post">
        @method('PATCH')
        @include('dashboard.fragment._category-form')
    </form>
@endsection
