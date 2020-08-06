@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Update Category Page</h1>

<a href="create" class="btn btn-outline-primary">Create New Category</a>
<a href="show" class="btn btn-outline-primary">Show All Category Page</a>
<hr>

    

<form method="post" action="{{route('category.update', $category->id)}}">
    @method('PATCH')
    @csrf
    <div class="py-3 px-5">
        
        <lable class="col-form-label text-success">Upadte Category Nane</lable>
        <input type="text" name="name" value="{{$category->name}}">
        <input type="submit" class="btn btn-outline-secondary" value="Update"> <a href="/category/show" >Go Back</a>
    </div>
    
</form>

@endsection