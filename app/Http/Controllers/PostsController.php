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
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // $posts = Post::latest();
        //
        // if($month = request('month'))
        // {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }
        //
        // if($year = request('year'))
        // {
        //     $posts->whereYear('created_at', $year);
        // }
        //
        // $posts = $posts->get();



        //$posts = Post::latest()->get();
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
