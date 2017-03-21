@extends('layouts.adminLayout')
@section('content')
<div id="admin-content">
         {!! Form::open(['route' => 'admin.add.submit','class' => 'add-admin-form','method'=>'POST','files'=> true]) !!}
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
          <th>Medical Center Name</th>
          <th>Medical Center Email</th>
          <th>Medical Center Username</th>
          <th>Working Hours</th>
          <th width="206px">Action</th>
      </tr>
    <?php $i=0;?>
    @foreach ($medicallist as $key => $item)
    <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $item->title }}</td>
      <td>{{ $item->medical_center_email }}</td>
      <td>{{ $item->medical_center_info }}</td>
      <td>{{ $item->working_hours }}</td>
       <td>
          <a class="btn btn-info" href="{{ route('medical.show',$item->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('admin.edit',$item->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy', $item->id],'style'=>'display:inline']) !!}
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
