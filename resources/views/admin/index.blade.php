@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Blog Page</h1>
<table class="table-responsive py-auto" padding="10px">

<tr><th><label>Category  </label></th>
<td><a href="category/create" class="btn btn-outline-primary">Create</a></td>
<td><a href="category/show" class="btn btn-outline-primary">Show</a></td>
</tr>



<tr><th><label>Posts  </label></th>
<td><a href="post/create" class="btn btn-outline-primary">Create</a></td>
<td><a href="post/show" class="btn btn-outline-primary">Show</a></td>
</tr>
<tr>

</table>

@endsection