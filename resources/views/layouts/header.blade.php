<header id="header">
<div class="container">
  <div class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
<div class="logo">
  {{-- {{ route('products.index') }} --}}
      <a class="" href="{{ route('home1.home1') }}"><img src="{{ asset('images/logo.png') }}"></a>
</div>
  </div>

  <div class="col-md-9 col-sm-9 col-lg-9 col-xs-12">
    <div class="top-navigation">
      <div class="navbar custom-navi">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>

          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">


            <!-- Authentication Links -->
            @if (Auth::guest())
            @if(isset($page))

              @foreach($page as $tabs)
                <li><a href="{{ $tabs->slug }}"> {{ $tabs->title }}</a></li>
                @endforeach
              @else
                <li><a href="{{ route('login') }}">About Us</a></li>
                <li><a href="{{ route('login') }}">Contact Us</a></li> 
                @endif
                <li>
                  <a href="" class="dropdown-toggle" data-toggle="dropdown">Regester</a>
                  <ul class="dropdown-menu">
                    <li><a href=""  data-toggle="modal" data-target="#patientregestration"><i class="fa fa-user" aria-hidden="true"></i> Patient</a></li>
                    {{--<li><a href="{{ route('medical.center.regester')}}"><i class="fa fa-user" aria-hidden="true"></i> Medical enter</a></li>--}}
                    <li><a href=""  data-toggle="modal" data-target="#medicalregestration"><i class="fa fa-user" aria-hidden="true"></i> Medical enter</a></li>
                  </ul>
                </li>
                <li>
                    <li><a href="" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                <li>

              <li>

                      <!-- Modal -->
                      <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <div class="user"><span class="user-icon text-center"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                      {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                                      
                                      {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                          {{ csrf_field() }}

                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                              <div class="col-md-6">
                                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="col-md-4 control-label">Password</label>

                                              <div class="col-md-6">
                                                  <input id="password" type="password" class="form-control" name="password" required>

                                                  @if ($errors->has('password'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>
                                          {{-- <div class="form-group">
                                              <div class="col-md-6 col-md-offset-4">
                                                  <div class="checkbox">
                                                      <label>
                                                        <b>Login As :</b></br>
                                                        <input checked="checked" name="role" type="radio" value="1"> Patient</br>
                                                        <input  name="role" type="radio" value="2"> Doctor</br>
                                                        <input  name="role" type="radio" value="3"> Medical Center</br>
                                                      </label>
                                                  </div>
                                              </div>
                                          </div> --}}

                                          <div class="form-group">
                                              <div class="col-md-6 col-md-offset-4">
                                                  <div class="checkbox">
                                                      <label>
                                                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                      </label>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="modal-footer">
                                                  <div class="col-md-8 col-md-offset-4">
                                                      <button type="submit" class="edit_pro_btn">
                                                          Login
                                                      </button>

                                                      <a class="btn btn-link" href="{{ route('password.request') }}">
                                                          Forgot Your Password?
                                                      </a>
                                                  </div>
                                              </div>

                                          </div>
                                      </form>
                                  </div>

                              </div>
                          </div>
                      </div>
{{--medical regestration form modal--}}
                      <div class="modal fade" id="patientregestration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <div class="user"><span class="user-icon text-center"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                      {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}

                                      {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                                  </div>
                                  <div class="modal-body">
                                      <form class="form-horizontal" role="form" method="POST" action="{{ route('patient.regester.submit') }}">
                                          {{ csrf_field() }}
                                          <input id="role" type="hidden" class="form-control" name="role" value="4" required autofocus>
                                          <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                              <label for="name" class="col-md-4 control-label">First Name</label>

                                              <div class="col-md-6">
                                                  <input id="firstname" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                                  @if ($errors->has('first_name'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                              <label for="username" class="col-md-4 control-label">Last Name</label>

                                              <div class="col-md-6">
                                                  <input id="lastname" type="text" class="form-control" name="last_name" value="{{ old('username') }}" required autofocus>

                                                  @if ($errors->has('last_name'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                              <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                              <div class="col-md-6">
                                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                  @if ($errors->has('email'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                              <label for="password" class="col-md-4 control-label">Password</label>

                                              <div class="col-md-6">
                                                  <input id="password" type="password" class="form-control" name="password" required>

                                                  @if ($errors->has('password'))
                                                      <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                  @endif
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                              <div class="col-md-6">
                                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                              </div>
                                          </div>

                                          <div class="form-group">
                                              <div class="col-md-6 col-md-offset-4">
                                                  <button type="submit" class="edit_pro_btn">
                                                      Register
                                                  </button>
                                              </div>
                                          </div>
                                      </form>

                                  </div>

                              </div>
                          </div>
                      </div>


                    {{--patient registeration form--}}
                    <div class="modal fade" id="medicalregestration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="user"><span class="user-icon text-center"><i class="fa fa-user" aria-hidden="true"></i></span></div>
                                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}

                                    {{--<h4 class="modal-title" id="myModalLabel">Modal title</h4>--}}
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('patient.regester.submit') }}">
                                        {{ csrf_field() }}
                                        <input id="role" type="hidden" class="form-control" name="role" value="2" required autofocus>
                                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label"> First Name</label>

                                            <div class="col-md-6">
                                                <input id="firstname" type="text" class="form-control" name="first_name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                            <label for="username" class="col-md-4 control-label">Last Name</label>

                                            <div class="col-md-6">
                                                <input id="lastname" type="text" class="form-control" name="last_name" value="{{ old('username') }}" required autofocus>

                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="edit_pro_btn">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                  </li>


                <li>
                  <form action="/search" method="POST" role="search" id="search">
      {{ csrf_field() }}
      <div class="input-group search">
          <input type="text" class="form-control home-search" name="search" placeholder="Search users"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                  <span class="fa fa-search"></span>
              </button>
          </span>
      </div>
  </form>
                </li>


            @else
                {{-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <?
                    die('aaaaaaa');
                    ?>
                        {{ Auth::user()->first_name }} <span class="caret"></span>
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
<li> <img id="profile_avatar" src="http://drbooking/images/profile_pic/"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ 
                     Auth::user()->first_name }}&nbsp;{{ Auth::user()->last_name }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/profile"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
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




            {{-- <li><a href="{{URL::to('/signin')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </a></li>
            <li><a href="{{URL::to('/regester')}}"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li> --}}
          </ul>
      </div>
      </nav>
    </div>
  </div>

</div>
</header>
{{--<div class="mar-t-55">--}}

{{--</div>--}}
