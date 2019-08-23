<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title>Cubic Admin Template</title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="{{ URL::asset('plugins/components/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('plugins/components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- ===== Animation CSS ===== -->
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <!-- ===== Color CSS ===== -->
    <link href="{{ URL::asset('css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="mini-sidebar">
 <!-- ===== Main-Wrapper ===== -->
 <div id="wrapper">
     <!-- ===== Page-Content ===== -->
     <div class="preloader">
            <div class="cssload-speeding-wheel"></div>
     </div>
        @include('inc.topnav')
        @include('inc.sidebar')
        <div class="page-wrapper"> 
            <div class="container-fluid">       
                 @yield('content') 
            </div>           
             <footer class="footer t-a-c">
                © 2017 Cubic Admin
            </footer>
        </div>
    <!-- ===== Page-Content-End ===== -->
</div>
 <!-- ===== Main-Wrapper-End ===== -->
 <!-- ==============================
        Required JS Files
    =============================== -->
    <!-- ===== jQuery ===== -->
    <script src="{{ URL::asset('plugins/components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ===== Slimscroll JavaScript ===== -->
    <script src="{{ URL::asset('js/jquery.slimscroll.js') }}"></script>
    <!-- ===== Wave Effects JavaScript ===== -->
    <script src="{{ URL::asset('js/waves.js') }}"></script>
    <!-- ===== Menu Plugin JavaScript ===== -->
    <script src="{{ URL::asset('js/sidebarmenu.js') }}"></script>
    <!-- ===== Custom JavaScript ===== -->
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <!-- ===== Plugin JS ===== -->
    <script src="{{ URL::asset('plugins/components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/components/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/components/sparkline/jquery.charts-sparkline.js') }}"></script>
    <script src="{{ URL::asset('plugins/components/knob/jquery.knob.js') }}"></script>
    <script src="{{ URL::asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ URL::asset('js/db1.js') }}"></script>
    <!-- ===== Style Switcher JS ===== -->
    <script src="{{ URL::asset('plugins/components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script src="../plugins/components/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
  
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>
</body>

</html>




