@extends('main.layout.dashboard_layout')
@section('content')
  <style>
    @media (max-width: 768px) {
      .navbarh{
        margin-left: 33px;
      }
      .navbar-collapse{
        display: contents;
      }
      .navtop{
        /* background-color: white !important; */
      }
    }
  </style>
    <div class="content">
        <div class="content-fluid ">
            <div class="content navbarh">
                

                <nav class="navbar navbar-expand-lg navbar-light bg-light navtop">
                    {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button> --}}
                
                    <div class="navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item active">
                          <a class="nav-link" href="#"><strong>@yield('page')</strong> <span class="sr-only">(current)</span></a>
                        </li>
                      </ul>
                    </div>
                
                    <!-- Login and Register buttons -->
                    <div class="ml-auto">
                        @auth
                          {{-- <strong>{{auth()->user()->name}}</strong> --}}
                        {{-- <button class="btn btn-danger">Logout</button> --}}

                        <form action="{{ route('logout') }}" method="POST">
                          @csrf
                          {{-- <small>{{auth()->user()->name}}</small> --}}
                          <button type="submit" class="btn btn-danger btn-sm">Logout</button>
                      </form>
                        @else
                        <a href="{{route('login')}}">
                            <button class="btn btn-outline-primary mr-2">Login</button>
                        </a>
                      <button class="btn btn-primary">Register</button>
                      @endauth
                    </div>
                  </nav>


            </div>

            <div class="content ">
                @yield('subpanel')
            </div>
        </div>
    </div>
@endsection
