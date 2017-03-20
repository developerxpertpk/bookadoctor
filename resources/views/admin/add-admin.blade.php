{{-- @extends('layouts.app') --}}
@extends('layouts.adminLayout')
@section('content')
<div id="admin-content">
         {!! Form::open(['route' => 'admin.add.submit','class' => 'add-admin-form','method'=>'POST','files'=> true]) !!}
               @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<h2 class="text-center">ADD NEW ADMIN</h2>
               <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">

                   <div class="controls">
                       {!! Form::text('name', null, array('placeholder' => 'Your Name','class' => 'form-control')) !!}
                       <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                   </div>
               </div>


               <div class="form-group  {{ $errors->has('email') ? 'has-error' : '' }}">
                   <div class="controls">
                       {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                       <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                   </div>
               </div>
               <div class="form-group  {{ $errors->has('username') ? 'has-error' : '' }}">

                   <div class="controls">
                          {!! Form::text('username', null, array('placeholder' => 'Username','class' => 'form-control')) !!}
                       <span class="help-block">{{ $errors->first('username', ':message') }}</span>
                   </div>
               </div>
               <div class="form-group  {{ $errors->has('password') ? 'has-error' : '' }}">

                   <div class="controls">
                       {!! Form::password('password', array('placeholder' => 'password','class' => 'form-control')) !!}
                       <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                   </div>
               </div>
               <div class="form-group">
                   <div class="">
                       <button type="submit" class="btn btn-primary">
                           Add Admin
                       </button>
                   </div>
               </div>
               {!! Form::close() !!}
           </div>
<div class="show-admin">
  <table class="table table-bordered">
      <tr class="tr-head">
          <th>No</th>
          <th>Admin Name</th>
          <th>Admin Email</th>
          <th>Admin Username</th>
          <th>Admin Password</th>
          <th width="206px">Action</th>
      </tr>
    <?php $i=0;?>
  @foreach ($adminnew as $key => $item)
  <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->email }}</td>
      <td>{{ $item->username }}</td>
      <td>{{ $item->password }}</td>

      <td>
          <a class="btn btn-info" href="{{ route('admin.show',$item->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('admin.edit',$item->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy', $item->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        {{--
        <a class="btn btn-info" href="{{ route('admin.show',$item->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('admin.edit',$item->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.destroy', $item->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}

          <a class="btn btn-info" href="{{ route('products.show',$item->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('products.edit',$item->id) }}">Edit</a>
          {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $item->id],'style'=>'display:inline']) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!} --}}
      </td>
  </tr>
  @endforeach
  </table>

  {{-- {!! $adminnew->render() !!} --}}

        <!-- /.container-fluid -->

</div>

@endsection
