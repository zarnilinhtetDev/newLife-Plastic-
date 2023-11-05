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
                    <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <!-- Main content -->
            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6">
                                <h1>Cars Detail</h1>
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
                @if (session('buySuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('buySuccess') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card p-4">
                        <div class="card-header" style="">
                            <h4 style="font-size: 18px" class="fw-semibold">
                                <a href="{{ url('Buying_Price', $carDetail->id) }}"
                                    class="btn btn-primary btn-default  text-white btn-outline-accent-5 btn-md "
                                    data-toggle="modal" style = "background-color:#007BFF"
                                    data-target="#modal-default"><i class="fa-solid fa-cart-shopping text-white"></i>
                                    Buying Price</a>
                            </h4>
                        </div>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Buying Price</h4>

                                    </div>
                                    <form action="{{ url('Buying_Price', $carDetail->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group col-12">
                                                <label for="price">Buying Price</label>
                                                <input type="text" class="form-control" id="price"
                                                    name="price">
                                            </div>
                                        </div>
                                        <div class="modal-body" style="display: none">
                                            <div class="form-group col-12">
                                                <label for="car_id">Car Type</label>
                                                <input type="text" name="car_id" class="form-control" id="car_id"
                                                    value="{{ $carDetail->id }}" placeholder="Enter Buying Price">
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
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Type
                                        </td>
                                        <td class="fw-normal">{{ $carDetail->car_type }}</td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Model</td>
                                        <td class="fw-normal">{{ $carDetail->car_model }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Manufacture Years</td>
                                        <td class="fw-normal">{{ $carDetail->manufacture_year }}</td>
                                    </tr>



                                    <tr>

                                        <td class="fw-light" style="width:300px">License Expire</td>
                                        <td class="fw-normal">{{ $carDetail->License_expire }}</td>
                                    </tr>

                                    <tr>

                                        <td class="fw-light" style="width:300px"> Car Color</td>
                                        <td class="fw-normal">{{ $carDetail->car_color }}</td>
                                    </tr>

                                    <tr>

                                        <td class="fw-light" style="width:300px">Car Image</td>
                                        <td><a target="_blank" href="/carimage/{{ $carDetail->car_images }}"><img
                                                    style="width: 200px" src="/carimage/{{ $carDetail->car_images }}"
                                                    alt=""></a>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td class="fw-light" style="width:300px"> Description</td>
                                        <td class="fw-normal">{{ $carDetail->description }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row mt-6">
                        <div class="col-md-12">
                            <div class="card p-4">
                                <div class="card-header p-4" style="">
                                    <h1 style="font-size: 18px" class="fw-semibold">Owner Details</h1>
                                </div>
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Owner Name</td>
                                        <td class="fw-normal"></td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">NRC Number</td>
                                        <td class="fw-normal"></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Owner Address</td>
                                        <td class="fw-normal"></td>

                                    </tr>
                                    <tr>

                                        <td class="fw-light" style="width:300px">Owner ID(NRC /Driving Lincense
                                            -
                                            Front)</td>
                                        {{-- <td><a target="_blank" href="/frontID/{{ $data->owner_id_front }}"><img
                                                    style="width: 200px" src="/frontID/{{ $data->owner_id_front }}"
                                                    alt=""></a>
                                        </td>
                                    </tr>

                                    <tr>

                                    <td class="fw-light" style="width:300px">Owner ID(NRC /Driving Lincense
                                            -
                                            Back)</td>
                                 <td><a target="_blank" href="/backID/{{ $data->owner_id_back }}"><img
                                                    style="width: 200px" src="/backID/{{ $data->owner_id_back }}"
                                                    alt=""></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                </div>
                </main>
        </div>
    </div>


    </section>

    </div>



    </div>


    @include('master.footer')
