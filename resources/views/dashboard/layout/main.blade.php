<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
            <div class="container">
                <div class="row ">
                    @yield('container')
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    @include('dashboard.layout.script')


</body>

</html>
