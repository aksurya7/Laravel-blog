<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Image;
use Validator;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'title' => 'required|max:50|min:3',
            'description' => 'required|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'author' => 'required|max:20|min:3',
            'category_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            session::flash('coc','Post Creation Failed....!');
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        //store Posts
        $image =$request->file('image');
        $upload = 'img/';
        $filename =time().$image->getClientOriginalName();
        $path =move_uploaded_file($image->getPathName(), $upload.$filename);
        $post = new Post;
        $post->title = $request->title;
        $post->author = $request->author;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = $filename;
        $post->save();

        session::flash('cc', nl2br('Post Is Created Successfully....!!       Click Show All Post Button to see Created Category'));
          return redirect('post/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::all();
        return view('post.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('post.edit',compact('post'))->with('categories',$categories);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50|min:3',
            'description' => 'required|min:3',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
            'author' => 'required|max:20|min:3',
            'category_id' => 'required',
            
        ]);

        if ($validator->fails()) {
            session::flash('puf','Post Updation Failed....!');
            return redirect('post/show')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Code for get Image
        $image =$request->file('image');
        $upload = 'img/';
        $filename =time().$image->getClientOriginalName();
        $path =move_uploaded_file($image->getPathName(), $upload.$filename);
        //Update Posts
        $post = Post::find($id);
        $post->title = $request->title;
        $post->author = $request->author;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = $filename;
        $post->save();

        session::flash('pc', nl2br('Post Is Updated Successfully....!!'));
          return redirect('post/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('post/show')->with('pd','Post Deleted Successfuly...!');

    }
}
