@extends('layouts.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">Title Post</th>
            <th scope="col">Title Category</th>           
            <th scope="col">Description PostInfo</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)              
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->title }}</td>
            <td>{{ $post->postInfo->description }}</td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection