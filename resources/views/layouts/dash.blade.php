<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('tinydash/assets/images/simbolo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title.' - Precon Indicações' ?? 'Precon Indicações - Admin'}}</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @yield('header')
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/uppy.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/jquery.steps.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('tinydash/css/quill.snow.css') }}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash/css/daterangepicker.css') }}">
    <!-- App CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('tinydash/css/app-light.css') }}" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('tinydash/css/app-dark.css') }}" id="darkTheme" disabled>
  </head>
  <body class="vertical  light  ">
    <div class="wrapper">
        @include('layouts.parts.topnav')
        @include('layouts.parts.sidebar')
      <main role="main" class="main-content">
        @yield('content')
        @include('layouts.parts.notificacoes')
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    <script src="{{ asset('tinydash/js/jquery.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/popper.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/moment.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('tinydash/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('tinydash/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('tinydash/js/config.js') }}"></script>
    <script src="{{ asset('tinydash/js/Chart.min.js') }}"></script>
    <script>
      /* defind global options */
      Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
      Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('tinydash/js/gauge.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/jquery.sparkline.min.js') }}"></script>

    <script src="{{ asset('tinydash/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/select2.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('tinydash/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/uppy.min.js') }}"></script>
    <script src="{{ asset('tinydash/js/quill.min.js') }}"></script>
    @yield('footer')
    <script src="{{ asset('tinydash/js/apps.js') }}"></script>
  </body>
</html>
