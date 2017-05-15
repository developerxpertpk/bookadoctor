@extends('layouts.doctorLayout')
@section('content')
<div class="container">
    <div class="row">
        
        <div class="panel panel-default">
            <div class="panel-heading"><span class="heading-pannel"> Edit Your Profile</span></div>
            <!-- style -->
            <style>
            .btn a {
            color: #dff0d8;
            text-decoration: none;
            float:right;
            }
            .width_100{
            float:left;
            width:100%;
            }
            .profilepic{
            float: left;
            width: 100%;
            height: 200px;
            width: 193px;
            border-radius: 100%;
            border: 1px solid #000;
            padding:4px;
            
            }
            
            .link_b a{
            float:right;
            }
            .change-pwd{
            margin-top: 15px;
            }
            .edit{
            padding-bottom: 15px;
            }
            
            
            </style>
            <!-- end style -->
            
            <div class="panel-body">
                <div class="col-md-4">
                    
                    
                    <input id="role" type="hidden" class="form-control" name="role" value="2" required autofocus>
                    <div class="col-md-4">
                        <img class="profilepic" src="/images/profile_pic/{{Auth::user()->is_Profile->images}}">
                    </div>
                </div>
                
                
                <div class=" col-md-6 ">
                    {{ Form::open(['method' => 'POST', 'route' => ['Doctor.image'] ,'files' => 'true' , 'class' => 'form-horizontal']   )}} 
                    {{ csrf_field() }}
                  
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">First-Name:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="fname" name="first_name" value="{{Auth::User()->is_Profile->first_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Last-Name:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="lname" name="last_name" value="{{Auth::User()->is_Profile->last_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Email:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="email" name="email" value="{{Auth::User()->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email"> Date of Birth:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="datepicker" name="dob" value="{{Auth::User()->is_Profile->dob}}">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email"> Address:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="address" name="address" value="{{Auth::User()->is_Profile->address}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email"> City:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="city" name="city" value="{{Auth::User()->is_Profile->city}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">State :</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="state" name="state" value="{{Auth::User()->is_Profile->state}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Country:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="country" name="country" value="{{Auth::User()->is_Profile->country}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Pincode:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="pincode" name="pincode" value="{{Auth::User()->is_Profile->pincode}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Phone Number:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="contactno" name="contactno" value="{{Auth::User()->is_Profile->contact_no}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="email">Gender:</label>
                            <div class="col-md-8">
                                @if( Auth::User()->is_Profile->gender == 'Male')
                                <input type="radio" name="gender" id="optionsRadios1" value="Male" checked>Male
                                <input type="radio" name="gender" id="optionsRadios1" value="Female" >Female
                                
                                @else
                                <input type="radio" name="gender" id="optionsRadios1" value="Male">Male
                                <input type="radio" name="gender" id="optionsRadios1" value="Female" checked>Female
                                
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" for="exampleInputFile">Image Upload</label>
                             <div class="col-md-8">
                            <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="pic" value="{{Auth::User()->is_Profile->images}}">
                           </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-md-4" for="exampleInputFile"></label>
                             <div class="col-md-8">
                            {{Form::submit('Update')}}
                           </div>
                        </div>
                    


                  {{Form::close()}}
                 </div>
        
        
        
    </div>
</div>

</div>
</div>
@endsection