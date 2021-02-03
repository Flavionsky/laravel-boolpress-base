@extends('layouts.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">FK Post</th>
            <th scope="col">Description</th>
            <th scope="col">Slug</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($postsinformation as $postinfo)              
        <tr>
            <th scope="row">{{ $postinfo->id }}</th>
            <th scope="row"> {{ $postinfo->post_id }} </th>
            <td>
                <p>
                    {{ $postinfo->description }}
                </p>
            </td>
                    
            <td>{{ $postinfo->slug }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection