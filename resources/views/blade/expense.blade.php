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
            {{-- @include('blade.cars') --}}
            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ url('/Expenses') }}">Expenses</a>
                                </li>
                                <li class="ml-auto">Expense Register</li>

                            </ol>
                            <div class="container my-5">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}

                                    </div>
                                @endif


                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-4">
                                            <div class=" my-6">
                                                @if (session('expenseSuccess'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert">
                                                        {{ session('expenseSuccess') }}

                                                    </div>
                                                @endif
                                                <form action="{{ url('/expenses') }}" method="post">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Amount <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="amount" value="{{ old('amount') }}">
                                                        @error('amount')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="exampleInputEmail1">Branch <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                                            name="branch" value="{{ old('branch') }}">
                                                        @error('branch')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="exampleInputPassword1">Message</label>
                                                        <div class="form-group">

                                                            <textarea class="form-control" value="{{ old('message') }}" name="message" id="exampleFormControlTextarea1"
                                                                rows="3"></textarea>
                                                        </div>
                                                        @error('message')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #0069D9">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @if (session('delete_success'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('delete_success') }}

                                        </div>
                                    @endif
                                    <div class="card-header mt-5">
                                        <i class="fas fa-table me-1"></i>
                                        Expense Tables
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple" class="">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Amount</th>
                                                    <th>Branch</th>
                                                    <th>Message</th>
                                                    <th>Create Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($expenses as $expense)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $expense->amount }}</td>
                                                        <td>{{ $expense->branch }}</td>
                                                        <td>{{ $expense->message }}</td>

                                                        <td>
                                                            {{ $expense->created_at->format('Y-m-d h:i A') }}
                                                            ({{ $expense->created_at->diffForHumans() }})
                                                        </td>




                                                        <td>


                                                            <a href="{{ url('/edit_expense', $expense->id) }}"
                                                                class="btn btn-success"> Edit</a>
                                                            <a href="{{ url('delete_expense', $expense->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this expense data ?')">Delete</a>


                                                        </td>

                                                    </tr>
                                                    @php
                                                        $no++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
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
