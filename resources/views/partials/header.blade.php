<a href="index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>PM</b>L</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Pemalang</b>Ikhlas</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('images/user.png')}}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{Auth::user()->name}}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image">

              <p>
                  {{Auth::user()->name}}
                <small>Member since 2019</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <form action="{{route('logout')}}" method="POST">
                  {{csrf_field()}}
                  <button class="btn btn-default btn-flat" type="submit">Sign out</button>
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>