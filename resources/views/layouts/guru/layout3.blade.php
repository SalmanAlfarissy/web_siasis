<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Web Siasis</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href=" {{ asset('plugins/animate-css/animate.css') }} " rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('plugins/waitme/waitMe.css') }}" rel="stylesheet" />

     <!-- Bootstrap Select Css -->
     <link href="{{ asset('plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/themes/all-themes.css') }}" rel="stylesheet" />

</head>

<body class="theme-red">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    {{-- header --}}
    @include('layouts.guru.header')
    {{-- endheader --}}

    {{-- left sidebar --}}
    @include('layouts.guru.sidebar')
    {{-- end left sidebar --}}

    {{-- content --}}
    @yield('content')
    {{-- endcontent --}}

    <!-- Jquery Core Js -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>

    <!-- Autosize Plugin Js -->
    <script src="{{ asset('plugins/autosize/autosize.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/tables/jquery-datatable.js') }}"></script>

    <!-- Demo Js -->
    <script src="{{ asset('js/demo.js') }}"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{ asset('plugins/bootstrap-notify/bootstrap-notify.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        $(function(){
            $('.datepicker').datepicker({
                format:'yyyy-mm-dd',
                autoclose:true,
                todayHighlight:true,
            });
        });

           </script>

    <script>
        function myFunction() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>
