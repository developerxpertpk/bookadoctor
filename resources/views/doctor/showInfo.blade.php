{{-- @extends('layouts.app') --}}
@extends('layouts.default')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Doctor Profile</div>
                <div class="panel-body">

                <form class="form-horizontal" role="form" method="POST" action="{{ route('doctor.dashboard') }}">
                        {{ csrf_field() }}
                
            
                
</div>
</div>
</div>
</div>
</div>
@endsection