@extends('backend.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                        <div class="">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"
                                        style="text-decoration: none;" class="text-black">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/company_list') }}"
                                        style="text-decoration: none;" class="text-black">Company</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('/branch_list') }}"
                                        style="text-decoration: none;" class="text-black">Branch List</a></li>
                                <li class="breadcrumb-item "><a
                                        href="{{ route('addCarBranch', ['id' => $branch->id]) }}"
                                        style="text-decoration: none;" class="text-black">Add Cars</a></li>
                            </ol>
                        </div>
                        <div class="container my-5">
                            <div class="container mt-5 text-center">
                                <form action="{{ route('associateCarBranch', ['id' => $branch->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                        <div class="form-group" id="carSelect">
                                            <label for="car_id">Select a Car:</label>
                                            <select name="car_id" id="car_id" class="form-control">
                                                <option value="">Select a Car</option>
                                                @foreach ($cars as $car)
                                                    <option value="{{ $car->id }}" class="text-black">
                                                        {{ $car->car_brand_name }} - {{ $car->plate_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Payment </label>
                                                <input type="text" class="form-control" name="payment"
                                                    style="height:38px;border-radius:6px; border:1px solid #CED4DA">
                                                @error('payment')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input type="hidden" name="branch_id" value="{{ $branch->id }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Car</button>
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
