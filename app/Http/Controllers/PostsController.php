<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year', 'month')
            ->get()
            ->toArray();
        //return $archives;
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // public function show($id)
    // {
    //     $post = Post::find($id);
    //     return view('posts.show', compact('post'));
    // }


    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        //dd(auth()->id());
        //dd(request()->all());
        //dd(request('title'));
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        $this->validate(request(), [
            'title' => 'required|max:30',
            'body' => 'required|max:400'
            //'body' => 'required'
        ]);

        auth()->user()->publish( new Post(request(['title', 'body'])));

        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id() //auth->user->id
        // ]);

        // Post::create(request(['title', 'body]));

        return redirect('/');
    }

}
