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
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Customers</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Main content -->
            <section class="content">
                {{-- Modal for Customer Registration --}}
                <div class="container-fluid mb-4 mr-auto">
                    <div class="row">
                        <div class="col-md-12 text-end">
                            <button type="button" class="btn btn-default text-white" style="background-color: #007BFF"
                                data-toggle="modal" data-target="#modal-lg">
                                Add Payment
                            </button>
                        </div>
                    </div>
                </div>
                @if (session('payment_store'))
                    <h6 class="alert alert-success">
                        {{ session('customer_store') }}
                    </h6>
                @endif
                @if (session('payment_delete'))
                    <h6 class="alert alert-danger">
                        {{ session('customer_delete') }}
                    </h6>
                @endif
                @if (session('payment_update'))
                    <h6 class="alert alert-success">
                        {{ session('customer_update') }}
                    </h6>
                @endif
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Payment</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group col-12">
                                            <label for="price">Add Payment</label>
                                            <input type="text" class="form-control" id="add_payment"
                                                name="add_payment">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="price"> Payment Date</label>
                                            <input type="date" class="form-control" id="payment_date"
                                                name="payment_date">
                                        </div>
                                    </div>
                                    <div class="modal-body" style="display: none">
                                        <div class="form-group col-12">
                                            <label for="car_id">Car Type</label>
                                            <input type="text" name="car_id" class="form-control" id="car_id"
                                                value="{{ $car->id }}" placeholder="Enter Buying Price">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>



                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customers Table</h3>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    $no = '1';
                                @endphp
                                @foreach ($customers as $customer) --}}
                                <tr>
                                    <td></td>

                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                    {{-- <td>
                                            <a href="{{ url('customer_show', $customer->id) }}"
                                                class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ url('customer/delete', $customer->id) }}"
                                                class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td> --}}
                                </tr>

                                {{-- @php
                                    $no++;
                                @endphp
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- End of Customers Table --}}
            </section>
        </div>
    </div>
    @include('master.footer')
</body>
