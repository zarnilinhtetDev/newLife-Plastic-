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


            <!-- Main content -->

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
                                    <th>No</th>
                                    <th>Car Type</th>
                                    <th>Car Model</th>
                                    <th>Car Number </th>
                                    <th>Manufacture Years</th>
                                    <th>License Expire</th>
                                    <th>Car Color</th>
                                    <th>Car Image</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = '1';
                                @endphp
                                @foreach ($buyers as $buyer)
                                    <tr>
                                        <td>{{ $no }}</td>

                                        <td>{{ $buyer->car->car_type }}</td>
                                        <td>{{ $buyer->car->car_model }}</td>
                                        <td>{{ $buyer->car->car_number }}</td>
                                        <td>{{ $buyer->car->manufacture_year }}</td>
                                        <td>{{ $buyer->car->License_expire }}</td>
                                        <td>{{ $buyer->car->car_color }}</td>
                                        <td>
                                            <a target="_blank" href="/carimage/{{ $buyer->car->car_images }}">
                                                <img src="{{ asset('carimage/' . $buyer->car->car_images) }}"
                                                    alt="" width="65px">
                                            </a>
                                        </td>
                                        <td></td>
                                    </tr>
                                    @php
                                        $no++;
                                    @endphp
                                @endforeach

                            </tbody>




                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </section>

        </div>



    </div>


    @include('master.footer')
