@extends('layouts.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">FK Categories</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)              
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <th scope="row">{{ $post->category_id }}</th>
            <td>{{ $post->title }}</td>
            <td>{{ $post->author }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection