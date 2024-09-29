<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostsRequest;
use App\Functions\Helper;
use Faker\Generator as Faker;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Post::orderby('id', 'desc')->paginate(10);
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostsRequest $request, Faker $faker)
    {

        $data= $request->all();
        $new_post= new Post();
        $data['slug'] = Helper::generateSlug($data ['title'], Post::class);
        $new_post->visit= $faker->numberBetween(0, 0);
        $new_post->positive_votes= $faker ->numberBetween(0, 0);
        $new_post->negative_votes= $faker ->numberBetween(0, 0);
        $new_post->created_at = now();
        $new_post->updated_at = now();
        $new_post-> fill($data);
        $new_post->save();
        return redirect()->route('admin.posts.show', $new_post ->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories= Category::all();
        $edit_post= Post::find($id);
        return view('admin.post.edit', compact('edit_post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Post $post)
    {
        $data = $request->all();

        if($data['title'] === $post->title){
            $data ['slug']= $post->slug;
        } else {
            $data['slug'] = Helper::generateSlug($data['title'], Post::class);
        }
        $post->update($data);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post-> delete();
        return redirect()->route('admin.posts.index')->with('delete', 'Il post '. $post->title . 'è stato eliminato corettamente');
    }
}
