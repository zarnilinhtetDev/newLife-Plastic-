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
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}

                </div>
            @endif
            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/branch_list') }}">Payment</a>
                                </li>


                            </ol>
                            @if (session('updateStatus'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('updateStatus') }}
                                </div>
                            @endif
                            <div class="container my-5">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Payment Table
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Car Name / Plate Number</th>
                                                    <th>Owner Pay</th>
                                                    <th>Company Pay</th>
                                                    <th>Driver Pay</th>
                                                    <th>Profit</th>

                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($cars as $car)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $car->car_brand_name }} - {{ $car->plate_number }} </td>
                                                        <td>{{ $car->owner_pay }}</td>

                                                        <td>
                                                            @if ($car->branch)
                                                                {{ $car->branch->payment }}
                                                            @else
                                                                <span class="text-danger">Branch not assigned</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($car->driver)
                                                                {{ $car->driver->driver_pay }}
                                                            @else
                                                                <span class="text-danger">Driver not assigned</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @php
                                                                $profit = 0;

                                                                if ($car->branch) {
                                                                    $companyPay = is_numeric($car->branch->payment) ? $car->branch->payment : 0;
                                                                    $ownerPay = is_numeric($car->owner_pay) ? $car->owner_pay : 0;
                                                                    $driverPay = $car->driver && is_numeric($car->driver->driver_pay) ? $car->driver->driver_pay : 0;
                                                                    $profit = $companyPay - ($ownerPay + $driverPay);
                                                                }
                                                            @endphp

                                                            {{ $profit }}
                                                        </td>

                                                        <td>
                                                            <a href="{{ route('car.edit', $car->id) }}"
                                                                class="btn btn-success">
                                                                <i class="fa-solid fa-pen-to-square">Edit</i>
                                                            </a>

                                                            <form action="{{ route('car.destroy', $car->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Are you sure you want to delete this car and its payments?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    style="background: #C82333">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>

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
