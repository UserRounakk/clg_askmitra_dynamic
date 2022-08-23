<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>IT Students of Nepal</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    {{-- DataTable Css --}}
    <link rel="stylesheet" href='https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css'>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/home" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/resources" class="nav-link">Resources</a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin" class="brand-link">
                <img src="{{ asset('images/circle-logo.png') }}" class="brand-image img-circle" style="opacity: 1;">
                <span class="brand-text font-weight-light">IT Students of Nepal</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <i class="fas fa-user fa-2x text-white"></i>
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="/home" class="nav-link @yield('Dashboard')">
                                <i class="fas fa-chart-line"> </i>
                                <p>
                                    &nbsp;Dashboard
                                </p>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="/resources" class="nav-link @yield('resources')">
                                <i class="fas fa-laptop-code"></i>
                                <p>
                                    &nbsp;Resources
                                </p>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-sitemap"></i>
                                <p>
                                    &nbsp;Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/categories" class="nav-link @yield('categories')">
                                        <i class="fas fa-list"></i>
                                        <p>&nbsp; All Categories</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/categories/create" class="nav-link @yield('create_category')">
                                        <i class="fas fa-plus"></i>
                                        <p>&nbsp; Add Category</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-id-card"></i>
                                <p>
                                    &nbsp;Cards
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/cards" class="nav-link @yield('cards')">
                                        <i class="fas fa-list"></i>
                                        <p>&nbsp; All Cards</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/cards/create" class="nav-link @yield('create_card')">
                                        <i class="fas fa-plus"></i>
                                        <p>&nbsp; Add Card</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="fas fa-handshake"></i>
                                <p>
                                    &nbsp;Organizers
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/organizers" class="nav-link @yield('organizers')">
                                        <i class="fas fa-users"></i>
                                        <p>&nbsp; All Organizers</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/organizers/create" class="nav-link @yield('create_organizer')">
                                        <i class="fas fa-plus"></i>
                                        <p>&nbsp; Add Organizer</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a href="/faqs" class="nav-link @yield('faqs')">
                                <i class="fas fa-question-circle"></i>
                                <p>
                                    &nbsp;Faqs
                                </p>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>&nbsp;Logout</p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('page')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">@yield('page')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Welcome! {{ Auth::user()->name }}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script> <a href="https://itsnp.org">IT Students of Nepal</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    {{-- Datable JavaScript --}}
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
</body>

</html>
