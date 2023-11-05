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
                                Customer Register
                            </button>
                        </div>
                    </div>
                </div>
                @if (session('customer_store'))
                    <h6 class="alert alert-success">
                        {{ session('customer_store') }}
                    </h6>
                @endif
                @if (session('customer_delete'))
                    <h6 class="alert alert-danger">
                        {{ session('customer_delete') }}
                    </h6>
                @endif
                @if (session('customer_update'))
                    <h6 class="alert alert-success">
                        {{ session('customer_update') }}
                    </h6>
                @endif
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Customer Register</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('customer_register') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="customer_name">Customer Name</label>
                                            <input type="text" class="form-control" id="customer_name"
                                                name="customer_name" placeholder="Enter Customer Name"
                                                value="{{ old('customer_name') }}" />
                                            @error('customer_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="tel" class="form-control" id="phone_number"
                                                name="phone_number" placeholder="Enter Phone Number"
                                                value="{{ old('phone_number') }}" />
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter Address" value="{{ old('address') }}" />
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city"
                                                placeholder="Enter City" value="{{ old('city') }}" />
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #007BFF">Save</button>
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
                                @php
                                    $no = '1';
                                @endphp
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $no }}</td>

                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td>{{ $customer->message }}</td>

                                        <td>
                                            <a href="{{ url('customer_show', $customer->id) }}"
                                                class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ url('customer/delete', $customer->id) }}"
                                                class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td>
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
                {{-- End of Customers Table --}}
            </section>
        </div>
    </div>
    @include('master.footer')
</body>
