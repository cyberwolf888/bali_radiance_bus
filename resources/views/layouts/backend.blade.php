<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for blank page layout" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/backend/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/backend/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/backend/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/backend/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @stack('plugin_css')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ url('assets') }}/backend/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ url('assets') }}/backend/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ url('assets') }}/backend/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('assets') }}/backend/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ url('assets') }}/backend/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    @stack('page_css')
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="{{ url('/backend') }}">
                <img src="{{ url('assets') }}/backend/layouts/layout4/img/logo-small.png" alt="logo" class="" style="margin-top: 10px;"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

                    <!-- END NOTIFICATION DROPDOWN -->

                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> {{ Auth::user()->name }} </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="{{ url('assets') }}/backend/layouts/layout4/img/no_ava.jpg" /> </a>

                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <li class="quick-sidebar-toggler">

                            <span class="sr-only"><a href="{{ url('logout') }}">Toggle Quick Sidebar</a></span>
                            <i class="icon-logout"></i>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item @if (str_is('*.dashboard', Route::currentRouteName())) active @endif start ">
                    <a href="{{ route('backend.dashboard') }}" class="nav-link ">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Features</h3>
                </li>
                <li class="nav-item @if (str_is('*.kendaraan.*', Route::currentRouteName())) active @endif ">
                    <a href="{{ route('backend.kendaraan.manage') }}" class="nav-link ">
                        <i class="icon-rocket"></i>
                        <span class="title">Kendaraan</span>
                    </a>
                </li>
                <li class="nav-item @if (str_is('*.supir.*', Route::currentRouteName())) active @endif">
                    <a href="{{ route('backend.supir.manage') }}" class="nav-link ">
                        <i class="icon-rocket"></i>
                        <span class="title">Supir</span>
                    </a>
                </li>
                <li class="nav-item @if (str_is('*.kernet.*', Route::currentRouteName())) active @endif">
                    <a href="{{ route('backend.kernet.manage') }}" class="nav-link ">
                        <i class="icon-rocket"></i>
                        <span class="title">Kernet</span>
                    </a>
                </li>
                <!-- li class="nav-item @if (str_is('*.service.*', Route::currentRouteName())) active @endif ">
                    <a href="{{ route('backend.service.manage') }}" class="nav-link ">
                        <i class="icon-book-open"></i>
                        <span class="title">Service</span>
                    </a>
                </li> -->
                <li class="nav-item @if (str_is('*.transaksi.*', Route::currentRouteName())) active @endif ">
                    <a href="{{ route('backend.transaksi.manage') }}" class="nav-link ">
                        <i class="icon-basket-loaded"></i>
                        <span class="title">Transaksi</span>
                    </a>
                </li>

                <li class="nav-item @if (str_is('*.users.*', Route::currentRouteName())) open active @endif ">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-users"></i>
                        <span class="title">User</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item @if (str_is('*.operator.*', Route::currentRouteName())) active @endif ">
                            <a href="{{ route('backend.users.operator.manage') }}" class="nav-link ">
                                <span class="title">Operator</span>
                            </a>
                        </li>
                        <li class="nav-item @if (str_is('*.admin.*', Route::currentRouteName())) active @endif ">
                            <a href="{{ route('backend.users.admin.manage') }}" class="nav-link ">
                                <span class="title">Admin</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (str_is('*.laporan.*', Route::currentRouteName())) active @endif ">
                    <a href="{{ route('backend.laporan.priod') }}" class="nav-link ">
                        <i class="icon-docs"></i>
                        <span class="title">Laporan</span>
                    </a>
                </li>

            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @yield('content')
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> {{ date('Y') }} &copy; {{ env('APP_NAME') }}</div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>
<!--[if lt IE 9]>
<script src="{{ url('assets') }}/backend/global/plugins/respond.min.js"></script>
<script src="{{ url('assets') }}/backend/global/plugins/excanvas.min.js"></script>
<script src="{{ url('assets') }}/backend/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ url('assets') }}/backend/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@stack('plugin_scripts')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ url('assets') }}/backend/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
@stack('scripts')
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ url('assets') }}/backend/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{ url('assets') }}/backend/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script>
    $(".quick-sidebar-toggler").click(function () {
        window.location = "<?= url('logout') ?>";
    })
</script>
</body>
</html>