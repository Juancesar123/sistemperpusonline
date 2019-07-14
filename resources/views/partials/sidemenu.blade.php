 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{asset('images/user.png')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Administrator</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('homepage') ? 'active' : '' }}">
        <a href="{{route('homepage.index')}}">
          <i class="fa fa-home"></i> <span>Beranda</span>
        </a>
      </li>
      <li class="{{ Request::is('masterdata*') ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('masterdata/klasifikasi') ? 'active' : '' }}"><a href="{{route('klasifikasi.index')}}"><i class="fa fa-circle-o"></i> Klasifikasi</a></li>
          <li class="{{ Request::is('masterdata/buku') ? 'active' : '' }}"><a href="{{route('buku.index')}}"><i class="fa fa-circle-o"></i> Data Buku</a></li>
          <li class="{{ Request::is('masterdata/siswa') ? 'active' : '' }}"><a href="{{route('siswa.index')}}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
        </ul>
      </li>
      <li class="{{ Request::is('transaksi*') ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-exchange"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::is('transaksi/transaksipinjaman') ? 'active' : '' }}"><a href="{{route('transaksi.index')}}"><i class="fa fa-circle-o"></i> Transaksi Pinjaman</a></li>
          <li class="{{ Request::is('transaksi/dendatransaksi') ? 'active' : '' }}"><a href="{{route('denda.index')}}"><i class="fa fa-circle-o"></i> Transaksi Denda</a></li>
        </ul>
      </li>
      <li class="{{ Request::is('reportingtransaksi') ? 'active' : '' }}">
        <a href="{{route('reporting.index')}}">
          <i class="fa fa-area-chart"></i> <span>Reporting Transaksi</span>
          <span class="pull-right-container">
            <small class="label pull-right bg-green">new</small>
          </span>
        </a>
      </li>
      <li class="{{ Request::is('bukutamu') ? 'active' : '' }}">
          <a href="{{route('bukutamu.index')}}">
            <i class="fa fa-book"></i> <span>Buku Tamu</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
    </ul>
  </section>
  <!-- /.sidebar -->