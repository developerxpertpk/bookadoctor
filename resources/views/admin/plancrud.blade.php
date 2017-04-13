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
          <th width="206px">Action</th>
      </tr>
    <?php $i=0;?>
    @foreach($plan as $key)
    <tr>
      <td>{{$key->id}}</td>
      <td>{{$key->name}}</td>
      <td>{{$key->amount}}</td>
      <td>{{$key->description}}</td>
         <td>
          <a class="btn btn-primary" href="{{ route('plan.edit.show',$key->id) }}">Edit</a>
          <a class="btn btn-danger" href="{{ route('plan.destroy',$key->id) }}">Delete</a>
        </td>
    @endforeach        
  </tr>
  </table>
</div>
</div>       

</div>
@endsection