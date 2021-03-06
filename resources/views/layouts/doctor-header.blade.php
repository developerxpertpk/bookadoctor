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
                            <li><a href="{{ route('login') }}">About Us</a></li>
                            <li><a href="{{ route('login') }}">Contact Us</a></li>
                            <li>
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">Register</a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('patient.regester')}}"><i class="fa fa-user" aria-hidden="true"></i> Patient</a></li>
                                    <li><a href="{{ route('medical.center.regester')}}"><i class="fa fa-user" aria-hidden="true"></i> Medical enter</a></li>
                                </ul>
                            </li>
                            <li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
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
                            
                                <li> <img id="profile_avatar" src="{{ asset('images/profile_pic') }}/{{Auth::user()->is_Profile->images}}"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->is_Profile->first_name }}&nbsp;{{ Auth::user()->is_Profile->last_name }}  <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{route('doctor.profile')}}"><i class="fa fa-fw fa-user"></i>Show Profile</a></li>

                                        <li>
                                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                                        </li>
                                        
                                        <li class="divider"></li>
                                        {{--<li>--}}
                                        {{--{{ Auth::user()->email }}--}}
                                        {{--</li>--}}
                                       <li> <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                            {{-- <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a> --}}</li>
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
{{--</div>--}}