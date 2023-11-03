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
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4 mt-4">
                        {{-- <h1 class="mt-4">Tables</h1> --}}
                        <ol class="breadcrumb mb-4 ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/company_list') }}">Company</a></li>
                        </ol>
                        @if (session('deleteStatus'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('deleteStatus') }}
                            </div>
                        @endif

                        @if (session('updateStatus'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('updateStatus') }}
                            </div>
                        @endif

                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container-fluid my-6">
                            <div class="row">

                                <div class="col-md-12 my-4">

                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ url('/company_register') }}" class="btn btn-primary ml-auto">
                                            Company Register</a> &nbsp;
                                        <a href="{{ url('/branch_list') }}" class="btn btn-warning ">Branch List</a>
                                    </div>

                                </div>

                            </div>
                        </div>



                        <div class="card my-6">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Company Table

                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Company Name</th>
                                            <th>Phone Number</th>
                                            <th>Email</th>
                                            <th>Address</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                        @endphp
                                        @foreach ($showCompany_data as $list)
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $list->name }}</td>
                                                <td>{{ $list->phone_number }}</td>
                                                <td>{{ $list->email }}</td>
                                                <td>{{ $list->address }}</td>



                                                <td>
                                                    <a href="{{ url('company_edit', $list->id) }}"
                                                        class="btn btn-success"><i
                                                            class="fa-solid fa-pen-to-square"></i></a><br>
                                                    <a href="{{ url('company_delete', $list->id) }}"
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


    @include('backend.script')
</body>

</html>
