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
    <?php $i=0;?>
    @foreach($medicaldetail as $key => $item)
      {{ ++$i }}
      {{ $item->descrption }}
        
        {!! Form::close() !!}
       @endforeach
        
  </tr>
  </table>
</div>
</div>       

</div>

@endsection
