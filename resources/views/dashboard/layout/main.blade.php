<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('tittleHalaman')

    
    @include('dashboard.layout.link')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('dashboard.layout.navbar1')

        <!-- /.navbar -->
        @include('dashboard.layout.sidebar1')



        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('dashboard.layout.wrapper')

            <!-- /.content-header -->



            <div class="container">
                <div class="row">
                    @yield('container')


                </div>
            </div>
            <!-- /.content -->
        </div>
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>
    @include('dashboard.layout.script')

    
</body>

</html>
