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
                                    <li class="breadcrumb-item active">Company
                                        Expenses</>
                                    </li>
                                </ol>
                                @if (session()->has('expenses_success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('expenses_success') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show"role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('deleteStatus'))
                                    <div class="alert alert-danger alert-dismissible fade show"role="alert">
                                        {{ session('deleteStatus') }}
                                    </div>
                                @endif
                                <div class=" mb-4">
                                    <div class="d-flex justify-content-end">

                                        <a href="{{ url('/create_expenses') }}" class="btn btn-primary ml-auto">Add
                                            Company Expenses
                                        </a>
                                    </div>

                                </div>

                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Company Expenses Table
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                            <thead>
                                                <th>No</th>
                                                <th>Description</th>
                                                <th>Company Vouncher</th>
                                                <th>Amount</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($expenses as $expense)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $expense->description }}</td>
                                                        <td><a target="_blank"
                                                                href="/companyvouncher/{{ $expense->company_vouncher }}"><img
                                                                    src="/companyvouncher/{{ $expense->company_vouncher }}"
                                                                    alt="" width="65px"></a></td>

                                                        </td>
                                                        <td>{{ $expense->amount }}</td>
                                                        <td>
                                                            <a href="{{ url('edit_expenses', $expense->id) }}"
                                                                class="btn btn-success"><i
                                                                    class="fa-solid fa-pen-to-square">Edit</i></a>
                                                            {{-- <a href="{{ url('show_expenses',$expense->id) }}" class="btn btn-warning">Detail</a> --}}
                                                            <a href="{{ url('destroy', $expense->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this user ?')"><i
                                                                    class="fa-solid fa-trash">Delete</i></a>
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
