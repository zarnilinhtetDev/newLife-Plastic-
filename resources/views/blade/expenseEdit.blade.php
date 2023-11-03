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

            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">
                          
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ url('/Expenses') }}">Expenses </a>
                                </li>
                                <li class="breadcrumb-item active">Expenses
                                    Edit
                                </li>


                            </ol>
                            <div class="container my-5">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}

                                    </div>
                                @endif


                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-6">
                                            <form action="{{ url('/update_expense', $expense->id) }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Amount</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="amount"
                                                        value="{{ $expense->amount }}">
                                                    <span class="text-danger">*</span>


                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Branch</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="branch"
                                                        value="{{ $expense->branch }}">
                                                    @error('branch')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Message</label>
                                                    <div class="form-group">

                                                        <textarea class="form-control" value="{{ $expense->message }}" name="message" id="exampleFormControlTextarea1"
                                                            rows="3"></textarea>
                                                    </div>
                                                    @error('message')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <button type="submit" class="btn btn-primary"
                                                    style="background-color: #0069D9">Update</button>
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
                                <div class="text-muted">Copyright &copy; SSE Web Solutions</div>
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


    @include('backend.script')
</body>

</html>
