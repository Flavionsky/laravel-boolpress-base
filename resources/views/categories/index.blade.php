@extends('layouts.main')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Url</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)              
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>Http://{{ $category->title }}/-{{ $category->slug }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection