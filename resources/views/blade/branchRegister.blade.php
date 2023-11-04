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
                                <li class="breadcrumb-item active"><a href="{{ url('/branch_list') }}">Branch</a></li>
                                <li class="breadcrumb-item active">Branch Register</li>

                            </ol>


                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-4">


                                            <form action="{{ url('branch_register') }}" method="POST">
                                                @csrf

                                                <div class="form-group ">
                                                    <label for="company_id">Company</label>
                                                    <select class="form-control" name="company_id">
                                                        <option value="">Select a Company</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{ $company->id }}">{{ $company->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('company_id')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>


                                                <div class="form-group mt-3">
                                                    <label>Branch Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter Branch Name" name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>


                                                <div class="form-group mt-3">
                                                    <label for="exampleInputPassword1">Phone Number <span
                                                            class="text-danger ">*</span></label>
                                                    <input type="tel" class="form-control " name="phone_number"
                                                        placeholder="Enter Branch Phone Number">
                                                    @error('phone_number')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="exampleInputPassword1">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control"
                                                        placeholder="Enter Branch Email" name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="exampleInputPassword1">Address</label>
                                                    <input type="text" class="form-control" name="address"
                                                        placeholder="Enter Branch address">
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="exampleInputPassword1">Location</label>
                                                    <input type="text" class="form-control" name="location"
                                                        placeholder="Enter Branch City">
                                                    @error('location')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <button type="" class="btn btn-primary mt-3">Register</button>
                                        </div>
                                    </div>

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
