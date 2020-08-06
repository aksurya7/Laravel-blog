@extends('admin.main')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Categories Table  Page</h1>

<a href="create" class="btn btn-outline-primary" >Create New Category</a>
<a href="show" class="btn btn-outline-primary">Show All Category Page</a>

<hr>

@if( Session::has('cu'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert"> X </button>
            <strong>{{session('cu')}}</strong>
        </div>
        <hr>
    @endif


    @if( Session::has('cuf'))
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert"> X </button>
            <strong>{{session('cuf')}}</strong>
        </div>
        <hr>
    @endif

    @if( Session::has('dc'))
        <div class="alert alert-danger">
            <button class="close" data-dismiss="alert">X</button>
            <strong>{{session('dc')}}</strong>
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
      <th class="th-sm">Name</th>
      {{-- <th class="th-sm">ID</th> --}}
      <th class="th-sm">Create Time</th>
      <th class="th-sm">Update Time</th>
      <th class="th-sm">Edit</th>
      <th class="th-sm">Delete

      </th>
    </tr>
  </thead>
  <tbody>
    
     @foreach( $categories->all() as $category)
    <tr>
      <td></td>
      <td>{{ $category->name }}</td>
      {{-- <td>{{ $category->id }}</td> --}}
      <td>{{ $category->created_at }}</td>
      <td>{{ $category->updated_at }}</td>
      <td><a href="{{route('category.edit', $category->id)}}" class="btn btn-outline-success">Edit</a></td>
      <td><form action="{{route('category.destroy',$category->id)}}" method="post">
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
      <th>Name</th>
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