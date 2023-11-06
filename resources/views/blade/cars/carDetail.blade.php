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
                @if (session('offerSuccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('offerSuccess') }}
                </div>
            @endif
                <div class="card">
                    <div class="card p-4">
                        <div class="card-header" style="">
                            <h4 style="font-size: 18px" class="fw-semibold">
                                <a href="{{ url('Buying_Price', $carDetail->id) }}"
                                    class="btn btn-primary btn-default  text-white btn-outline-accent-5 btn-md "
                                    data-toggle="modal" style = "background-color:#007BFF"
                                    data-target="#modal-default">
                                    Buying Price</a>
                                    <a href="{{ url('Buying_Price', $carDetail->id) }}"
                                        class="btn btn-primary btn-default  text-white btn-outline-accent-5 btn-md "
                                        data-toggle="modal" style = "background-color:#007BFF"
                                        data-target="#modal-default1">
                                        Offer Price</a>
                                        <a href="{{ url('car_expense', $carDetail->id) }}"
                                            class="btn btn-primary btn-default  text-white btn-outline-accent-5 btn-md "
                                           style = "background-color:#007BFF"
                                            >
                                            Car Expense</a>

                            </h4>
                        </div>



                        <div class="modal fade" id="modal-default1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Offer Price</h4>

                                    </div>
                                    <form action="{{ url('Offer_Price', $carDetail->id) }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group col-12">
                                                <label for="price">Offer Price</label>
                                                <input type="text" class="form-control" id="offer_price"
                                                    name="offer_price" placeholder="Enter Offer Price">
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
                                   <div class="alert success" role="alert">

                                    @if (isset($offerprice))

                                    Current Offer Price -   {{ $offerprice->offer_price}}
                                    @else
                                    N/A
                                    @endif
                                   </div>
                                </div>

                            </div>

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
                                   <div class="alert success" role="alert">
                                   {{-- {{ $buyprice->price }} --}}
                                    @if (isset($buyprice))

                                    Current Buying Price -   {{ $buyprice->price}}
                                    @else
                                    N/A
                                    @endif
                                   </div>
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
                                        <td>  <a target="_blank" href="/carimage/{{ $carDetail->car_images }}">
                                            <img src="{{ asset('carimage/' . $carDetail->car_images) }}" alt="" width="65px">
                                        </a>
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
                    <div class="row mt-6">
                        <div class="col-md-12">
                            <div class="card p-4">
                                <div class="card-header p-4" style="">
                                    <h1 style="font-size: 18px" class="fw-semibold">Price Details</h1>
                                </div>
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Buying Price</td>
                                        <td class="fw-normal">

                                            {{-- @if ($buyprice)
                                            <td class="fw-normal">{{ $buyprice->price }}</td>
                                        @else
                                            <td class="fw-normal">N/A</td>
                                        @endif --}}
                                        @if ($buyprice)
                                        {{ $buyprice->price }}</td>
                                        @else
                                        N/A
                                        @endif

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Offer Price</td>
                                        <td class="fw-normal">
                                            @if (isset($offerprice))

                                            {{ $offerprice->offer_price}}
                                            @else
                                            N/A
                                            @endif

                                        </td>

                                    </tr>
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
