@extends('layouts.adminLayout')
@section('content')
<div class="row">
<div class="col-md-2 col-md-push-10">
<a href="{{ route('plan.create') }}" class="btn btn-info btn-outline-danger">Add Plans</a>
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
          <th>Plan Title</th>
          <th>Plan Cost</th>
          <th>Plan Body</th>
          <th>Plan Status</th>
          <th width="206px">Action</th>
      </tr>
    <?php $i=0;?>
    @foreach($plan as $key)
    <tr>
      <td>{{$key->id}}</td>
      <td>{{$key->name}}</td>
      <td>{{$key->cost}}</td>
      <td>{{$key->details}}</td>
      <td>{{$key->status}}</td>
      <td> @if($key->status=="Inactive")
          <a class="btn btn-info" href="{{ route('cms.status',$key->id) }}">Activate</a>
        @else
         <a class="btn btn-info" href="{{ route('cms.status',$key->id) }}">Deactivate</a>
         @endif
          <a class="btn btn-primary" href="{{ route('plan.edit',$key->id) }}">Edit</a>
        {!! Form::open(['method' => 'DELETE','route' => ['plan.destroy', $key->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        </td>
        {!! Form::close() !!}
    @endforeach
     
         
        
        {!! Form::close() !!}
        
  </tr>
  </table>
</div>
</div>       

</div>
@endsection