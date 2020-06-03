<?php

namespace App\Http\Controllers;
use App\Post;


use Illuminate\Http\Request;

class PostsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderBy('id','desc')->get();

        return view('theme.frontoffice.pages.index',[
            'posts' => Post::orderBy('id','ASC')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('theme.frontoffice.pages.create',[
            'posts' => post::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        


        $data = request()->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
             'post_content' =>'required'

        ]);

        //get te image from the form
        $fileNamewithExtension = request('image')->getClientOriginalName();
        //get the name of the file
        $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
        //create a new name for the file using the timestamp
        $extension = request('image')->getClientOriginalExtension();
        //save the image onto apublic directory into a separately folder
        $newfileName = $fileName . '_'. time() . '.' . $extension;

        $path =request('image')->storeAs('public/images/posts_images',$newfileName);
            //dd($newfileName);


        
        $user = auth() -> user();
        $post =new Post();

        $post ->title = request('title');
        $post->image_url = $newfileName;
        $post ->content = request('post_content');
        $post->user_id =$user->id;

        $post -> save();

        return view('theme.frontoffice.pages.index',[
            'posts' => Post::all(),
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        //
        $post = Post::find($post->id);
        //dd($post);
        return view('theme.frontoffice.pages.edit',[
            'post' => $post
        ]);
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
        //
        
        $data = request()->validate([
            'title' => 'required|max:255',
            'image' => 'required|image',
             'post_content' =>'required'

        ]);

        //get te image from the form
        $fileNamewithExtension = request('image')->getClientOriginalName();
        //get the name of the file
        $fileName = pathinfo($fileNamewithExtension,PATHINFO_FILENAME);
        //create a new name for the file using the timestamp
        $extension = request('image')->getClientOriginalExtension();
        //save the image onto apublic directory into a separately folder
        $newfileName = $fileName . '_'. time() . '.' . $extension;

        $path =request('image')->storeAs('public/images/posts_images',$newfileName);
            //dd($newfileName);

        $post = Post::findOrFail($post->id);

        $post ->title = request('title');
        $post->image_url = $newfileName;
        $post ->content = request('post_content');
        

        $post -> save();

        return view('theme.frontoffice.pages.index',[
            'posts' => Post::all(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        //find the post
        $post = Post::find($request->post_id);

        $oldImage = public_path() . '/storage/images/posts_images/'. $post->image_url;

        if(file_exists($oldImage)){
            //delete the image
            unlink($oldImage);
        }

        //delete the post
        $post->delete();

        //redirect to posts
        return redirect('/posts');
    }
}
