{{-- @extends('layouts.app') --}}
@extends('layouts.homeLayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> Doctor Profile</div>
                <div class="panel-body">

				

				@if (Auth::check())
				user logged in 
				@else
				not
				@endif
    			

                <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="edit_pro_btn">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection