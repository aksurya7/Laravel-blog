<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;

class PostViewController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('postview.index',compact('posts'));

        // $categories = Category::all();
        // return view('post.create',compact('categories'));
    }

    public function fullpost($id)
    {
        $post = Post::find($id);
        // $post = Post::find($id);

        return view('postview.fullpost', compact('post'));
    }

    

}
