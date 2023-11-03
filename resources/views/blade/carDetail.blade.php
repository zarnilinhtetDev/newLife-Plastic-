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
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Cars</a></li>
                                <li class="breadcrumb-item active">Details</li>

                            </ol>

                            <div class="card p-4">
                                <div class="card-header" style="">
                                    <h4 style="font-size: 18px" class="fw-semibold">Car Details
                                        <a href="{{ url('edit_car', $data->id) }}"
                                            class="btn btn-primary btn-outline-accent-5 btn-md "><i
                                                class="fa fa-pencil"></i>
                                            Edit</a>
                                    </h4>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class='table table-bordered mt-4' style="font-size: 20">

                                            <tr>
                                                <td class="fw-light" style="width:300px">Brand Name
                                                </td>
                                                <td class="fw-normal">{{ $data->car_brand_name }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-light" style="width:300px">Car Type</td>
                                                <td class="fw-normal">{{ $data->car_type }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-light" style="width:300px">Car Years</td>
                                                <td class="fw-normal">{{ $data->car_model_year }}</td>
                                            </tr>



                                            <tr>

                                                <td class="fw-light" style="width:300px">Mileage</td>
                                                <td class="fw-normal">{{ $data->mileage }}</td>
                                            </tr>


                                            <tr>

                                                <td class="fw-light" style="width:300px">Car Image</td>
                                                <td><a target="_blank" href="/carimage/{{ $data->car_image }}"><img
                                                            style="width: 200px" src="/carimage/{{ $data->car_image }}"
                                                            alt=""></a>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-6">
                                <div class="col-md-12">
                                    <div class="card p-4">
                                        <div class="card-header p-4" style="">
                                            <h1 style="font-size: 18px" class="fw-semibold">Owner Details</h1>
                                        </div>
                                        <table class='table table-bordered mt-4' style="font-size: 20">

                                            <tr>
                                                <td class="fw-light" style="width:300px">Owner Name</td>
                                                <td class="fw-normal">{{ $data->owner_name }}</td>

                                            </tr>
                                            <tr>
                                                <td class="fw-light" style="width:300px">NRC Number</td>
                                                <td class="fw-normal">{{ $data->nrc_number }}</td>
                                            </tr>
                                            <tr>
                                                <td class="fw-light" style="width:300px">Owner Address</td>
                                                <td class="fw-normal">{{ $data->address }}</td>

                                            </tr>
                                            <tr>

                                                <td class="fw-light" style="width:300px">Owner ID(NRC /Driving Lincense
                                                    -
                                                    Front)</td>
                                                <td><a target="_blank" href="/frontID/{{ $data->owner_id_front }}"><img
                                                            style="width: 200px"
                                                            src="/frontID/{{ $data->owner_id_front }}"
                                                            alt=""></a>
                                                </td>
                                            </tr>

                                            <tr>

                                                <td class="fw-light" style="width:300px">Owner ID(NRC /Driving Lincense
                                                    -
                                                    Back)</td>
                                                <td><a target="_blank" href="/backID/{{ $data->owner_id_back }}"><img
                                                            style="width: 200px"
                                                            src="/backID/{{ $data->owner_id_back }}"
                                                            alt=""></a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </main>
                </div>
            </div>
        </div>


        @include('backend.script')
</body>

</html>
