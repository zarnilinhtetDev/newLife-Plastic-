<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<body class="sb-nav-fixed">

    <div id="layoutSidenav">

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    {{-- <h1 class="mt-4">Tables</h1> --}}
                    <ol class="breadcrumb mb-4 ">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Cars</a></li>
                    </ol>
                    @if (session('success_driver'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success_driver') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}

                        </div>
                    @endif
                    <div class="container-fluid my-6">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="{{ route('file-import-car') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-6">
                                        <div class="custom-file text-left p-1" style="border:#d0d0db 1px solid">
                                            <input type="file" name="file" class="custom-file-input"
                                                id="customFile">

                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-3">Import data</button>
                                    <a class="btn btn-success  mt-3" href="{{ route('file-export-car') }}">Export
                                        data</a>
                                </form>
                            </div>
                            <div class="col-md-12 ">
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ url('/Car_Register') }}" class="btn btn-primary">Cars Register</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @if (session('update_success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('update_success') }}

                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}

                        </div>
                    @endif
                    @if (session('delete_success'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete_success') }}

                        </div>
                    @endif
                    <div class="card mb-4 mt-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Cars Table
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th> Brand </th>
                                        <th> Model</th>
                                        <th>Plate Number</th>
                                        <th>Owner Name</th>
                                        <th>Phone Number</th>
                                        <th>Owner Payment</th>
                                        <th>Address</th>
                                        <th>Driver</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $no = '1';
                                    @endphp
                                    @foreach ($show as $shows)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $shows->car_brand_name }} </td>
                                            <td>{{ $shows->car_model }}</td>
                                            <td>{{ $shows->plate_number }}</td>
                                            <td>{{ $shows->owner_name }}</td>
                                            <td>{{ $shows->phone_number }}</td>
                                            <td>{{ $shows->owner_pay }}</td>
                                            <td>{{ $shows->address }}</td>


                                            <td>{{ $shows->driver ? $shows->driver->driver_name : 'N/A' }} <br><br>
                                                <a href="{{ url('addDriver', $shows->id) }}" class="btn btn-success">
                                                    <i class="fa-solid fa-circle-plus"></i></a>
                                                <a href="{{ url('associate-driver-delete', $shows->id) }}) }}"
                                                    class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this car driver ?')"><i
                                                        class="fa-solid fa-xmark"></i></a>



                                                </a>

                                                </a>
                                            </td>

                                            <td>


                                                <a href="{{ url('edit_car', $shows->id) }}" class="btn btn-success"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ url('delete_car', $shows->id) }}" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this car information ?')"><i
                                                        class="fa-solid fa-trash"></i></a>
                                                <a href="{{ url('carDetail', $shows->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-eye"></i></a>
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

    <script>
        document.getElementById("customFile").addEventListener("change", function() {
            const selectedFile = this.files[0];
            this.nextElementSibling.textContent = selectedFile ? selectedFile.name : "Choose file";
        });
    </script>
</body>
