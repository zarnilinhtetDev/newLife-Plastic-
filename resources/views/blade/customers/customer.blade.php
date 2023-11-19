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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('deleteStatus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('deleteStatus') }}
                </div>
            @endif
            @if (session('updateStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateStatus') }}
                </div>
            @endif

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
                                            <h1>Customers</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a
                                                        href="{{ url('/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">Customers</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div><!-- /.container-fluid -->
                            </section>


                            <div class="container-fluid mb-4 ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-end ">
                                            <a href="{{ url('dashboard/tube') }}" data-toggle="modal"
                                                data-target="#modal-lg" class="btn btn-primary">Customer Register
                                            </a> &nbsp;
                                            <a href="{{ url('daily_customer') }}" class="btn btn-success"
                                                class="">Daily Customers

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid mt-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form action="{{ route('filter.customer') }}" method="get">
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
                                                    <input type="submit" class="btn btn-warning form-control"
                                                        value="Search">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- Modal Content --}}
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Customers Register</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/customer_register') }}" method="POST">
                                                @csrf



                                                <div class="form-group">
                                                    <label for="transaction_code">အမည်</label>
                                                    <input type="text" class="form-control" id="name"
                                                        name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_name">အမျိုးအစား</label>
                                                    <input type="text" class="form-control" id="category"
                                                        name="category">
                                                    @error('category')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="transaction_name">အရေအတွက်</label>
                                                    <input type="text" class="form-control" id="amount"
                                                        name="amount">
                                                    @error('amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="transaction_name">စျေးနှုန်း</label>
                                                    <input type="text" class="form-control" id="price"
                                                        name="price">
                                                    @error('price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                {{-- <div class="form-group">
                                                    <label for="transaction_name">မှတ်ချက်</label>
                                                    <input type="text" class="form-control" id="remark"
                                                        name="remark">

                                                </div> --}}
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1"> မှတ်ချက်</label>
                                                    <textarea name="remark" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #007BFF">Register</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>



                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Customers Table</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>အမည်</th>
                                                <th>အမျိုးအစား</th>
                                                <th>အရေအတွက်</th>
                                                <th>စျေးနှုန်း</th>
                                                <th>မှတ်ချက်</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = '1';
                                            @endphp
                                            @foreach ($customers as $customer)
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td>{{ $customer->name }}</td>

                                                    <td>{{ $customer->category }}</td>
                                                    <td>{{ $customer->amount }}</td>
                                                    <td>{{ $customer->price }}</td>
                                                    <td>{{ $customer->remark }}</td>

                                                    <td>
                                                        <a href="" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-lg1"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <a href="{{ url('delete', $customer->id) }}"
                                                            class="btn btn-danger"
                                                            onclick="return confirm('Are you sure you want to delete this customer ?')"><i
                                                                class="fa-solid fa-trash"></i>
                                                    </td>
                                                </tr>
                                                @php
                                                    $no++;
                                                @endphp
                                            @endforeach
                                        </tbody>




                                    </table>
                                </div>
                                <div class="modal fade" id="modal-lg1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Customers Update</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/update_customer', $customer->id) }}"
                                                    method="POST">
                                                    @csrf



                                                    <div class="form-group">
                                                        <label for="transaction_code">အမည်</label>
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ $customer->name }}">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="category">အမျိုးအစား</label>
                                                        <input type="text" class="form-control" id="category"
                                                            value="{{ $customer->category }}" name="category">
                                                        @error('category')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="transaction_name">အရေအတွက်</label>
                                                        <input type="text" class="form-control" id="amount"
                                                            value="{{ $customer->amount }}" name="amount">
                                                        @error('amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transaction_name">စျေးနှုန်း</label>
                                                        <input type="text" class="form-control" id="price"
                                                            value="{{ $customer->price }}" name="price">
                                                        @error('price')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleFormControlTextarea1"> မှတ်ချက်</label>
                                                        <textarea name="remark" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $customer->remark }}</textarea>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            style="background-color: #007BFF">Register</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
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


    @include('master.footer')
