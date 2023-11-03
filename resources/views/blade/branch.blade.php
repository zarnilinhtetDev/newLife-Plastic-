@include('backend.header')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<body class="sb-nav-fixed">


    @include('backend.nav')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('backend.sidebar')
            </nav>
        </div>
        <div id="" style="width:100%">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4">
                        {{-- <h1 class="mt-4">Tables</h1> --}}
                        <ol class="breadcrumb mb-4 ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/branch_list') }}">Branch List</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/branch_list') }}">Branch </a></li>

                        </ol>
                        @if (session('deleteStauts'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('deleteStauts') }}
                            </div>
                        @endif
                        @if (session('success_car'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success_car') }}
                            </div>
                        @endif
                        @if (session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('update') }}
                            </div>
                        @endif
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class=" mb-4">

                            <div class="d-flex justify-content-between">

                                <a href="{{ url('/branch_register') }}" class="btn btn-primary ml-auto">Branch
                                    Register</a>

                            </div>

                        </div>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Branch Table
                            </div>
                            <div class="card-body">

                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Company Name</th>

                                            <th>Branch Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>

                                            <th>Location</th>
                                            <th>Payment</th>
                                            <th>Cars / Payment</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                        @endphp
                                        @foreach ($showBranch_data as $data)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    @if ($data->company)
                                                        <p> {{ $data->company->name }}</p>
                                                    @else
                                                        <p>Company: N/A</p>
                                                    @endif
                                                </td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->phone_number }}</td>
                                                <td>{{ $data->email }}</td>
                                                <td>{{ $data->address }}</td>


                                                <td>{{ $data->location }}</td>
                                                <td>

                                                    <span> {{ $data->payment }}</span> <br>

                                                    <form
                                                        action="{{ route('associateCarBranch', ['id' => $data->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal fade" id="myModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">

                                                                        <h5 class="modal-title">Add Payment</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <label for="payment">Payment</label>
                                                                                <input type="text" name="payment"
                                                                                    class="form-control" id="payment"
                                                                                    placeholder="Enter Payment">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            style="background-color: red"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary"
                                                                            style="background-color: #0069D9">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </td>
                                                <td>{{ $data->car ? $data->car->car_brand_name : 'N/A' }} <br><br>


                                                    <a href="{{ url('addCarBranch', $data->id) }}"
                                                        class="btn btn-success"> <i
                                                            class="fa-solid fa-circle-plus"></i></a>
                                                    <a href="{{ route('disassociate-car', ['id' => $data->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to disassociate this car from the branch?')">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </a>

                                                </td>
                                                <td>
                                                    <a href="{{ url('branch_edit', $data->id) }}"
                                                        class="btn btn-success"><i
                                                            class="fa-solid fa-pen-to-square"></i></a><br>
                                                    <a href="{{ url('branch_delete', $data->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this car information ?')"><i
                                                            class="fa-solid fa-trash"></i></a><br>
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
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SSE@2023</div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('backend.script')
</body>

</html>
