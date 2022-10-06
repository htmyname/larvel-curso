@extends('web.layout')

@section('content')
    <x-web.blog.post.index :posts="$posts">
        <h1>Listado de posts</h1>
    </x-web.blog.post.index>
@endsection
