@extends('layouts.main')

@section('content')

<header>
    <div class="d-flex justify-content-end mb-3">
        <form action="{{route('posts.create')}}">
            <input class="btn btn-primary" type="submit" value="Crea nuovo elemento"/>
        </form>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <form action="{{route('tags.index')}}">
            <input class="btn btn-primary" type="submit" value="Tags Index"/>
        </form>
    </div>
</header>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Title Post</th>
            <th scope="col">Title Category</th>           
            <th scope="col">Description PostInfo</th>
            <th scope="col">Tags</th>
            <th scope="col">Maggiori dettagli</th>
            <th scope="col">Modifica</th>
            <th scope="col">Elimina</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($posts as $post)              
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category->title }}</td>
            <td>{{ $post->postInfo->description }}</td>
            <td>
                <ol>
                    @foreach($post->tags as $tag)
                    <li>
                        {{ $tag->name }}
                    </li>
                    @endforeach
                </ol>
            </td>
            <td>
                <form action="{{route('posts.show', $post)}}">
                    <input class="btn btn-primary" type="submit" value="Maggiori dettagli"/>
                </form>
            </td>
            <td>
                <form action="{{route('posts.edit', $post)}}">
                    <input class="btn btn-success"   type="submit" value="Modifica" />
                </form>
            </td>
            <td>
                <form action="{{route('posts.destroy', $post)}}" method="post">
                    @method('delete')
                    @csrf
                    <input class="btn btn-danger" type="submit" value="Elimina"/>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection