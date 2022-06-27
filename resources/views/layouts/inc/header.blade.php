<nav class="bg-custom main-header navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
    <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    </ul>

    <ul class="navbar-nav ml-auto">        
		<li class="dropdown user user-menu open">
            <a href="#" id="user-name-hover" class="text-decoration-none" data-toggle="dropdown" aria-expanded="true">
              <img src="{{asset('images/profile.jpg')}}" class="user-image" alt="User Image">
              <span class="hidden-xs text-white" style="font-size:19px;">
                @if(Session::has('LoggedUserId'))
                @php
                $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
                @endphp
                {{$user->name}}
                @endif
              </span>
            </a>
            <ul class="dropdown-menu" id="user-logout">
              <!-- User image -->
              <li class="user-header" id="user-logout-Li">
                <img src="{{asset('images/profile.jpg')}}" class="img-circle" alt="User Image" id="user-logout-img">
                <p class="text-white" style="font-size:20px;">
                    @if(Session::has('LoggedUserId'))
                    @php
                    $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
                    @endphp
                    {{$user->name}}
                    @endif
                <small class="text-white" style="font-size:17px;" >Member since Mar. 2022</small> 
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right cutom-hover">
                <a href="{{url('user/logout')}}"  class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>


        {{-- <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" 
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:0;">
                @if(Session::has('LoggedUserId'))
                @php
                $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
                @endphp
                {{$user->name}}
                @endif
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-divider"></div>
             <a href="{{url('user/logout')}}" class="btn btn-white ml-5 text-dark" >Logout</a>
            </div>
          </div> --}}

    </ul>
    </nav> 