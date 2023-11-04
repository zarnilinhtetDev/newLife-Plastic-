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
                                <li class="breadcrumb-item active"><a href="{{ url('/Driver') }}">Driver</a>
                                </li>

                            </ol>
                            <div class="container-fluid my-5">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('success_driver'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success_driver') }}
                                    </div>
                                @endif
                                <div class="row mt-5">
                                    <div class="col-md-12 ">
                                        <div class="card  p-4 mb-4">
                                            <form action="{{ url('/Drivers') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class=" col-md-6 form-group ">
                                                            <label for="exampleInputEmail1">Driver Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="driver_name" value="{{ old('driver_name') }}">
                                                            @error('driver_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label for="exampleInputEmail1">Phone Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="phone_number" value="{{ old('phone_number') }}">
                                                            @error('phone_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group mt-3">
                                                            <label for="exampleInputEmail1">Address <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="tel" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="address" value="{{ old('address') }}">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 form-group mt-3">
                                                            <label for="exampleInputEmail1">NRC <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="driver_nrc" value="{{ old('driver_nrc') }}">
                                                            @error('driver_nrc')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6 mt-3 form-group">
                                                            <div class="form-group">

                                                                <label for="pwd"> Driver ID (NRC/Driving
                                                                    Lisense - Front) <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="p-1" style="border:#d0d0db 1px solid">
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1"
                                                                        name="driver_id_front">
                                                                </div>
                                                                @error('driver_id_front')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 mt-3 form-group">
                                                            <div class="form-group">

                                                                <label for="pwd"> Driver ID (NRC/Driving
                                                                    Lisense - Back) <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="p-1" style="border:#d0d0db 1px solid">
                                                                    <input type="file" class="form-control-file"
                                                                        id="exampleFormControlFile1"
                                                                        name="driver_id_back">
                                                                </div>
                                                                @error('driver_id_back')
                                                                    <p class="text-danger">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form-group mt-3">
                                                            <label for="exampleInputEmail1">Driver Payment <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                id="exampleInputEmail1" aria-describedby="emailHelp"
                                                                name="driver_pay" value="{{ old('driver_pay') }}">
                                                            @error('driver_pay')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn mt-3 btn-primary ml-3"
                                                    style="background-color: #0069D9">Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card my-6">
                                    @if (session('updateSuccess'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('updateSuccess') }}
                                        </div>
                                    @endif
                                    @if (session('delete_success'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('delete_success') }}
                                        </div>
                                    @endif
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Drivers Tables
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple" class="">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Driver Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                    <th>Payment</th>

                                                    <th>Driver NRC</th>
                                                    <th>ID (Front)</th>
                                                    <th>ID (Back)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($drivers as $driver)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $driver->driver_name }}</td>
                                                        <td>{{ $driver->phone_number }}</td>
                                                        <td>{{ $driver->address }}</td>
                                                        <td>{{ $driver->driver_pay }}</td>

                                                        <td>{{ $driver->driver_nrc }}</td>
                                                        <td><a target="_blank"
                                                                href="/driverFront/{{ $driver->driver_id_front }}"><img
                                                                    src="/driverFront/{{ $driver->driver_id_front }}"
                                                                    alt="" width="65px"></a></td>
                                                        <td><a target="_blank"
                                                                href="/driverBack/{{ $driver->driver_id_back }}">
                                                                <img src="/driverBack/{{ $driver->driver_id_back }}"
                                                                    alt="" width="65px"></a>
                                                        <td>
                                                            <a href="{{ url('/driver-attendance', $driver->id) }}"
                                                                class="btn btn-warning"> <i
                                                                    class="fa-solid fa-clipboard-user"></i></a>
                                                            <a href="{{ url('/edit_driver', $driver->id) }}"
                                                                class="btn btn-success"> <i
                                                                    class="fa-solid fa-pen-to-square"></i></a>

                                                            <a href="{{ url('/delete_driver', $driver->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this driver ?')"><i
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
