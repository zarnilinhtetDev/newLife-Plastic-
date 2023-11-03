@extends('backend.header')

<body class="sb-nav-fixed">
    @include('backend.nav')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('backend.sidebar')
            </nav>
        </div>
        <div style="width: 100%;">
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-4">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item">Add Driver</li>

                        </ol>
                        <div class="container my-5">



                            <div class="container mt-5 text-center">
                                <form action="{{ route('associate-driver', ['id' => $car->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                        <div class="form-group">
                                            <label for="driver">Select a Driver:</label>
                                            <select name="driver_id" id="driver" class="form-control">
                                                <option value="">Select a Driver</option>
                                                @foreach ($drivers as $driver)
                                                    <option value="{{ $driver->id }}" class="text-black">
                                                        {{ $driver->driver_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <input type="hidden" name="car_id" value="{{ $car->id }}">
                                    </div>
                                    <button class="btn btn-primary">Add Driver</button>
                                </form>
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

    @include('backend.script')
</body>

</html>
