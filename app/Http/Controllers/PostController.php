<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // No index
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // No separate create page
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;

        Auth::user()->posts()->save($post);

        $request->session()->flash('status', "Posted!");
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::id() == $post->user->id) {
            return view('posts.edit', compact('post'));
        }
        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() == $post->user->id) {
            $request->validate([
                'title' => 'required|max:255',
                'body'  => 'required'
            ]);

            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            $request->session()->flash('status', "Post has been updated!");
        }
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Post $post)
    {
        if (Auth::id() == $post->user->id) {
            $post->delete();
            $request->session()->flash('status', "The post has been deleted.");
        }
        return redirect()->route('home');
    }
}
