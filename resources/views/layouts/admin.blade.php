<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- ================== GOOGLE FONTS ==================-->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
	<!-- ======================= GLOBAL VENDOR STYLES ========================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/vendor/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/metismenu/dist/metisMenu.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/switchery-npm/index.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css')}}">
	<!-- ======================= LINE AWESOME ICONS ===========================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/icons/line-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/css/icons/simple-line-icons.css')}}">
	<!-- ======================= DRIP ICONS ===================================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/icons/dripicons.min.css')}}">
	<!-- ======================= MATERIAL DESIGN ICONIC FONTS =================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/icons/material-design-iconic-font.min.css')}}">
	<!-- ======================= PAGE VENDOR STYLES ===========================-->
	<link rel="stylesheet" href="{{asset('assets/admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
	<!-- ======================= GLOBAL COMMON STYLES ============================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/common/main.bundle.css')}}">
	<!-- ======================= LAYOUT TYPE ===========================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/layouts/vertical/core/main.css')}}">
	<!-- ======================= MENU TYPE ===========================-->
	<link rel="stylesheet" href="{{asset('assets/admin/css/layouts/vertical/menu-type/default.css')}}">
	<!-- ======================= THEME COLOR STYLES ===========================-->
    <link rel="stylesheet" href="{{asset('assets/admin/css/layouts/vertical/themes/theme-a.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/sweetalert.css')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/ico.png') }}" />
    @yield('css')
</head>
<body>
	<!-- START APP WRAPPER -->
	<div id="app">
		<!-- START MENU SIDEBAR WRAPPER -->
        @include('part.side')
		<!-- END MENU SIDEBAR WRAPPER -->
		<div class="content-wrapper">
			<!-- START LOGO WRAPPER -->
            @include('part.nav-mobile')
			<!-- END LOGO WRAPPER -->
			<!-- START TOP TOOLBAR WRAPPER -->
            @include('part.nav-desk')
			<!-- END TOP TOOLBAR WRAPPER -->
			<div class="content">
				<!--START PAGE HEADER -->
                <header class="page-header">
                    <div class="d-flex align-items-center">
                        <div class="mr-auto">
                            <h1 class="separator">Admin Dashboard</h1>
                            @yield('header')
                        </div>
                    </div>
                </header>
				<!--END PAGE HEADER -->
				<!--START PAGE CONTENT -->
				<section class="page-content container-fluid">
					<div class="row">
                        @include('layouts._flash')
                        @yield('content')
                    </div>
                </section>
            <!--END PAGE CONTENT -->
            </div>
        </div>
	</div>
    <!-- END CONTENT WRAPPER -->
    <!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
    <script src="{{asset('assets/admin/vendor/modernizr/modernizr.custom.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/js-storage/js.storage.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/js-cookie/src/js.cookie.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/pace/pace.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/metismenu/dist/metisMenu.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/switchery-npm/index.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- ================== PAGE LEVEL VENDOR SCRIPTS ==================-->
    <script src="{{asset('assets/admin/vendor/countup.js/dist/countUp.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/flot.curvedlines/curvedLines.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <!-- ================== GLOBAL APP SCRIPTS ==================-->
    <script src="{{asset('assets/admin/js/global/app.js')}}"></script>
    <!-- ================== PAGE LEVEL SCRIPTS ==================-->
    <script src="{{asset('assets/admin/js/components/countUp-init.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/counter-group.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/recent-transactions.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/monthly-budget.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/users-chart.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/bounce-rate-chart.js')}}"></script>
    <script src="{{asset('assets/admin/js/cards/session-duration-chart.js')}}"></script>
    {{-- <script src="{{asset('assets/admin/js/components/sweetalert2.js')}}"></script> --}}
    <script src="{{asset('assets/admin/js/components/sweetalert.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/delete.js') }}"></script>
    
    @yield('js')
    @stack('scripts')
</body>
</html>
