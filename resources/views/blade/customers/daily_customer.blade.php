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
                <li><a class="dropdown-item btn bg-danger  logout-link" href="{{ url('/logout') }}">Logout</a></li>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Daily Customers</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Daily Customers</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>



            <section class=" container-fluid content-body">



                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title my-3">တစ်ရက် ရောင်းရငွေ - {{ number_format($todayTotal) }}
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Date</th>
                                        <th>အမည်</th>
                                        <th> အမျိုးအစား</th>
                                        <th> အရေအတွက်</th>
                                        <th>စျေးနှုန်း</th>
                                        <th> မှတ်ချက်</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($dailyData as $data)
                                        <tr>
                                            <td>{{ (new DateTime($data->created_at))->format('d.M.y') }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->category }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ number_format($data->price) }}</td>
                                            <td>{{ $data->remark }}</td>

                                        </tr>
                                    @endforeach

                                    <!-- Add a row for the total -->

                                </tbody>




                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </section>



            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> New Life (Taungggyi)</div>
                        <div>
                            ပလပ်စတစ် ဘူးခွံလုပ်ငန်း
                        </div>
                    </div>
                </div>
            </footer>
        </div>

    </div>



    </div>


    @include('master.footer')
