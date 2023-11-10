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
                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Payment Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
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

            @if (session('updateStatus'))
                <h6 class="alert alert-success">
                    {{ session('updateStatus') }}
                </h6>
            @endif
            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 my-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Payment Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('payment-update', $paymentData->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group col-12">
                                            <label for="payment_date"> Payment Date</label>
                                            <input type="date" class="form-control" id="payment_date"
                                                name="payment_date" placeholder="Enter Add Payment"
                                                value="{{ $paymentData->payment_date }}">

                                        </div>
                                        <div class="form-group col-12">
                                            <label for="price">Add Payment</label>
                                            <input type="text" class="form-control" id="add_payment"
                                                name="add_payment" placeholder="Enter Add Payment"
                                                value="{{ $paymentData->add_payment }}">

                                        </div>

                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group col-12" style="display: none">
                                            <label for="car_id">Car Type</label>
                                            <input type="text" name="car_id" class="form-control" id="car_id"
                                                placeholder="Enter Buying Price" value="{{ $buyer->id ?? 'null' }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>

    </div>



    </div>


    @include('master.footer')
