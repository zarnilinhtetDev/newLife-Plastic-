@include('backend.header')



<body class="sb-nav-fixed">


    @include('backend.nav')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('backend.sidebar')
            </nav>
        </div>
        <div id="" style="width:100%">



            {{-- <body class="sb-nav-fixed"> --}}

            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">

                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/payment') }}">Payment</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Payment</li>

                            </ol>

                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-4">
                                            <form action="{{ route('car.update', $car->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group ">
                                                    <label for="owner_payment">Owner Payment</label>
                                                    <input type="text" class="form-control" name="owner_payment"
                                                        id="owner_payment" value="{{ $car->owner_pay }}">
                                                </div>
                                                <div class="form-group mt-3">
                                                    <label for="company_payment">Company Payment</label>
                                                    <input type="text" name="company_payment" id="company_payment"
                                                        class="form-control"
                                                        value="{{ $car->branch ? $car->branch->payment : '' }}">
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="driver_payment">Driver Payment</label>
                                                    <input type="text" name="driver_payment" id="driver_payment"
                                                        class="form-control"
                                                        value="{{ optional($car->driver)->driver_pay }}">
                                                </div>

                                                <button type="submit" class="mt-3 btn btn-primary"
                                                    style="background-color:#0069D9">Save Changes</button>
                                            </form>
                                            {{-- <form action="{{ route('car.update', $car->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="form-group">
                                                    <label>Owner Payment<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                       name="name"
                                                        value="{{ $car->owner_pay }}">

                                                </div>
                                            </form> --}}
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                </div>

            </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    </div>
    </div>

    </div>

    </div>


</body>

</html>


</div>
</div>


@include('backend.script')
</body>

</html>
