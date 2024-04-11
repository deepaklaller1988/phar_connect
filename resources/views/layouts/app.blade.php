<!DOCTYPE html>
<html>

<head>
  <title>Pharm Connect</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="icon" type="image/png" href="{{asset('assets/images/fav.png')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/slick/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  @stack('css')
</head>

<body>
  <div id="main">
    @include('/partials/header')
    @yield('content')
    @include('/partials/footer')
  </div>

  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="{{asset('/assets/slick/slick.js')}}" type="text/javascript" charset="utf-8"></
  <script type="text/javascript">
        $(document).on('ready', function () {
            $(".regular").slick({
                dots: true,
                prevArrow: false,
                nextArrow: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            });
            $(".center").slick({
                dots: false,
                infinite: true,
                centerMode: true,
                slidesToShow: 5,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 5000,
            });
        });
    </script>
  @stack('js')
</body>

</html>