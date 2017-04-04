@extends('layouts.adminLayout')
@section('content')
<div class="row">
<div class="col-md-2 col-md-push-10">
<a href="{{ route('cms.create') }}" class="btn btn-info btn-outline-danger">Add Pages</a>
</div>
</div>
<div id="admin-content">
               @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    </div>
<div class="show-admin">
  <table class="table table-bordered">
      <tr class="tr-head">
          <th>No</th>
          <th>Page Title</th>
          <th>Page Slug</th>
          <th>Page Body</th>
          <th>Page Status</th>
          <th width="206px">Action</th>
      </tr>
    <?php $i=0;?>
    @foreach ($pagelist as $key => $item)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $item->title }}</td>
      <td>{{ $item->slug }}</td>
      <td>{{ $item->body }}</td>
      <td>{{ $item->status }}</td>
       <td>
       @if($item->status=="Inactive")
          <a class="btn btn-info" href="{{ route('cms.status',$item->id) }}">Activate</a>
        @else
         <a class="btn btn-info" href="{{ route('cms.status',$item->id) }}">Deactivate</a>
         @endif
          <a class="btn btn-primary" href="{{ route('cms.edit',$item->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['cms.destroy', $item->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        </td>

        
        {!! Form::close() !!}
       @endforeach
        
  </tr>
  </table>
</div>
</div>       

</div>
@endsection