
@extends('layouts.doctorLayout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"> Doctor Profile</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ route('Doctor.show.profile') }}">
						{{ csrf_field() }}

						 <!-- {{Auth::user()->is_Doctor->fname }}
                            <?php 
                            	//die('fdfdfdfdfdfdffd');
                             ?>
 -->
						<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                           
                                <div class="col-md-6">
                          
                                <input id="firstname" type="text" class="form-control" name="first_name" value="{{ Auth::user()->is_Doctor->first_name }}" required autofocus>
                               
                            </div>
                        </div>

						<div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="last_name" value="{{ Auth::user()->is_Doctor->last_name }}" required autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="status" value="{{ Auth::user()->is_Doctor->status }}" required autofocus>
                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('speciality') ? ' has-error' : '' }}">
                            
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="speciality" value="{{ Auth::user()->is_Doctor->speciality }}" required autofocus>
                                
                            </div>
                        </div>

                       	<div class="col-md-6">
                       		<input type="file" id="exampleInputFile" name="profile">
                       	</div>				
						
						</table>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="edit_pro_btn">
								Done
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