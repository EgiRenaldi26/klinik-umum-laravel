<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
      />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>ER MEDICAL | {{ $title }}</title>
      <!-- loader-->
      <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
      <script src="{{ asset('assets/js/pace.min.js')}}"></script>
      <!--favicon-->
      <link rel="icon" href="{{ asset('assets/images/klinik_icon.png')}}" type="image/x-icon" />
      <!-- Vector CSS -->
      <link
        href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}"
        rel="stylesheet"
      />
      <!-- simplebar CSS-->
      <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
      <!-- Bootstrap core CSS-->
      <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
      <!-- animate CSS-->
      <link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css" />
      <!-- Icons CSS-->
      <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" type="text/css" />
      <!-- Sidebar CSS-->
      <link href="{{ asset('assets/css/sidebar-menu.css')}}" rel="stylesheet" />
      <!-- Custom Style-->
      <link href="{{ asset('assets/css/app-style.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" class="href">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <style>
        .footer {
          position: fixed;
          bottom: 0;
          width: 100%;
          padding: 20px 0;
          z-index: 1000; /* Pastikan z-index lebih tinggi daripada elemen lain di halaman */
      }
      </style>
    </head>

    <body class="bg-theme bg-theme2">
      <!-- Start wrapper-->
      <div id="wrapper">
        <!--Start sidebar-wrapper-->
        <div
          id="sidebar-wrapper"
          data-simplebar=""
          data-simplebar-auto-hide="true"
        >
          <div class="brand-logo">
            <a href="index.html">
              <img
                src="{{ asset('assets/images/klinik_icon.png')}}"
                class="logo-icon"
                alt="logo icon"
              />
              <h5 class="logo-text">ER Medical</h5>
            </a>
          </div>
          <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MAIN NAVIGATION</li>
            <li>
              <a href="{{ url('dashboard')}}">
                <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            {{-- DATA PASIEN --}}
            @if (Auth::user()->role == 'dokter')
            <li>
              <a href="{{ url('/pasien')}}">
                <i class="zmdi zmdi-account-circle"></i> <span>Data Pasien</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/pasien')}}">
                <i class="zmdi zmdi-account-circle"></i> <span>Data Pasien</span>
              </a>
            </li>
            @endif
            {{-- DATA PASIEN END--}}

            {{-- DATA OBAT --}}
            @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/obat')}}">
                <i class="zmdi zmdi-local-pharmacy"></i> <span>Data Obat</span>
              </a>
            </li>
            @endif

            @if (Auth::user()->role == 'farmasi')
            <li>
              <a href="{{ url('/obat')}}">
                <i class="zmdi zmdi-local-pharmacy"></i> <span>Data Obat</span>
              </a>
            </li>
            @endif

            {{-- DATA OBAT END --}}
            @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/user')}}">
                <i class="zmdi zmdi-account-box"></i> <span>Users</span>
              </a>
            </li>
            @endif

            {{-- TRANSAKSI --}}
            @if (Auth::user()->role == 'kasir')
            <li>
              <a href="{{ url('/transaksi')}}">
                <i class="fas fa-usd"></i> <span>Transaksi</span>
              </a>
            </li>
            @endif
            
            @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/transaksi')}}">
                <i class="fas fa-usd"></i> <span>Transaksi</span>
              </a>
            </li>
            @endif
            {{-- TRANSAKSI END --}}

            {{-- RAWAT --}}
            @if (Auth::user()->role == 'admin')
            <li>
              <a href="{{ url('/rawat')}}">
                <i class="fa fa-bed"></i> <span>Rawat</span>
              </a>
            </li>
            @endif
            {{-- RAWAT END --}}
            <li>
              <a href="{{ route('log.index')}}">
                <i class="zmdi zmdi-file-text"></i> <span>Log</span>
              </a>
            </li>
            <li>
              <a href="{{ url('/informasi')}}">
                <i class="fa fa-info-circle"></i> <span>Informasi</span>
              </a>
            </li>

          </ul>
        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
          <nav class="navbar navbar-expand fixed-top">
            <ul class="navbar-nav mr-auto align-items-center">
              <li class="nav-item">
                <a class="nav-link toggle-menu" href="javascript:void();">
                  <i class="icon-menu menu-icon"></i>
                </a>
              </li>
          </ul>
          <ul class="navbar-nav align-items-center right-nav-link">
                <h6>Hi, {{ Auth::user()->username}} - {{ Auth::user()->role}}</h6>
              
              <li class="nav-item">
                <a
                  class="nav-link dropdown-toggle dropdown-toggle-nocaret"
                  data-toggle="dropdown"
                  href="#"
                >
                  <span class="user-profile"
                    >
                    <img
                      src="https://cdn-icons-png.flaticon.com/512/727/727399.png"
                      class="img-circle"
                      alt="user avatar"
                  /></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li class="dropdown-item user-details">
                    <a href="javaScript:void();">
                      <div class="media">
                        <div class="avatar">
                          <img
                            class="align-self-start mr-3"
                            src="https://cdn-icons-png.flaticon.com/512/727/727399.png"
                            alt="user avatar"
                          />
                        </div>
                        <div class="media-body">
                          <h6 class="mt-2 user-title">{{ Auth::user()->name}}</h6>
                          <p class="user-subtitle">{{ Auth::user()->role}}</p>
                        </div>
                      </div>
                    </a>
                  </li>
                  
                  <li class="dropdown-divider"></li>
                  <li class="dropdown-item">
                      <a href="{{ route('profile.index') }}"><i class="icon-user mr-2"></i> Profile</a>
                  </li>
                  <li class="dropdown-item">
                    <i class="icon-power mr-2"></i><a href="{{ url('/logout')}}">Logout</a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </header>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
          <div class="container-fluid">
            @yield('content')
            <!--start overlay-->
            <div class="overlay toggle-menu"></div>
            <!--end overlay-->
          </div>
          <!-- End container-fluid-->
        </div>
        <!--End content-wrapper-->
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"
          ><i class="fa fa-angle-double-up"></i>
        </a>
        <!--End Back To Top Button-->

         <!--Start footer-->
      <footer class="footer">
        <div class="container">
          <div class="text-center">Copyright © 2023 Egi Renaldi</div>
        </div>
      </footer>
      <!--End footer-->
    <!--End wrapper-->

      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{ asset('assets/js/popper.min.js')}}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

      <!-- simplebar js -->
      <script src="{{ asset('assets/plugins/simplebar/js/simplebar.js')}}"></script>
      <!-- sidebar-menu js -->
      <script src="{{ asset('assets/js/sidebar-menu.js')}}"></script>
      <!-- loader scripts -->
      <script src="{{ asset('assets/js/jquery.loading-indicator.js')}}"></script>
      <!-- Custom scripts -->
      <script src="{{ asset('assets/js/app-script.js')}}"></script>
      <!-- Chart js -->
      <script src="{{ asset('assets/plugins/Chart.js/Chart.min.js')}}"></script>

      <!-- Index js -->
      <script src="{{ asset('assets/js/index.js')}}"></script>
      
    <!-- Include jQuery once -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <!-- Include DataTables and FixedColumns scripts -->
  <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>

  <script type="text/javascript">
      $(document).ready(function () {
          let table = $('#myTable').DataTable({
              "paging": true,
              "searching": true,
              "ordering": true,
          });

          // Initialize FixedColumns
          new $.fn.dataTable.FixedColumns(table, {
              leftColumns: 1, // Number of columns to be fixed on the left
              heightMatch: 'auto' // Auto adjust the height of the fixed columns
          });
      });
  </script>

    </body>
  </html>