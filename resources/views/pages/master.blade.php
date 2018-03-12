<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMIK</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional theme -->
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

    <link rel="stylesheet" href="{!! URL::asset('/node_modules/font-awesome/css/font-awesome.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/node_modules/flag-icon-css/css/flag-icon.min.css') !!}" />
    <link rel="stylesheet" href="{!! URL::asset('/css/style.css') !!}" />
    @yield('stylesheet')
    <link rel="shortcut icon" href="{!! URL::asset('images/favicon.png') !!}" sizes="48x48"  />


</head>

<body>
<div class=" container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="bg-white text-center navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src={!! URL::asset("images/logo_star_black.png")!!} /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src={!! URL::asset("images/logo_star_mini.jpg")!!} alt=""></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-target="#sidebar" data-toggle="minimize">
                <span class="navbar-toggler-icon"></span>
            </button>
            <form action="{{ url("/dataNim") }}" method="post" class="form-inline mt-2 mt-md-0 d-none d-lg-block">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2 search" type="text" name="nim" placeholder="Search" id="input">
                <!--<button id="submit" type="submit">Cari</button>-->
            </form>
            <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
                <li class="nav-item">
                    <a class="nav-link profile-pic" href="#"><img class="rounded-circle" src="{!! URL::asset("images/face.jpg") !!}" alt=""> </a>
                </li>
                <li class="nav-item">
                        <div>
                            @if(Auth::guard('admin')->check())
                                <form class="form-horizontal" method="POST" action="{{ route('admin.logout') }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            @endif
                            @if(Auth::guard('web')->check())
                                    <form class="form-horizontal" method="POST" action="{{ route('logout') }}">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">Logout</button>
                                    </form>
                             @endif
                        </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>



    <!-- partial -->
    <div class="container-fluid">
        <div class="row row-offcanvas row-offcanvas-right">
            <!-- partial:partials/_sidebar.html -->
            <nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
                <div class="user-info">
                    <img src={!! URL::asset("images/face.jpg")!!} alt="">
                    <p class="name">{{Auth::user()->name}}</p>
                    <p class="designation">{{Auth::user()->email}}</p>
                    <span class="online"></span>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{!! url('/') !!}">
                            <img src={!! URL::asset("images/icons/1.png")!!} alt="">
                            <span class="menu-title">Dashbord</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-dosen" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Dosen<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-dosen">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('dosen') !!}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('dosen/create') !!}">
                                        Masukkan Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-mahasiswa" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Mahasiswa<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-mahasiswa">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('mahasiswa') !!}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('mahasiswa/create') !!}">
                                        Masukkan Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-staff" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Staff<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-staff">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('staff') !!}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('staff/create') !!}">
                                        Masukkan Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#drop-publikasi" aria-expanded="false" aria-controls="sample-pages">
                            <img src={!! URL::asset("images/icons/9.png")!!} alt="">
                            <span class="menu-title">Publikasi<i class="fa fa-sort-down"></i></span>
                        </a>
                        <div class="collapse" id="drop-publikasi">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('publikasi') !!}">
                                        Lihat Daftar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{!! url('publikasi/create') !!}">
                                        Masukkan Data
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- partial -->
            <div class="content-wrapper">
                <h3 class="page-heading mb-4">Dashboard</h3>
                @yield('side-content')
            </div>
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="float-right">
                <a href="#">Star Admin</a> &copy; 2017
            </span>
                </div>
            </footer>

            <!-- partial -->
        </div>
    </div>

</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5NXz9eVnyJOA81wimI8WYE08kW_JMe8g&callback=initMap" async defer></script>
<script src="{!! URL::asset('node_modules/jquery/dist/jquery.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/popper.js/dist/umd/popper.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/chart.js/dist/Chart.min.js') !!}"></script>
<script src="{!! URL::asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') !!}"></script>
<script src="{!! URL::asset('js/off-canvas.js') !!}"></script>
<script src="{!! URL::asset('js/hoverable-collapse.js') !!}"></script>
<script src="{!! URL::asset('js/misc.js') !!}"></script>
<script src="{!! URL::asset('js/chart.js') !!}"></script>
<script src="{!! URL::asset('js/maps.js') !!}"></script>
@yield('script_bottom')
</body>
</html>