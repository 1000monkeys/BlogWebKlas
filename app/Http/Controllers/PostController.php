<?php

namespace App\Http\Controllers;

use App\Blog_comment;
use App\User;
use Illuminate\Http\Request;
use \App\Blog_post;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $new_post = Blog_post::orderBy('created_at', 'desc')->first();
        $new_user_post = User::where('id', $new_post->user_id)->first();

        $popular_post = Blog_post::where('id', '<>', $new_post->id)->orderBy('view_count', 'desc')->first();
        if ($popular_post == null) {
            $popular_post = Blog_post::orderBy('view_count', 'desc')->first();
        }
        $popular_user_post = User::where('id', $popular_post->user_id)->first();

        return View('index')
            ->with('popular_post', $popular_post)
            ->with('new_post', $new_post)
            ->with('popular_user_post', $popular_user_post)
            ->with('new_user_post', $new_user_post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->posting_ability == 1) {
            return View('create_post');
        }else {
            Session::flash('message', "You cannot create posts!");
            return redirect()->route('index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->posting_ability == 1) {
            $blog_post = new Blog_post();

            $blog_post->title = $request->title;
            $blog_post->slug = $request->slug;
            $blog_post->post = $request->editor1;
            $blog_post->user_id = Auth::id();
            $blog_post->view_count = 0;

            $blog_post->save();

            return redirect('/post/'.$request->slug);
        }else {
            Session::flash('message', "You cannot create posts!");
            return redirect()->route('index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog_post = Blog_post::where('slug', $id)->first();
        $blog_post->view_count += 1;

        $view_count_blog_post = Blog_post::find($blog_post->id);
        $view_count_blog_post->view_count += 1;
        $view_count_blog_post->save();

        $user_post = User::where('id', $blog_post->user_id)->first();

        $comments = Blog_comment::where('blog_id', $blog_post->id)->orderBy('created_at', 'asc')->get();

        return view('view_post')
            ->with('blog_post', $blog_post)
            ->with('user_post', $user_post)
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listPosts(){
        $posts = Blog_post::all()->sortByDesc('created_at');

        return View('list_post')->with('posts', $posts);
    }
}
