<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

use App\PostInformation;

use App\Tag;

use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newPost = new Post;

        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category_id = $data['category_id'];

        $newPost->save();

        $newPostInfo = new PostInformation;
        $newPostInfo->post_id = $newPost->id;

        $newPostInfo->slug = Str::slug($newPost->title);
        $newPostInfo->description = $data['description'];

        $newPostInfo->save();

        $newPost->tags()->attach($data['tags']);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'post' => $post
        ];


        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->update([
            'title' => $data['title'],
            'author' => $data['author'],
            'category_id' => $data['category_id']
        ]);

        $post->postInfo()->update(['description' => $data['description']]);

        $post->tags()->sync($data['tags']);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->postInfo->delete();

        foreach ($post->tags as $tag) {

            $post->tags()->detach($tag->id);

        }

        $post->delete();

        return redirect()->back();
    }
}
