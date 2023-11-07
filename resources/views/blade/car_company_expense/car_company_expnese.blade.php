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
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">

                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Car/Company Expenses</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Car/Company Expenses</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Car Expense</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <th>Car ID</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                    $totalPrice = 0; // Initialize the total price variable.
                                @endphp
                                {{-- @if (isset($car_expenses)) --}}
                                @foreach ($car_expenses as $car_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $car_expense->car_id }}</td>
                                        <td>{{ $car_expense->description }}</td>
                                        <td>{{ $car_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $car_expense->expense_price; // Add the expense price to the total.
                                        @endphp
                                    </tr>
                                @endforeach
                                {{-- @else
                                    @foreach ($search_car_expenses as $search_car_expense)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $search_car_expense->car_id }}</td>
                                            <td>{{ $search_car_expense->description }}</td>
                                            <td>{{ $search_car_expense->expense_price }}</td>

                                            @php
                                                $no++;
                                                $totalPrice += $search_car_expense->expense_price; // Add the expense price to the total.
                                            @endphp
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td><strong>Total: {{ $totalPrice }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Company Expense</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('/search') }}" method="POST">
                            @csrf
                            <div class="col-md-6 d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label for="">Date From:</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="">Date To:</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <div class="col-md-3 mt-3 form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Search"
                                            style="background-color: #0069D9">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>No</td>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $totalPrice = 0; // Initialize the total price variable.
                            @endphp
                            @if (isset($company_expenses))
                                @foreach ($company_expenses as $company_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $company_expense->category }}</td>
                                        <td>{{ $company_expense->expense_date }}</td>
                                        <td>{{ $company_expense->expense_description }}</td>
                                        <td>{{ $company_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $company_expense->expense_price; // Add the expense price to the total.
                                        @endphp
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($search_company_expenses as $search_company_expense)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $search_company_expense->category }}</td>
                                        <td>{{ $search_company_expense->expense_date }}</td>
                                        <td>{{ $search_company_expense->expense_description }}</td>
                                        <td>{{ $search_company_expense->expense_price }}</td>

                                        @php
                                            $no++;
                                            $totalPrice += $search_company_expense->expense_price; // Add the expense price to the total.
                                        @endphp
                                    </tr>
                                @endforeach
                            @endif



                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td><strong>Total: {{ $totalPrice }}</strong></td>
                            </tr>
                        </tfoot>

                    </table>

                </div>
                <!-- /.card-body -->

            </section>

        </div>



    </div>


    @include('master.footer')
