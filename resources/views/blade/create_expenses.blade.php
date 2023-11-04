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
                                <li class="breadcrumb-item active"><a href="{{ url('/company_expenses') }}">Company
                                        Expenses</a></li>
                                <li class="breadcrumb-item active">Create Company Expenses</li>

                            </ol>
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="container my-5">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card  p-4">
                                            <form action="{{ url('store_expenses') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Description</label>
                                                            <textarea class="form-control" name="description" value="{{ old('description') }}" rows="3"
                                                                placeholder="Enter ..." style="border-color:#6B7280"></textarea>
                                                        </div>
                                                        @error('description')
                                                            <span class="text-danger"> {{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="pwd">Company Vouncher<span
                                                                    class="text-danger">*</span></label>
                                                            <div class=" p-1 " style="border:#d0d0db 1px solid">
                                                                <input type="file" class="form-control-file"
                                                                    id="exampleFormControlFile1"
                                                                    name="company_vouncher">
                                                            </div>
                                                            @error('company_vouncher')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Amount <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="amount"
                                                                placeholder="Enter Amount" value="{{ old('amount') }}">
                                                            @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class=" mt-3 text-white btn btn-info"
                                                    style="background-color:blue">Submit</button>
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
