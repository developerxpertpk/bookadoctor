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
@section('content')
    <table class="table table-bordered" id="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Contact Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: { url:'{!! route('admin.datatable.list') !!}',
                method: 'GET',
                cache: false,
                data: function(data) {
                data.token = '{{ csrf_token() }}';
                 },

            },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user_id', name: 'user_id' },
            { data: 'title', name: 'title' },
            { data: 'description', name: 'description' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'address', name: 'address' },
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

    });
});
</script>
@endpush
