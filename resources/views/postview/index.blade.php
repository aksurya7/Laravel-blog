@extends('postview.main')

@section('postcontent')

<a href="/post/create" class="btn btn-outline-primary">Create New Post</a>
<a href="/category/create" class="btn btn-outline-primary">create New Category </a>

@foreach($posts->all() as $post)
<div class="post-preview">
          <a href="{{ route ('fullpost', [$post->id, Str::slug($post->title, '-')]) }}" >
            <h2 class="post-title">
                {{-- Man must explore, and this is exploration at its greatest --}}
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{substr("$post->description", 0,50)}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">{{$post->author}}</a>
            on {{$post->created_at}}</p>
        </div>
        @endforeach

@endsection