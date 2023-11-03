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
                                <li class="breadcrumb-item active"><a href="{{ url('/Driver') }}">Drivers</a>
                                </li>
                                <li class="ml-auto">&nbsp; / Driver Edit</li>

                            </ol>
                            <div class="container my-5">

                                <div class="row">
                                    <div class="col-md-6 offset-3">
                                        <div class="card  p-4">
                                            <form action="{{ url('/update_driver', $editDriver->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="  form-group">
                                                    <label for="exampleInputEmail1">Driver Name</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="driver_name"
                                                        value="{{ $editDriver->driver_name }}">


                                                </div>
                                                <div class=" form-group mt-3">
                                                    <label for="exampleInputEmail1">Phone Number</label>
                                                    <input type="tel" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="phone_number"
                                                        value="{{ $editDriver->phone_number }}">

                                                </div>
                                                <div class=" form-group mt-3">
                                                    <label for="exampleInputEmail1">Address</label>
                                                    <input type="tel" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="address"
                                                        value="{{ $editDriver->address }}">

                                                </div>
                                                <div class=" form-group mt-3">
                                                    <label for="exampleInputEmail1">NRC</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="driver_nrc"
                                                        value="{{ $editDriver->driver_nrc }}">

                                                </div>
                                                <div class=" form-group mt-3">
                                                    <div class="form-group">

                                                        <label for="pwd"> Driver ID (NRC/Driving
                                                            Lisense - Front)<span class="text-danger">*</span></label>
                                                        <div class=" p-1 " style="border:#d0d0db 1px solid">
                                                            <input type="file" class="form-control-file"
                                                                id="exampleFormControlFile1" name="driver_id_front">
                                                        </div>
                                                        <span class="text-danger"> Old Photo -
                                                            {{ $editDriver->driver_id_front }}</span>

                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <div class="form-group">

                                                        <label for="pwd"> Driver ID (NRC/Driving
                                                            Lisense - Back)<span class="text-danger">*</span></label>
                                                        <div class=" p-1 " style="border:#d0d0db 1px solid">
                                                            <input type="file" class="form-control-file"
                                                                id="exampleFormControlFile1" name="driver_id_back">
                                                        </div>
                                                        <span class="text-danger"> Old Photo -
                                                            {{ $editDriver->driver_id_back }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group mt-3">
                                                    <div class="form-group">

                                                        <label for="pwd"> Driver Payment<span
                                                                class="text-danger">*</span></label>
                                                        <div class="">
                                                            <input type="text" class="form-control file"
                                                                id="exampleFormControlFile1" name="driver_pay"
                                                                value="{{ $editDriver->driver_pay }}">
                                                        </div>

                                                    </div>
                                                </div>
                                                <button type="submit" class="btn mt-3 btn-primary"
                                                    style="background-color: #0069D9">Update Driver</button>
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
