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

            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Driver
                                    Attendance Edit</>
                                </li>
                            </ol>
                            <div class="container-fluid my-4">
                                <span class="font-weight-bold" style="font-size: 20px">Driver Name -
                                    {{ $driverAttendanceShow->driver->driver_name }}</span>
                            </div>

                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('updateStatus'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('updateStatus') }}

                                            </div>
                                        @endif
                                        <div class="card  p-4">
                                            <form
                                                action="{{ url('driver_attendanceUpdate', $driverAttendanceShow->id) }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf

                                                <h1 class="my-3 text-secondary" style="font-size: 20px">Start Form
                                                </h1>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="start_image">Start Image:</label>
                                                            <input type="file" name="start_image" id="start_image"
                                                                class="border border-dark p-2 form-control">
                                                            <div><span class="text-danger">Start Image :
                                                                    {{ $driverAttendanceShow->start_image }}</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="start_time">Start Time:</label>
                                                            <input type="datetime-local" name="start_time"
                                                                class="form-control" id="start_time"
                                                                value="{{ $driverAttendanceShow->start_time }}">
                                                        </div>
                                                    </div>

                                                    <h1 class="my-3 text-secondary" style="font-size: 20px">End Form
                                                    </h1>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="end_image">End Image:</label>
                                                            <input type="file" name="end_image" id="end_image"
                                                                class="border border-dark p-2 form-control">
                                                            <div><span class="text-danger">End Image :
                                                                    {{ $driverAttendanceShow->end_image }}</span> </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="end_time">End Time:</label>
                                                            <input type="datetime-local" name="end_time" id="end_time"
                                                                class="form-control"
                                                                value="{{ $driverAttendanceShow->end_time }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary mt-3">Update</button>
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

</body>

</html>


</div>
</div>


@include('backend.script')
</body>

</html>
