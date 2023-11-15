@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">
            {{-- <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section> --}}

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">


                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1>Daily Expense</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                                <li class="breadcrumb-item active"> Daily Expense </li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daily Expense Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Category Name</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                                $totalExpensePrice = 0.0;
                                            @endphp

                                            @foreach ($dailyData as $expenses)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $expenses->category }}</td>
                                                    <td>{{ $expenses->expense_date }}</td>
                                                    <td>{{ $expenses->expense_description }}</td>
                                                    <td>{{ $expenses->expense_price }}</td>
                                                    <td>
                                                        <a href="{{ url('expense_show', $expenses->id) }}"
                                                            class="btn btn-success"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ url('expense_delete', $expenses->id) }}"
                                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                    $totalExpensePrice += $expenses->expense_price;
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <th scope="row" colspan="4">Total Expense</th>
                                                <td>{{ number_format($totalExpensePrice, 2) }}</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

            </section>

        </div>



    </div>


    @include('master.footer')
