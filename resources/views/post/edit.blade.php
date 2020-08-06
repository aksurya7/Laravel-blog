@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Update Posts</h1>

<a href="/post/show" class="btn btn-primary">BACK</a>
<a href="/post/create" class="btn btn-outline-primary">Create New Post</a>
<hr>

    @if( Session::has('cc'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"> X </button>
            <strong>{{session('cc')}}</strong>
        </div>
        <hr>
    @endif


    @if( Session::has('coc'))
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            <strong>{{session('coc')}}</strong>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endif


{{-- <form method="post" action="{{route('post.store')}}" > --}}
<form method="post" action="{{route('post.update', $post->id)}}" enctype='multipart/form-data'>
    @method('PATCH')
    @csrf
  <fieldset>
    
    <div class="form-group">
      <label for="exampleInputtitle1">Enter Title</label>
      <input type="text" class="form-control" id="exampleInputtitle1" placeholder="Enter Title" name="title" value="{{$post->title}}">
    </div>

    <div class="form-group">
      <label for="exampleInputAuthor1">Author</label>
      <input type="text" class="form-control" id="exampleInputAuthor1" placeholder="Author" name="author" value="{{$post->author}}">
    </div>
    <div class="form-group">
      <label for="exampleSelect1">Select Category</label>
      <select class="form-control" id="exampleSelect1" name="category_id">
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>
   
    <div class="form-group">
      <label for="exampleTextarea">Description</label>
      <textarea class="form-control" id="exampleTextarea" rows="3" name="description" >{{$post->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="exampleInputFile">File input</label>
      <input type="file"  class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
      <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
    </div>
    
    
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>

@endsection