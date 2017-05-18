<header id="header" class="medic-headder">
        <div class="container-fluid navigation">
            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="medical-navigation">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        </a>
                        <a class="navbar-brand" href="{{ route('medical.center.dashboard') }}"><img src="{{ asset('img\logo.png') }}"></a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="{{ route('medical.center.dashboard') }}">Dr.Booking</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right"> @if(isset($page)) @foreach($page as $key)
                            <li class="dropdown"> <a href="{{$key->slug}}">{{$key->title}}</a></li> @endforeach @endif
                           
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
