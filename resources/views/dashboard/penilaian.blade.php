<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Building | Penilaian</title>

    <link rel="icon" type="image/png"
        href="https://trello.com/1/cards/64ed4989bbe6747599ce1a05/attachments/650921639318e47f2e317368/previews/650921639318e47f2e317376/download/icon-kemenkes.png">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('dist/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dist/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('dist/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    @include('sweetalert::alert')
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><img src="{{ asset('dist/img/logo-ebuilding.png') }}"></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><img src="{{ asset('dist/img/logo-ebuilding.png') }}"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top breadcrumb">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                </ol>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('dist/img/login2.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset('dist/img/login2.jpg') }}" class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->name }}
                                        <small>WELCOME {{ Auth::user()->name }}</small>
                                    </p>
                                </li>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="change-password" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="logout" class="btn btn-default btn-flat">LogOut</a>
                            </div>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-5">
                    <br>
                    <div class="pull-left image">
                        <img src="{{ asset('dist/img/login2.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <br>
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">PENILAIAN</li>
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    <li class="active">
                        <a href="{{ route('penilaian') }}">
                            <i class="fa fa-table"></i>
                            <span>Penilaian</span>
                        </a>
                    <li>
                        <a href="{{ route('kriteriapenilaian') }}">
                            <i class="fa fa-users"></i>
                            <span>Daftar Kriteria Penilaian</span>
                        </a>
                    </li>
                    <li class="header">AREA KERJA</li>
                    <li>
                    <li>
                        <a href="{{ route('areakerja') }}">
                            <i class="fa fa-briefcase"></i>
                            <span> Daftar Area Kerja</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gedungkemenkes')}}">
                            <i class="fa fa-building"></i>
                            <span>Daftar Gedung Kemenkes</span>
                        </a>
                    </li>
                    </li>
                    <li class="header">PEGAWAI</li>
                    <li>
                        <a href="{{ route('unitutama')}}">
                            <i class="fa fa-user"></i> 
                            <span>Daftar Unit Utama</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('unitkerja')}}">
                            <i class="fa fa-user"></i> 
                            <span>Daftar Unit Kerja</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pegawai')}}">
                            <i class="fa fa-user"></i> 
                            <span>Daftar Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('pengguna')}}">
                            <i class="fa fa-user"></i> 
                            <span>Daftar Pengguna</span>
                        </a>
                    </li>
                    <li class="header">PENYEDIA</li>
                    <li>
                        <a href="{{route('penyedia')}}">
                            <i class="fa fa-id-card"></i> <span>Daftar Penyedia</span>
                        </a>
                    </li>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    E-BUILDING
                    <br>
                    <h4>Sistem Informasi Manajemen Penilaian Jasa Pengelola Gedung</h4>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <h4>Penilaian</h4>
                    </li>
                </ol>

                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            @csrf
                            <div class="nav-tabs-custom">
                                <div class="box box-info">
                                    <div class="box-header">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="tab_1" data-toggle="tab">Temuan Kartu Kuning</a></li>
                                            <li><a href="#tab_2" data-toggle="tab"> Riwayat Kartu Kuning</a></li>
                                        </ul>
                                    </div>
                                    <div class="box-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="form-group">
                                                    <label>Posisi Bagian*</label>
                                                    <select class="form-control select2" name="posisi_id" id="posisi_id">
                                                        <option value="_blank_">Pilih Posisi</option>
                                                        @foreach ($posisi as $posisiItem)
                                                            <option value="{{ $posisiItem->id_posisi }}">{{$posisiItem->posisi}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="hidden" id="kartukuning">
                                                    <div class="form-group">
                                                        <label>Pegawai*</label>
                                                        <select class="form-control select2" name="pegawai" id="pegawai"></select>
                                                    </div>
    
                                                    <div class="form-group">
                                                        <label>Area Kerja*</label>
                                                        <select class="form-control select2" name="areakerja" id="areakerja"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>

        </div>
        </section>


        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2023.</strong> All rights reserved | Biro Umum Kemenkes
    </footer>
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('dist/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('dist/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('dist/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="{{ asset('dist/bower_components/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dist/bower_components/morris.js/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('dist/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('dist/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('dist/bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('dist/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('dist/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('dist/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('dist/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>


</body>

</html>
