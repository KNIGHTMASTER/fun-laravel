<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>.:FN:.</title>
    {!! HTML::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/AdminLTE.min.css') !!}
    {!! HTML::style('css/font-awesome/font-awesome.css') !!}
    {!! HTML::style('css/ionicons/ionicons.css') !!}
    {!! HTML::style('css/skins/_all-skins.min.css') !!}
    {!! HTML::style('plugins/iCheck/flat/blue.css') !!}
    {!! HTML::style('plugins/morris/morris.css') !!}
    {!! HTML::style('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! HTML::style('plugins/datepicker/datepicker3.css') !!}
    {!! HTML::style('plugins/daterangepicker/daterangepicker-bs3.css') !!}
    {!! HTML::style('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
    {!! HTML::style('css/sweetalert/sweetalert.css') !!}
    {!! HTML::style('css/general.css') !!}

    {{--<link rel="shortcut icon" href="{!! asset('favicon.ico') !!}">--}}
</head>

<body class="hold-transition login-page">
<div class="login-box">
    @yield('login-content')
</div>

{!! HTML::script('js/generic.js') !!}
{!! HTML::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
        <!-- jQuery UI 1.11.4 -->
{!! HTML::script('js/jquery-ui/jquery-ui.min.js') !!}
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
{!! HTML::script('js/bootstrap.min.js') !!}
        <!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{!! HTML::script('plugins/morris/morris.min.js') !!}
        <!-- Sparkline -->
{!! HTML::script('plugins/sparkline/jquery.sparkline.min.js') !!}
        <!-- jvectormap -->
{!! HTML::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}

{!! HTML::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
        <!-- jQuery Knob Chart -->
{!! HTML::script('plugins/knob/jquery.knob.js') !!}
        <!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
{!! HTML::script('plugins/daterangepicker/daterangepicker.js') !!}
        <!-- datepicker -->
{!! HTML::script('plugins/datepicker/bootstrap-datepicker.js') !!}
        <!-- Bootstrap WYSIHTML5 -->
{!! HTML::script('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
        <!-- Slimscroll -->
{!! HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
        <!-- FastClick -->
{!! HTML::script('plugins/fastclick/fastclick.min.js') !!}
        <!-- AdminLTE App -->
{!! HTML::script('js/app.min.js') !!}
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!! HTML::script('js/pages/dashboard.js') !!}
        <!-- AdminLTE for demo purposes -->
{!! HTML::script('js/demo.js') !!}
{!! HTML::script('js/sweetalert/sweetalert.min.js') !!}
{!! HTML::script('js/laravel.js') !!}

</body>
</html>