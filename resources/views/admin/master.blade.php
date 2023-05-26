<!doctype html>
<html lang="en">

<head>
     @auth('admin')
    <x-adimnPart.header />
    @endauth
    @auth('web')
        <x-instructorPart.header />
    @endauth


</head>

<body data-topbar="colored">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">

        @auth('admin')
            <x-adimnPart.navbar />
        @endauth
        @auth('web')
                <x-instructorPart.navbar />
            @endauth




        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            @auth('admin')
                <x-adimnPart.sidebar />
            @endauth
            @auth('web')
                    <x-instructorPart.sidebar />
            @endauth

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('content')
                <!-- Container-Fluid -->
            </div>
            <!-- End Page-content -->


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Agroxa <span class="d-none d-sm-inline-block">- Crafted with <i
                                    class="mdi mdi-heart text-primary"></i> by
                                Hamo</span>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!-- JAVASCRIPT -->
    <script src="{{ asset('adminassets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminassets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminassets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('adminassets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('adminassets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('adminassets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Responsive Table js -->
    <script src="{{ asset('adminassets/libs/admin-resources/rwd-table/rwd-table.min.js') }}"></script>

    <!-- Init js -->
    <script src="{{ asset('adminassets/js/pages/table-responsive.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('adminassets/js/app.js') }}"></script>
@yield('script')

</body>

</html>
