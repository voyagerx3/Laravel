<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::with('user')->orderBy('id', 'desc')->paginate(10);
        //$posts = Post::orderby('id','desc')->paginate(5);
        $posts = Post::orderby('id','desc')->paginate(5);
        return view('posts.index')->with(['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          $category = Category::all();
        return view('posts.create')->with(['category'=>$category ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        $post->fill($request->only('title', 'content','category_id', 'url'));
        $post->user_id = $request->user()->id;
        $post->save();
        session()->flash('message', 'Post Created!');
        return redirect()->route('posts_path');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //Post $post
        //$category = Category::where('id',$post->category_id)->get();
        //dd($post);
        return view('posts.show')->with(['post'=>$post]);//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        if($post->user_id != \Auth::user()->id) {
            return redirect()->route('posts_path');
        }
        $category = Category::all();
        return view('posts.edit')->with(['post' => $post,'category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post,UpdatePostRequest $request)
    {
        //dd($request->only('title','category_id','content','url'));
        $post->update(
            $request->only('title','content','url','category_id')
        );
        session()->flash('message', 'Post Updated!');
        return redirect()->route('post_path', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        //

        if($post->user_id != \Auth::user()->id) {
            return redirect()->route('posts_path');
        }
        $post->delete();
        session()->flash('message', 'Post Deleted!');
        return redirect()->route('posts_path');
    }
}
