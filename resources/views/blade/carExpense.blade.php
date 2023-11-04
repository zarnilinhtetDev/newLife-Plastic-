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

            <body class="sb-nav-fixed">

                <div id="layoutSidenav">

                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid px-4 mt-4">
                                {{-- <h1 class="mt-4">Tables</h1> --}}
                                <ol class="breadcrumb mb-4 ">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/car_expenses') }}">Car
                                            Expenses</a></li>
                                </ol>
                                @if (session()->has('status'))
                                    <div class="alert alert-success">
                                        {{ session()->get('status') }}
                                    </div>
                                @endif
                                @if (session('updateStatus'))
                                    <div class="alert alert-success alert-dismissible fade show"role="alert">
                                        {{ session('updateStatus') }}
                                    </div>
                                @endif

                                @if (session('deleteStatus'))
                                    <div class="alert alert-danger alert-dismissible fade show"role="alert">
                                        {{ session('deleteStatus') }}
                                    </div>
                                @endif
                                <div class=" mb-4">
                                    <div class="d-flex justify-content-end">

                                        <a href="{{ url('/carExpenseShow') }}" class="btn btn-primary ml-auto">Add Car
                                            Expenses
                                        </a>
                                    </div>

                                </div>


                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Car Expenses Table
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <th>No</th>
                                                <th>Car</th>
                                                <th>Description</th>
                                                <th>Car Vouncher</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($expense as $expenses)
                                                    <tr>
                                                        <td>{{ $no }}</td>

                                                        <td>
                                                            @if ($expenses->car)
                                                                {{ $expenses->car->car_brand_name }} -
                                                                {{ $expenses->car->plate_number }}
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td>{{ $expenses->description }}</td>
                                                        <td>

                                                            <a target="_blank"
                                                                href="/carvouncher/{{ $expenses->car_vouncher }}"><img
                                                                    src="/carvouncher/{{ $expenses->car_vouncher }}"
                                                                    alt="" width="65px"></a>
                                                        </td>
                                                        </td>
                                                        <td>{{ $expenses->amount }}</td>
                                                        <td>
                                                            <a href="{{ url('carExpense_edit', $expenses->id) }}"
                                                                class="btn btn-success"><i
                                                                    class="fa-solid fa-pen-to-square"></i></a>

                                                            <a href="{{ url('carExpense_delete', $expenses->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this user ?')"><i
                                                                    class="fa-solid fa-trash"></i></a>
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

            </body>

        </div>
    </div>


    @include('backend.script')
</body>

</html>
