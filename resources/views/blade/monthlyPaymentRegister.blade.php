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
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/monthly_payment') }}">Monthly
                                        Payment</a>
                                <li class="breadcrumb-item active">Monthly
                                    Payment Regiter
                                </li>


                            </ol>
                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}

                                            </div>
                                        @endif --}}
                                        <div class="card  p-4">
                                            <form action="{{ url('/monthly_payment/store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="car_id">Car</label>

                                                            <select class="form-control" name="car_id">
                                                                <option value="">Select a Car</option>
                                                                @foreach ($cars as $car)
                                                                    <option value="{{ $car->id }}">
                                                                        {{ $car->car_brand_name }} -
                                                                        {{ $car->plate_number }}</option>
                                                                @endforeach
                                                            </select>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">

                                                        <div class="form-group">
                                                            <label>Company Pay<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Company Pay" name="company_pay"
                                                                value={{ old('company_pay') }}>
                                                            @error('company_pay')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Company Pay Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control"
                                                                name="company_date" value={{ old('company_date') }}>
                                                            @error('company_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Owner Pay <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="owner_pay"
                                                                placeholder="Enter Owner Pay"
                                                                value={{ old('owner_pay') }}>
                                                            @error('owner_pay')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Owner Pay Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control" name="owner_date"
                                                                placeholder="Enter Car Model Year"
                                                                value="{{ old('owner_date') }}">
                                                            @error('owner_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Driver Pay <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="driver_pay"
                                                                placeholder="Enter Driver Pay"
                                                                value="{{ old('driver_pay') }}">
                                                            @error('driver_pay')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Driver Pay Date <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="date" class="form-control"
                                                                name="driver_date" value="{{ old('driver_date') }}">
                                                            @error('driver_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Car Expenses <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="car_expense" placeholder="Enter Car Expenses"
                                                                value="{{ old('car_expense') }}">
                                                            @error('car_expense')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>


                                                {{-- <button type="submit" class="btn btn-danger">Register</button> --}}
                                                <button class="btn btn-primary mt-3">Register</button>
                                            </form>
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

</body>

</html>


</div>
</div>


@include('backend.script')
</body>

</html>
