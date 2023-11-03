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
                                <li class="breadcrumb-item"><a href="{{ url('/car_expenses') }}">Car Expenses</a></li>

                                <li class="breadcrumb-item active"><a href="{{ url('/carExpenseShow') }}">Car Expenses
                                        Register</a>
                                </li>
                                {{-- <li class="breadcrumb-item active">Branch Register</li> --}}

                            </ol>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-4">
                                            <form action="{{ route('carExpenseStore') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="car_id">Car</label>
                                                    <select class="form-control" name="car_id">
                                                        <option value="">Select a Car</option>
                                                        @foreach ($cars as $car)
                                                            <option value="{{ $car->id }}">
                                                                {{ $car->car_brand_name }} / {{ $car->plate_number }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="description">Description <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" name="description" placeholder="Enter Car Expense Description"></textarea>
                                                    @error('description')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="pwd">Car Vouncher<span
                                                            class="text-danger">*</span></label>
                                                    <div class=" p-1 " style="border:#d0d0db 1px solid">
                                                        <input type="file" class="form-control-file"
                                                            id="exampleFormControlFile1" name="car_vouncher">
                                                    </div>
                                                    @error('car_vouncher')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="amount">Amount <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="amount"
                                                        placeholder="Enter Car Expense Amount">
                                                    @error('amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary mt-3"
                                                    style="background-color: #0069D9">Submit</button>
                                            </form>

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
