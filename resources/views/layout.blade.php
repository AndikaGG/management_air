<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>RizkyBaru - @yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/shared/gijgo.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('/assets/images/logo.jpg') }}" />

 </head>
  <body>
    @if(Auth::check())
    
    @else
      <script>alert('silakan login!')</script>
    @endif
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo">
              <h1 style="margin-top: 0.5rem;color:white !important">Rizky<strong>Baru</strong> </h1>
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex">
          <div class="col" style="margin-top: 1.2rem">
            <h4>@yield('topnav')</h4>
          </div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
             <a style="color:#1d45ef;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-2x"></i>
              </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a class="nav-link">
                <i class="fa fa-user-circle fa-2x"></i> 
                <div class="text-wrapper">
                  <p class="profile-name" style="margin: 1px 25px 1px;">Halo! {{ Auth::user()->name }}</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/galon">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Transaksi Galon</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/jerigen">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Transaksi Jerigen</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/tanki">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Transaksi Tanki</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/user">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">User</span>
              </a>
            </li>
          </ul>
        </nav>
       
        <div class="main-panel">
          <div style="padding: 2.9rem 1.7rem;" class="content-wrapper">
              <div class="row">


              @section('main-content')
              @show
          <!-- content-wrapper ends -->
          <!-- partial -->
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
    $('.datepickerEdit').datepicker( {
            format: "dd-mm-yyyy"
        });   

  
     
    </script>

    <script>
        $('#datepicker1').datepicker( {
            format: "mm-yyyy",
            setDate: "today"
        });
    </script>

    <script>
        $('#datepickerCreate').datepicker( {
            format: "dd-mm-yyyy",
            setDate: "today"
        });
    </script>

    <script>
      $(document).ready(function(){
        $('.toast').toast({ delay: 2000 });
        $('.toast').toast('show');
      });
    </script>

    <script src="{{ asset('/assets/js/shared/bootstrap-input-spinner.js') }}"></script>
    <script>
      $("input[name='qty']").inputSpinner({
        template: '<div class="input-group ${groupClass}">' +
                '<div class="input-group-prepend bg-primary"><span class="input-group-text bg-transparent"><i class="fa fa-dropbox text-white"></i></span></div>' +
                '<input type="number" style="text-align: ${textAlign}" class="form-control form-control-text-input"/>' +
                '<div class="input-group-append"><button style="min-width: ${buttonsWidth}" class="btn btn-decrement ${buttonsClass} btn-minus" type="button">${decrementButton}</button><button style="min-width: ${buttonsWidth}" class="btn btn-increment ${buttonsClass} btn-plus" type="button">${incrementButton}</button></div>' +
                '</div>'
      })
    </script>

    <script>
      function multiplyCreate() {
            var txtFirstNumberValue = document.getElementById('harga_satuanCreate').value;
            var txtSecondNumberValue = document.getElementById('kuantitasCreate').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
              document.getElementById('totalCreate').value = result;
            }
          }

        function multiplyEdit() {
            var txtFirstNumberValue = document.getElementById('harga_satuanEdit').value;
            var txtSecondNumberValue = document.getElementById('kuantitasEdit').value;
            var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
              document.getElementById('totalEdit').value = result;
            }
          }    
    </script>

    <!-- plugins:js -->
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
  </body>
</html>
