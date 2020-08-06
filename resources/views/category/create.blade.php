@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Create Category Page</h1>

<a href="create" class="btn btn-outline-primary">Create New Category</a>
<a href="show" class="btn btn-outline-primary">Show All Category Page</a>
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


<form method="post" action="{{ route('category.store')}}">
    @csrf
    <div class="py-3 px-5">
        
        <lable class="col-form-label text-success">Enter Category Nane</lable>
        <input type="text" name="name">
        <input type="submit" class="btn btn-outline-secondary" >
    </div>
    
</form>

@endsection