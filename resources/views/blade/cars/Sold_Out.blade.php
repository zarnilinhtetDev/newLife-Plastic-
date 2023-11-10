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
                <li><a class="dropdown-item btn bg-danger  logout-link" href="{{ url('/logout') }}">Logout</a></li>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')

        <div class="content-wrapper">
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Sold Out Cars</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item">Cars Sold Out </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </section>
                <div class="container-fluid my-5">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('filter.soldout') }}" method="get">
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label for="">Date From :</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label for="">Date To :</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <div class="col-md-3 mt-3 form-group">
                                        <input type="submit" class="btn btn-primary form-control" value="Search"
                                            style="background-color: #218838">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Cars Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Buyer Name</th>
                                        <th>Buyer Phone</th>
                                        <th>Buyer NRC</th>

                                        <th>Car Type</th>
                                        <th>Car Model</th>
                                        <th>Car Number </th>
                                        <th>Car Image</th>
                                        <th style="background-color:#A1D39E">Car Profit</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($soldoutData))
                                        @foreach ($soldoutData as $buyer)
                                            @php
                                                $car = $buyer->car;
                                                $profit = $profits[$car->id];
                                            @endphp
                                            <tr>

                                                <td>{{ $buyer->buyer_name }}</td>
                                                <td>{{ $buyer->buyer_ph }}</td>
                                                <td>{{ $buyer->buyer_nrc }}</td>


                                                <td>{{ htmlspecialchars($car->car_type) }}</td>
                                                <td>{{ htmlspecialchars($car->car_model) }}</td>
                                                <td>{{ htmlspecialchars($car->car_number) }}</td>
                                                <td>
                                                    <a target="_blank"
                                                        href="{{ asset('carimage/' . $buyer->car->car_images) }}">
                                                        <img src="{{ asset('carimage/' . $buyer->car->car_images) }}"
                                                            alt="" width="65px">
                                                    </a>
                                                </td>
                                                <td style="background-color: #A1D39E">

                                                    {{ number_format(intval(htmlspecialchars($profit)), 0, '', ',') ?? 'none' }}


                                                <td>
                                                    <a href="{{ url('Soldout_Detail', $buyer->id) }}"
                                                        class="btn btn-warning" style="width: 80px">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($buyers as $buyer)
                                            @php
                                                $car = $buyer->car;
                                                $profit = $profits[$car->id];
                                            @endphp
                                            <tr>

                                                <td>{{ $buyer->buyer_name }}</td>
                                                <td>{{ $buyer->buyer_ph }}</td>
                                                <td>{{ $buyer->buyer_nrc }}</td>


                                                <td>{{ htmlspecialchars($car->car_type) }}</td>
                                                <td>{{ htmlspecialchars($car->car_model) }}</td>
                                                <td>{{ htmlspecialchars($car->car_number) }}</td>
                                                <td>
                                                    <a target="_blank"
                                                        href="{{ asset('carimage/' . $buyer->car->car_images) }}">
                                                        <img src="{{ asset('carimage/' . $buyer->car->car_images) }}"
                                                            alt="" width="65px">
                                                    </a>
                                                </td>
                                                <td style="background-color: #A1D39E">

                                                    {{ number_format(intval(htmlspecialchars($profit)), 0, '', ',') ?? 'none' }}


                                                <td>
                                                    <a href="{{ url('Soldout_Detail', $buyer->id) }}"
                                                        class="btn btn-warning" style="width: 80px">Details</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
        </div>
    </div>
    @include('master.footer')
