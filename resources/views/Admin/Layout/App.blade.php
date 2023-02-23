<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('uploads') }}/embie-title.ico">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="{{ asset('admin_assets') }}/bower_components/select2/dist/css/bootstrap-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('admin_assets') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/skins/_all-skins.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet"
        href="{{ asset('admin_assets') }}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
        href="{{ asset('admin_assets') }}/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/css/toastr.min.css">
    <!--<link rel="stylesheet" href="{{ asset('admin_assets') }}/dist/sweet-alert/new/sweetalert.css">-->
    <link rel="stylesheet" href="{{ asset('admin_assets') }}/bower_components/sweetalert/sweetalert.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style>
        .dropdown-menu img {
            inline-size: 30px;
            block-size: 30px;
        }

        .req {

            margin-block-start: 13px;
            margin-inline-end: 10px;
            border-radius: 5px;
            border: none;

        }

        .addButton {
            margin-block-start: 10px;
            margin-inline-end: 10px;
            margin-block-end: 10px;
        }
    </style>

    @stack('CSS')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">





        <header class="main-header">
            <a href="{{ route('admin.home') }}" class="logo">
                <span class="logo-mini"><b>H</b>R</span>
                <span class="logo-lg"><b>Haramain Recordings</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset(IMG) }}/logo.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">Haramain Recordings</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{{ asset(IMG) }}/logo.png" class="img-circle" alt="User Image">

                                    <p>
                                        {{ Auth::user()->email }}
                                        <small>Member since
                                            Nov.{{ date('Y', strtotime(Auth::user()->created_at)) }}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <!--  <a href="#">Followers</a> -->
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <!-- <a href="#">Sales</a> -->
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <!-- <a href="#">Friends</a> -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}"
                                            class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image ">
                        <img src="{{ asset(IMG) }}/logo.png"
                            style="inline-size: 45px;block-size: 45px;margin-inline-start: -7px;" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header ">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-cogs"></i><span>{{ trans('admin.sidebar_mosque_manage') }}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.mosque.list') }}"><i
                                        class="fa fa-cogs"></i>{{ trans('admin.mosque') }}</a></li>
                            <li><a href="{{ route('admin.submosque.list') }}"><i
                                        class="fa fa-cogs"></i>{{ trans('admin.sub_mosque') }}</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="">
                            <i class="fa fa-cogs"></i><span>{{ trans('admin.sidebar_config_manage') }}</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.imaam.list') }}"><i
                                        class="fa fa-cogs"></i>{{ trans('admin.imaam_manage') }}</a>
                            </li>
                            <li><a href="{{ route('admin.maudhins.list') }}"><i
                                        class="fa fa-cogs"></i>{{ trans('admin.maudhins_manage') }}</a>
                            </li>
                            <li><a href="{{ route('admin.year.list') }}"><i class="fa fa-cogs"></i>{{ trans('admin.year_manage') }}</a></li>

                            <li><a href="{{ route('admin.language.list') }}"><i
                                        class="fa fa-cogs"></i>{{ trans('admin.language_manage') }}</a>
                            </li>
                            <li><a href="{{ route('admin.surah.list') }}"><i class="fa fa-cogs"></i>{{ trans('admin.surah_manage') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.mosque.nabawi', ['id' => '2']) }}"><i class="fa fa-moon-o"></i>
                            <span>{{ trans('admin.masjid_an_nabawi') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.mosque.haram', ['id' => '1']) }}"><i class="fa fa-moon-o"></i>
                            <span>{{ trans('admin.masjid_al_haram') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.prayer.dashboard') }}"><i class="fa fa-moon-o"></i>
                            <span>{{ trans('admin.prayer_times') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.gpslocation.dashboard') }}"><i class="fa fa-map-marker"></i>
                            <span>{{ trans('admin.gps_locations') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.gallery.dashboard') }}"><i class="fa fa-picture-o"></i>
                            <span>{{ trans('admin.gallery') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.advertisment.add') }}"><i class="fa fa-picture-o"></i>
                            <span>{{ trans('admin.advertisment') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.competition.list') }}"><i class="fa fa-picture-o"></i>
                            <span>{{ trans('admin.competition') }}</span></a>
                    </li>

                    <li class="">
                        <a href="{{ route('admin.video.dashboard') }}"><i class="fa fa-file-video-o"></i>
                            <span>{{ trans('admin.haramain_videos') }}</span></a>
                    </li>


                    <li class="">
                        <a href="{{ route('admin.Translation.List') }}"><i class="fa fa-language"></i>
                            <span>{{ trans('admin.translation') }}</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
        <!-- Content Wrapper. Contains page content -->
        @yield('Content')
        <!-- /.content-wrapper -->
        <footer class="main-footer ">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2022  <a href="http://www.arvaantechnolab.com/" target="_blank">
                    ARVAAN TECHNO-LAB</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- jQuery 3 -->
    <script src="{{ asset('admin_assets') }}/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin_assets') }}/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('admin_assets') }}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('admin_assets') }}/bower_components/select2/dist/js/boot-select2.js"></script>
    <script src="{{ asset('admin_assets') }}/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_assets') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/dataTables.responsive.min.js"></script>

    <script src="{{ asset('admin_assets') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('admin_assets') }}/bower_components/raphael/raphael.min.js"></script>

    <script src="{{ asset('admin_assets') }}/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="{{ asset('admin_assets') }}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('admin_assets') }}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin_assets') }}/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin_assets') }}/bower_components/moment/min/moment.min.js"></script>
    <script src="{{ asset('admin_assets') }}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!--datepicker-->
    <script src="{{ asset('admin_assets') }}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('admin_assets') }}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('admin_assets') }}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_assets') }}/bower_components/fastclick/lib/fastclick.js"></script>

    <script src="{{ asset('admin_assets') }}/bower_components/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('admin_assets') }}/bower_components/ckeditor/styles.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_assets') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin_assets') }}/bower_components/morris.js/morris.min.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/pages/dashboard.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/demo.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/toastr.min.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/jquery.validate.min.js"></script>
    <script src="{{ asset('admin_assets') }}/dist/js/addtional-method.min.js"></script>
    <!--<script src="{{ asset('admin_assets') }}/dist/sweet-alert/new/sweetalert-dev.js"></script>-->
    <script src="{{ asset('admin_assets') }}/bower_components/sweetalert/sweetalert.js"></script>
    <script type="text/javascript">
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.editorConfig = function(config) {
            config.width = "auto";
            config.height = "auto";
        };
        CKEDITOR.config.format_p = {
            element: 'p',
            attributes: {
                'style': 'font-family: Trebuchet MS, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;font-size: 14px;color: #222222;'
            }
        };
        CKEDITOR.config.format_h1 = {
            element: 'h1',
            attributes: {
                'style': 'font-family: Asap;font-size: 16px;color: #545454;text-transform: uppercase;'
            }
        };

        CKEDITOR.config.format_h2 = {
            element: 'h2',
            attributes: {
                'style': 'font-family: Asap;font-size: 14px;color: #FACACA;text-transform: uppercase;'
            }
        };
        CKEDITOR.config.format_h3 = {
            element: 'h3',
            attributes: {
                'style': 'font-family: Trebuchet MS;font-size: 14px;color: #545454;text-decoration: none solid rgb(84, 84, 84);text-transform: uppercase;'
            }
        };
        CKEDITOR.config.format_h4 = {
            element: 'h4',
            attributes: {
                'style': 'font-family: Trebuchet MS;font-size: 14px;color: #FACACA'
            }
        };
        CKEDITOR.config.format_h5 = {
            element: 'h5',
            attributes: {
                'style': 'font-family: Trebuchet MS;font-size: 12px;color: #222222;text-decoration: none solid rgb(0, 0, 0);text-transform: uppercase;'
            }
        };
        CKEDITOR.config.format_img = {
            element: 'img',
            attributes: {
                'style': 'inline-size: 100%;block-size: auto;object-fit: cover;'
            }
        };
        CKEDITOR.config.font_names =
            'Trebuchet MS/Trebuchet MS;';
    </script>
    @stack('JS')
    <script>
        $(document).ready(function() {
            $('.sidebar-menu').tree();
        });

        function sa_message($msg, $type) {
            toastr[$type]($msg);
        }
        setTimeout(function() {
            $("#messageflash").fadeOut(800);
        }, 4000);
        //$('.flash-message').hide().delay(5000).fadeIn(400);
    </script>

</body>

</html>
