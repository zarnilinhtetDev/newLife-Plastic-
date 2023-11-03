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
                                <li class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Cars</a></li>
                                <li class="breadcrumb-item active">Cars Edit</li>

                            </ol>
                            <div class="container my-5">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (session('update_success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('update_success') }}

                                            </div>
                                        @endif
                                        <div class="card  p-4">
                                            <form action="{{ url('/update_car', $carEdit->id) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label>Car Brand Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control text "
                                                                placeholder="Enter Car Name" name="car_brand_name"
                                                                value={{ $carEdit->car_brand_name }}>
                                                            @error('car_brand_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Car Type <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Enter Car Type" name="car_type"
                                                                value={{ $carEdit->car_type }}>
                                                            @error('car_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Car Model <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="car_model"
                                                                placeholder="Enter Car Model"
                                                                value={{ $carEdit->car_model }}>
                                                            @error('car_model')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Car Model Year <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="car_model_year" placeholder="Enter Car Model Year"
                                                                value={{ $carEdit->car_model_year }}>
                                                            @error('car_model_year')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Car Color <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="car_color"
                                                                placeholder="Enter Car Color"
                                                                value={{ $carEdit->car_color }}>
                                                            @error('car_color')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Capacity <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control"
                                                                name="car_capacity" placeholder="Enter Car Capacity"
                                                                value="{{ $carEdit->car_capacity }}">
                                                            @error('car_capacity')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Plate Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="plate_number" placeholder="Enter Car Plate Number"
                                                                value="{{ $carEdit->plate_number }}">
                                                            @error('plate_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Mileage <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="number" class="form-control" name="mileage"
                                                                placeholder="Enter Car Mileage"
                                                                value="{{ $carEdit->mileage }}">
                                                            @error('mileage')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Fuel Type <span
                                                                    class="text-danger">*</span></label> <br>
                                                            <input type="text" class="form-control" name="fuel_type"
                                                                placeholder="Enter Car Mileage"
                                                                value="{{ $carEdit->fuel_type }}">

                                                            @error('fuel_type')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror


                                                        </div>

                                                    </div> --}}
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Engine Power <span
                                                                    class="text-danger">*</span></label> <br>
                                                            <input type="text" class="form-control"
                                                                name="engine_power" placeholder="Enter Car Engin Power"
                                                                value="{{ $carEdit->engine_power }}">

                                                            @error('engine_power')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror


                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 mt-3">


                                                        <div class="form-group">
                                                            <label for="pwd"> Car Images<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="p-1 " style="border:#d0d0db 1px solid">
                                                                <input type="file" class="form-control-file"
                                                                    id="exampleFormControlFile1" name="car_image">
                                                            </div>
                                                            <span class="text-danger">Old Image -
                                                                {{ $carEdit->car_image }}</span>
                                                            @error('car_image')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Owner Name <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="owner_name" placeholder="Enter Car owner name"
                                                                value="{{ $carEdit->owner_name }}">
                                                            @error('owner_name')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Phone Number <span
                                                                    class="text-danger ">*</span></label>
                                                            <input type="tel" class="form-control "
                                                                name="phone_number"
                                                                placeholder="Enter Car Owner Phone Number"
                                                                value="{{ $carEdit->phone_number }}">
                                                            @error('phone_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">NRC Number <span
                                                                    class="text-danger ">*</span></label>
                                                            <input type="text" class="form-control "
                                                                name="nrc_number"
                                                                placeholder="Enter Car Owner NRC Number"
                                                                value="{{ $carEdit->nrc_number }}">
                                                            @error('nrc_number')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Address <span
                                                                    class="text-danger ">*</span></label>
                                                            <input type="text" class="form-control "
                                                                name="address"
                                                                placeholder="Enter Car Owner NRC Number"
                                                                value="{{ $carEdit->address }}">
                                                            @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">

                                                        <div class="form-group">
                                                            <label for="pwd"> Owner ID (NRC/Driving
                                                                Lisense - Front )<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="p-1 " style="border:#d0d0db 1px solid">
                                                                <input type="file" class="form-control-file"
                                                                    id="exampleFormControlFile1"
                                                                    name="owner_id_front">
                                                            </div>
                                                            <span class="text-danger">Old
                                                                Image - {{ $carEdit->owner_id_front }}</span>
                                                            @error('owner_id_front')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">

                                                        <div class="form-group">

                                                            <label for="pwd"> Owner ID (NRC/Driving
                                                                Lisense - Back)<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="p-1 " style="border:#d0d0db 1px solid">
                                                                <input type="file" class="form-control-file"
                                                                    id="exampleFormControlFile1" name="owner_id_back">
                                                            </div>
                                                            <span class="text-danger">Old
                                                                Image - {{ $carEdit->owner_id_back }}</span>
                                                            @error('owner_id_back')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Owner Payment <span
                                                                    class="text-danger ">*</span></label>
                                                            <input type="text" class="form-control "
                                                                name="owner_pay" value="{{ $carEdit->owner_pay }}">
                                                            @error('owner_pay')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mt-3">
                                                        <!-- textarea -->
                                                        <div class="form-group">
                                                            <label>Message</label>
                                                            <textarea class="form-control" rows="3" placeholder="Enter ..." style="border-color:#d0d0db" name="message"></textarea>
                                                        </div>
                                                    </div>



                                                </div>


                                                {{-- <button type="submit" class="btn btn-danger">Register</button> --}}
                                                <button class="btn btn-primary mt-3">Update </button>
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
