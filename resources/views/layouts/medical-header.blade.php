<header id="header" class="medic-headder">
        <div class="container-fluid navigation">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="medical-navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </a>
                        <a class="navbar-brand" href="#"><img src="{{ asset('img\logo.png') }}"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Dr.Booking</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right"> @if(isset($page)) @foreach($page as $key)
                            <li class="dropdown"> <a href="{{$key->slug}}">{{$key->title}}</a></li> @endforeach @endif
                            @if (Auth::guest())
                            <li class="dropdown"> <a href="#" data-toggle="modal" data-target="#myModall">Login</a>
                                <div class="modal fade" id="myModall" tabindex="-1" role="dialog" aria-labelledby="myModalLabell">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Login</h4>
                                                <!--<i class="fa fa-address-book" aria-hidden="true"></i>--></div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" action="{{action('Auth\LoginController@login')}}" method="POST">
                                                    <div class="form-group">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputEmail3" placeholder="Email" type="email" name="email"> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="inputPassword3" placeholder="Password" type="password" name="password"> </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> Remember me </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" class="btn btn-primary">Login</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer"> {{--
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}} <a href="#">Forget Password</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-submenu"> <a tabindex="-1" href="#" data-toggle="modal" data-target="#myModal">Medical Center</a></li>
                                        <li class="dropdown-submenu open"> <a tabindex="0" href="#" data-toggle="modal" data-target="#myModal1">Patient</a> </li>
                                        <!-- <ul class="dropdown-menu">
      <li class="dropdown-header">User Name</li>
      <li><a tabindex="0">Sub action</a></li>
      <li class="disabled"><a tabindex="0">Another sub action</a></li>
      <li><a tabindex="0">Something else here</a></li>
    </ul>-->
                             
                        </ul>
                        </li>
                             @else
                                {{-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li> --}}
                                <li> <img id="profile_avatar" src="{{asset('/images/profile_pic/'.Auth::user()->is_Profile->images)}}"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->is_Profile->first_name }}&nbsp;{{ Auth::user()->is_Profile->last_name }}  <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('medical.center.image.gallery')}}"><i class="fa fa-fw fa-user"></i>Show Profile</a></li>


                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                        </li>
                                        <li>
                                            <a href="{{route('medical.center.settings')}}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                                        </li>
                                        <li class="divider"></li>
                                        {{--<li>--}}
                                        {{--{{ Auth::user()->email }}--}}
                                        {{--</li>--}}
                                        <li>

                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            {{-- <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a> --}}
                                        </li>
                                    </ul>
                                </li>
                            @endif


                        <!--  <li> settings
			  <a href="#" <i class="fa fa-cog" aria-hidden="true"></i></a>
					  
			</li>-->
                    </div>
                    </div>
                
        </div>
        </nav>
        </div>
    </header>



{{--</div>--}}
