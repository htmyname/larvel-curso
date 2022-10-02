@extends('dashboard.layout')

@section('content')
    <h1 class="mb-2">Create Category</h1>

    @include('dashboard.fragment._errors-form')

    <form action="{{ route('category.store') }}" method="post">
        @include('dashboard.fragment._category-form')
    </form>
@endsection
