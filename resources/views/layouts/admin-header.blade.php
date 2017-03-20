<header id="header">
<div class="admin-headder">
  <div class="col-md-2 col-sm-2 col-xs-6 col-lg-2">
<div class="logo">
  {{-- {{ route('products.index') }} --}}
      <a class="" href="{{ route('home1.home1') }}"><img src="{{ asset('images/logo.png') }}"></a>
</div>
  </div>

  <div class="col-md-10 col-sm-10 col-lg-10 col-xs-6">
    <div class="top-navigation">
      <nav class="navbar custom-navi">
          <ul class="nav navbar-nav">


            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-user" aria-hidden="true"></i> Sign Up</a></li>
                <li><a href=""><i class="fa fa-user-md" aria-hidden="true"></i> For Doctors</a></li>
                <li><a href=""><i class="fa fa-medkit" aria-hidden="true"></i>Health Feed</a></li>
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

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  {{ Auth::user()->name }}  <b class="caret"></b></a>
                    <ul class="dropdown-menu custom-dropdown">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
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
      </nav>
    </div>
  </div>

</div>
</header>
<div class="mar-t-55">

</div>
