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
                                <li class="breadcrumb-item active">Company Expenses Edit</li>

                            </ol>
                            <div class="row ">
                                <div class="col-lg-12 offset-3 mt-4 card">

                                    <div class="p-4">
                                        <form action="{{ url('update_expenses', $expense->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <!-- textarea -->
                                                    <div class="form-group  mt-3">
                                                        <label for="exampleInputPassword1">Description</label>
                                                        <textarea class="form-control" name="description" rows="3" placeholder="" style="border-color:#6B7280">{{ $expense->description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6   mt-3">
                                                    <div class="form-group">
                                                        <label for="pwd">Company Vouncher<span
                                                                class="text-danger">*</span></label>
                                                        <div class="border border-dark p-1 ">
                                                            <input type="file" class="form-control-file"
                                                                id="exampleFormControlFile1" name="company_vouncher">
                                                        </div>
                                                        <div class="text-danger">Company
                                                            Vouncher: {{ $expense->company_vouncher }}"</div>
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
                                                            value="{{ $expense->amount }}" placeholder="Enter Amount">
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
