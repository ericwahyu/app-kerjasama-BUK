<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <title>@yield('title')</title>
      <link rel="icon" type="image/x-icon" href="{{ asset('assets/Universitas Dr. Soetomo.png') }}">
      <meta name="google-site-verification" content="mtDAZgvHjB1ZXJc6OooM_FWGw6F0ExHLYrezfayUeho" />

      <!-- General CSS Files -->
      {{--
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> --}}
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

      <!-- CSS Libraries -->
      <link rel="stylesheet" href="{{ asset('assets/modules/prism/prism.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/select2/dist/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/datatables.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/modules/ionicons/css/ionicons.min.css') }}">

      {{-- Summernote --}}
      <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">

      <!-- Template CSS -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

      <style type="text/css">
        .table-select {
          max-height:300px;
        }
      </style>
      <!-- Start GA -->
      {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
      </script> --}}
      <script async src="{{ asset('https://www.googletagmanager.com/gtag/js?id=UA-94034622-3') }}"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-94034622-3');
      </script>
  </head>

  <body>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
            <div class="search-element">
              <h5 style="margin-top: 12px; color: white">BUK (Badan Usaha Kerjasama)</h5>
            </div>
          </form>
          <ul class="navbar-nav navbar-right">
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle" id="lonceng"><i class="far fa-bell"></i></a>
                  <div class="dropdown-menu dropdown-list dropdown-menu-right">
                      <div class="dropdown-header">Notifications
                      </div>
                      <div class="dropdown-list-content dropdown-list-icons" id="notifikasi">
                      </div>
                  </div>
              </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
                </form>
              </div>
            </li>
          </ul>

        </nav>
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              {{-- <div class="login-brand" >
              </div> --}}
              <img src="{{ asset('assets/Universitas Dr. Soetomo.png') }}" alt="logo" width="30" class="shadow-light">
              <a href="#" style="font-size: 12px">Universitas Dr. Soetomo</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="#">UDS</a>
            </div>
            <ul class="sidebar-menu">
                <li class="menu-header">Menu</li>
                <li class="{{ request()->is('auth/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-chart-bar"></i><span>Dashboard</span></a></li>
                @if (Auth::user()->hasAnyRole('admin'))
                    <li class="{{ request()->is('auth/data-master-user*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.master.user') }}"><i class="fas fa-user-cog"></i><span>Data Master User</span></a></li>
                @endif
                <li class="dropdown {{ request()->is('auth/document/*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Data Dokumen</span></a>
                    <ul class="dropdown-menu">
                        <li class="{{ ($menu == '1') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('index.document', 1) }}">MOA</a></li>
                        <li class="{{ ($menu == '2') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('index.document', 2) }}">MOU</a></li>
                        <li class="{{ ($menu == '3') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.document', 3) }}">IA</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('auth/document-filter*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('filter.document') }}"><i class="fas fa-folder-open"></i><span>Filter Dokumen</span></a></li>
                <li class="{{ request()->is('auth/partner*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('index.partner') }}"><i class="fas fa-users"></i><span>Mitra Kerja</span></a></li>
            </ul>
        </aside>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            @yield('section')
          {{-- <section class="section">
            <div class="section-header">

            </div>

            <div class="section-body">
            </div>
          </section> --}}
        </div>
        <!-- Button trigger modal -->

        {{-- <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div>
          <div class="footer-right">

          </div>
        </footer> --}}
        @yield('modal')
      </div>
    </div>

    @yield('script')


    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('assets/modules/prism/prism.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-ion-icons.js') }}"></script>
    <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            let form =  $(this).closest("form");
            let name = $(this).data("name");
            event.preventDefault();
            swal({
                title: 'Apakah anda yakin akan menghapus data ini !! ',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                form.submit();
                }
            });
        });
        $(document).ready(function(){
            $.ajax({
                type:"GET",
                url:"{{ route('index.notification') }}",
                data: {},
                dataType: 'JSON',
                success:function(response){
                    // console.log(response);
                    $('#notifikasi').html(response.data_notifikasi);

                    if(response.data_readAt == 0){
                        $('#lonceng').addClass("nav-link-lg beep");
                    }else{
                        $('#lonceng').removeClass("nav-link-lg beep");
                    }
                }
            });
        });
    </script>
  </body>
</html>
