  <header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->

      @php
      $miniLogo = substr(config('app.name', 'Laravel'), 0,3);
      @endphp
      <!-- logo for regular state and mobile devices -->
      <span class="logo-mini">
        <b>{{$miniLogo}}</b>
      </span>
     <b> {{ substr(config('app.name', 'Laravel'),0,5) }}</b>{{ substr(config('app.name', 'Laravel'),5,4) }}
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}&color=7F9CF5&background=EBF4FF" class="user-image" alt="User Image">

                <span class="hidden-xs">{{auth()->user()->name}}</span>
                &nbsp;
                {{-- {{$title ?? ""}} --}}

              </a>
            </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>

            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
