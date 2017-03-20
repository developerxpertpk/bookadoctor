
@extends('layouts.homeLayout')
@section('content')
    <div class="container">
        <div class="edit-profile">
            <form action="{{route('updateProfile')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-md-12 text-center"><h2 id="title">Change Profile Picture</h2></div>


                <div class="col-md-3"> <img id="profil_picture" src="http://drbooking/images/profile_pic/{{Auth::user()->is_Profile->profilepic}}" alt=""></div>
                <div class="col-md-9">
                    <div class="form-group{{ $errors->has('profilePicture') ? ' has-error' : '' }}">
                        <input type="file" id="profilePicture" class="form-control" name="profilePicture">
                        @if ($errors->has('profilePicture'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('profilePicture') }}</strong>
                                    </span>
                        @endif
                    </div>
                     <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                         <input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name"/>
                    @if ($errors->has('firstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                     </div>
                     <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                         <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last Name"/>
                     @if ($errors->has('lastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                     </div>
                     <div class="form-group{{ $errors->has('aboutMe') ? ' has-error' : '' }}">
                         <textarea name="aboutMe" id="aboutMe" class="form-control" cols="30" rows="6" placeholder="About Me">

                         </textarea>
                     @if ($errors->has('aboutMe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('aboutMe') }}</strong>
                                    </span>
                                @endif
                     </div>
                     <div class="form-group">
                         <button type="submit" id="uploadButton" class="edit_pro_btn" class="btn btn-primary pull-right" >Upload</button>
                         {{--<button href="{{route('profile')}}" type="button" id="uploadButton" class="edit_pro_btn" class="btn btn-primary pull-right" >Back</button>--}}
                     </div>


                </div>





            </form>
            </div>
        </div>
    </div>

@endsection