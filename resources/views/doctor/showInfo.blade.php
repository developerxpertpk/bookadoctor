{{-- @extends('layouts.app') --}}
@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.show.profile') }}">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="first_name" value="{{ $details -> fname }}" required autofocus>
                               
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="last_name" value="{{$details->lname }}" required autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="status" value="{{$details->status}}" required autofocus>
                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('speciality') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="speciality" value="{{$details->speciality}}" required autofocus>
                                
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{$details->email}}" required>
                                
                            </div>
                        </div>
						
						
						</table>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="edit_pro_btn">
								Edit
								</button>
							</div>
						</div>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection