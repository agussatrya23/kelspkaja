<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Kelurahan Semarapura Kaja, Kecamatan Klungkung, Kabupaten Klungkung">
    <meta name="keywords" content="Administrasi, Semarapura Kaja, Klungkung">
    <meta name="author" content="Semarapura Kaja">
    <title>Semarapura Kaja - @yield('title-head')</title>
    <link rel="icon" href="{{ asset('Lambang_Kabupaten_Klungkung.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css' )}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/monokai-sublime.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/dashboard-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pnotify/pnotify.custom.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    @yield('csspage')

</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center">
                <span class="ml-1 mr-50 d-none d-lg-block">{{(new \App\Helper)->tanggal(date('Y-m-d'))}}</span>
            </ul>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user">
                    <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex">
                            <span class="user-name font-weight-bolder">
                                {{Auth::user()->staf->nama}}
                            </span>
                            <span class="user-status">
                                {{Auth::user()->staf->jabatan->nama}}
                            </span>
                        </div>
                        <span class="avatar">
                            @if (Auth::user()->staf->photo == null)
                                <img src="{{ asset('user-default.jpg') }}" alt="avatar" height="40">
                            @else
                                <img src="{{ asset('upload/'.Auth::user()->staf->photo) }}" alt="avatar" height="40">
                            @endif
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="{{ route('biodata', Auth::user()->staf->id) }}"><i class="mr-50" data-feather="user"></i> Biodata</a>
                        <a class="dropdown-item" href="#modal-password" data-toggle="modal" data-target="#modal-password" data-backdrop="static" class="dropdown-item"><i class="mr-50" data-feather="lock"></i> Ubah Password</a>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }} " class="dropdown-item"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="mr-50" data-feather="power"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header mb-1">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="brand-logo">
                            <img src="{{asset('assets/images/Lambang_Kabupaten_Klungkung.png')}}" height="30" alt="">
                        </span>
                        <h2 class="brand-text nav-title">Kelurahan
                            <span>Semarapura Kaja</span>
                        </h2>

                    </a></li>
                <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                @yield('menu')
            </ul>
        </div>
    </div>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0">
          <span class="float-md-left d-block d-md-inline-block">
            Kelurahan Semarapura Kaja &copy; 2022
          </span>
        </p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>

    @yield('modal')

    <div class="modal fade" id="modal-password" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">UBAH PASSWORD</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="forms-sample" action="{{route('user.ubahpassword')}}" method="post">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Username</label>
                    <div class="col-sm-8">
                      <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" type="text" value="{{ Auth::user()->email }}" name="username" readonly>
                      </div>
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Password Lama</label>
                  <div class="col-sm-8">
                    <div class="input-group input-group-merge form-password-toggle">
                      <input class="form-control form-control-merge" type="password" name="passwordlama" aria-describedby="password" tabindex="2" required>
                      <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">Password Baru</label>
                  <div class="col-sm-8">
                    <div class="input-group input-group-merge form-password-toggle">
                      <input class="form-control form-control-merge" type="password" name="passwordbaru" aria-describedby="password" tabindex="2" required>
                      <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                    </div>
                  </div>
                </div>
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-danger">Ubah</button>
              <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
            </form>
            </div>
          </div>
        </div>
      </div>

    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/vendors/js/editors/quill/katex.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/highlight.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script> --}}
    <script src="{{asset('assets/pnotify/pnotify.custom.min.js') }}"></script>
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    {{-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> --}}

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })

        function notifikasi(notif) {
            new PNotify({
                title: notif.title,
                text: notif.text,
                type: notif.type,
                desktop: {
                    desktop: true
                }
            }).get().click(function(e) {
                if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
            });
        }

        if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
            notifikasi({!! session('notif') !!});
        }

        if($('.lightbox-image').length) {
            $('.lightbox-image').fancybox({
                openEffect  : 'fade',
                closeEffect : 'fade',
                helpers : {
                    media : {}
                }
            });
        }
    </script>

    @yield('js')
    @yield('jspage')

</body>

</html>
