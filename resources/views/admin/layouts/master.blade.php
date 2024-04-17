<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharm Connect</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 5 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/admin/bower_components/bootstrap/css/bootstrap.min.css' ) }}">

    <link rel="stylesheet" href="{{ asset('assets/admin/pages/waves/css/waves.min.css ') }}" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/icon/feather/css/feather.css') }} ">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/font-awesome-n.min.css') }} ">

    <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/chartist/css/chartist.css') }}" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/widget.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/custom.css') }}">
    <script type="text/javascript" src="{{ asset('assets/admin/bower_components/jquery/js/jquery.min.js')}}"></script>
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.partials.header')
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('admin.partials.sidebar')

                    @yield('content')

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('admin.partials.footer')



   
    <script type="text/javascript" src="{{ asset('assets/admin/bower_components/jquery-ui/js/jquery-ui.min.js')}}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/admin/bower_components/popper.js/js/popper.min.js')}}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/admin/bower_components/bootstrap/js/bootstrap.min.js')}}">
    </script>

    <script src="{{ asset('assets/admin/pages/waves/js/waves.min.js')}}"></script>

    <script type="text/javascript"
        src="{{ asset('assets/admin/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script src="{{ asset('assets/admin/pages/chart/float/jquery.flot.js')}}"></script>
    <script src="{{ asset('assets/admin/pages/chart/float/jquery.flot.categories.js')}}"></script>
    <script src="{{ asset('assets/admin/pages/chart/float/curvedLines.js')}}"></script>
    <script src="{{ asset('assets/admin/pages/chart/float/jquery.flot.tooltip.min.js')}}"></script>

    <script src="{{ asset('assets/admin/pages/widget/amchart/amcharts.js')}}"></script>
    <script src="{{ asset('assets/admin/pages/widget/amchart/serial.js')}}"></script>
    <script src="{{ asset('assets/admin/pages/widget/amchart/light.js')}}"></script>
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/pages/google-maps/gmaps.js')}}"></script>

    <script src="{{ asset('assets/admin/js/pcoded.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/vertical/vertical-layout.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/pages/dashboard/crm-dashboard.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/script.min.js')}}"></script>
</body>

</html>