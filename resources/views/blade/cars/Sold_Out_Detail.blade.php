@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">


                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>


                </li>
            </ul>

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6"`>
                                <h1>Sold Out Detail</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/dashboard') }}"> Cars</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                @if (session('soldout'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('soldout') }}
                    </div>
                @endif

                @if (session('buySuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('buySuccess') }}
                    </div>
                @endif
                @if (session('offerSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('offerSuccess') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card ">
                        <div class="card-header text-secondary">
                            <h4>Information</h4>
                        </div>




                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Buyer Name
                                        </td>
                                        <td class="fw-normal">{{ $buyer->buyer_name }}</td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Buyer NRC</td>
                                        <td class="fw-normal">{{ $buyer->buyer_nrc }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Type</td>
                                        <td class="fw-normal">{{ $cardata->car_type }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Model</td>
                                        <td class="fw-normal">{{ $cardata->car_model }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Number</td>
                                        <td class="fw-normal">{{ $cardata->car_number }}</td>
                                    </tr>

                                    <tr>

                                        <td class="fw-light" style="width:300px">Car Image</td>
                                        <td> <a target="_blank" href="{{ asset('carimage/' . $cardata->car_images) }}">
                                                <img src="{{ asset('carimage/' . $cardata->car_images) }}"
                                                    alt="" width="65px">
                                            </a>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card ">
                        <div class="card-header text-secondary">
                            <button type="button" class="btn btn-default text-white" data-toggle="modal"
                                data-target="#modal-default" style="background-color: #C82333">
                                Add Payment
                            </button>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add payment</h4>

                                        </div>
                                        <form action="{{ url('Add_Payment', $buyer->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group col-12">
                                                    <label for="price"> Payment Date</label>
                                                    <input type="text" class="form-control" id="payment_date"
                                                        name="payment" placeholder="Enter Add Payment">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="price">Add Payment</label>
                                                    <input type="text" class="form-control" id="add_payment"
                                                        name="add_payment" placeholder="Enter Add Payment">
                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-12">
                                                    <label for="car_id">Car Type</label>
                                                    <input type="text" name="car_id" class="form-control"
                                                        id="car_id" placeholder="Enter Buying Price"
                                                        value="{{ $buyer->id }}">
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
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Buy Price
                                        </td>
                                        <td class="fw-normal">{{ $buy->price }}</td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Sell Price</td>
                                        <td class="fw-normal">{{ $buyer->selling }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Balance</td>
                                        <td class="fw-normal">{{ $buyer->balance }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="fw-light" style="width:300px">Car Model</td>
                                        <td class="fw-normal">{{ $cardata->car_model }}</td>
                                    </tr> --}}





                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                </main>
        </div>
    </div>


    </section>

    </div>



    </div>


    @include('master.footer')
