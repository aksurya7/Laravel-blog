@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">All Post</h1>

<a href="create" class="btn btn-outline-primary" >Create New Post</a>
<a href="show" class="btn btn-outline-primary">Show All Post</a>

<hr>

@if( Session::has('pc'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"> X </button>
            <strong>{{session('pc')}}</strong>
        </div>
        <hr>
    @endif


    @if( Session::has('puf'))
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert"> X </button>
            <strong>{{session('puf')}}</strong>
        </div>
        <hr>
    @endif

    @if( Session::has('pd'))
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            <strong>{{session('pd')}}</strong>
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endif


<style type="text/css" media="screen">
    body
{
    counter-reset: Count-Value;     
}
table
{
    border-collapse: separate;
}
tr td:first-child:before
{
  counter-increment: Count-Value;   
  content:  counter(Count-Value);
}
</style>
<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
        <th class="th-sm">#

      </th>
      <th class="th-sm">Title</th>
      <th class="th-sm">Author</th>
      <th class="th-sm">Category_id</th>
      <th class="th-sm">Descriptions</th>
      <th class="th-sm">Image</th>

      {{-- <th class="th-sm">ID</th> --}}
      <th class="th-sm">Create Time</th>
      <th class="th-sm">Update Time</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete

      </th>
    </tr>
  </thead>
  <tbody>
    
     @foreach( $posts->all() as $post)
    <tr>
      <td></td>
      <td>{{ $post->title }}</td>
      <td>{{ $post->author }}</td>
      <td>{{ $post->category_id }}</td>
      <td>{{ $post->description }}</td>
      <td><a href="{{"/img/$post->image"}}"><img src="{{asset("img/$post->image")}}" alt="image" height="100px"></a></td>
      {{-- <td>{{ $post->id }}</td> --}}
      <td>{{ $post->created_at }}</td>
      <td>{{ $post->updated_at }}</td>
      <td><a href="{{route('post.edit', $post->id)}}" class="btn btn-outline-success">Edit</a></td>
      <td><form action="{{route('post.destroy',$post->id)}}" method="post">
          @method('DELETE')
          @csrf
          <input type="submit" name="" value="Delete" class="btn btn-outline-danger"></td>
      </form>
    </tr>
      @endforeach



  </tbody>
  <tfoot>
    <tr>
        <th>#</th>
      <th>Title</th>
      <th>Author</th>
      <th>Category_id</th>
      <th>Descriptions</th>
      <th>Image</th>
      {{-- <th>ID</th> --}}
      <th>Create Time</th>
      <th>Update Time</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </tfoot>
</table>
<script>
   // Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "pagingType": "simple" // "simple" option for 'Previous' and 'Next' buttons only
  });
  $('.dataTables_length').addClass('bs-select');
});

</script>


@endsection