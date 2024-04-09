<!DOCTYPE html>
<html lang="zxx">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Pharma Connect</title>
    <link rel="icon" href="{{ asset('assets/images/fav.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/partner/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/themefy_icon/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/niceselect/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/owl_carousel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/gijgo/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/tagsinput/tagsinput.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/datepicker/date-picker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/vectormap-home/vectormap-2.0.2.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/scroll/scrollable.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/datatable/css/jquery.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/datatable/css/responsive.dataTables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/datatable/css/buttons.dataTables.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/text_editor/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/morris/morris.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/partner/vendors/material_icon/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/partner/css/metisMenu.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/partner/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/partner/css/colors/default.css') }}" id="colorSkinCSS">
    <script src="{{ asset('assets/partner/js/jquery1-3.4.1.min.js') }}"></script>
</head>

<body class="crm_body_bg">

    @include('partners.partials.sidebar')
    <section class="main_content dashboard_part large_header_bg">

        @include('partners.partials.header')

        @yield('content')

        @include('partners.partials.footer')
    </section>

    

    <script src="{{ asset('assets/partner/js/popper1.min.js') }}"></script>

    <script src="{{ asset('assets/partner/js/bootstrap1.min.js') }}"></script>

    <script src="{{ asset('assets/partner/js/metisMenu.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/count_up/jquery.waypoints.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/chartlist/Chart.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/count_up/jquery.counterup.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/niceselect/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datatable/js/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/datepicker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datepicker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/datepicker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/partner/js/chart.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/chartjs/roundedBar.min.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/progressbar/jquery.barfiller.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/tagsinput/tagsinput.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/text_editor/summernote-bs4.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/am_chart/amcharts.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/scroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/scroll/scrollable-custom.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/vectormap-home/vectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/vectormap-home/vectormap-world-mill-en.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/apex_chart/apex-chart2.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/apex_chart/apex_dashboard.js') }}"></script>

    <script src="{{ asset('assets/partner/vendors/chart_am/core.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/chart_am/charts.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/chart_am/animated.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/chart_am/kelly.js') }}"></script>
    <script src="{{ asset('assets/partner/vendors/chart_am/chart-custom.js') }}"></script>

    <script src="{{ asset('assets/partner/js/dashboard_init.js') }}"></script>
    <script src="{{ asset('assets/partner/js/custom.js') }}"></script>
</body>

</html>