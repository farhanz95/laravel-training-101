<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
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
        // 
        $posts = \App\Post::orderBy('id','desc')->paginate();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  
        $rules = [
            'post_name' => 'required|string|max:20',
            'post_email' => 'email|string|max:64',
        ];

        $this->validate($request,$rules);
        $post = new \App\Post;
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $input['post_type'] = 'New';
        $input['post_address'] = '121';
        $input['post_time'] = date('Y-m-d H:i:s');
        //\Illuminate\Support\Facades\Auth::user()->id
        $post->create($input);

        session()->flash('class','alert alert-success');
        session()->flash('message','User Has Been Created!');

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = \App\Post::find($id);
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = \App\Post::find($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $rules = [
            'post_name' => 'required|string|max:20',
            'post_email' => 'unique|string|max:64',
        ];

        $this->validate($request,$rules);
        $post = \App\Post::find($id);
        $input = $request->all();
        $post->update($input);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = \App\Post::destroy($id);
        // $user->delete();

        return redirect()->route('post.index');
    }
}
