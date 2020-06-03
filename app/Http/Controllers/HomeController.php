<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');
       //$posts = Post::all();

       //return view('theme.frontoffice.pages.inicio',[
        //'posts' => $posts
        return view('theme.backoffice.pages.inicio',[
            'posts' => Post::orderBy('id','ASC')->get(),
        ]);
    }
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('theme.backoffice.pages.show',[
            'post' => $post
        ]);
    }
}
