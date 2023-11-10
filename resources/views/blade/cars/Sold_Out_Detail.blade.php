@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">


                <li class="nav-item">


                    <a href="{{ url('/logout') }}" class="btn btn-danger text-white">Logout</a>


                </li>
            </ul>

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <section class="content">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row ">
                            <div class="col-sm-6"`>
                                <h1>Sold Out Detail</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/dashboard') }}"> Cars</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                @if (session('successful'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('soldout') }}
                    </div>
                @endif

                @if (session('buySuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('buySuccess') }}
                    </div>
                @endif
                @if (session('offerSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('offerSuccess') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card ">
                        <div class="card-header text-secondary">
                            <h4>Information</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">

                                    <tr>
                                        <td class="fw-light" style="width:300px">Buyer Name
                                        </td>
                                        <td class="fw-normal">{{ $buyer->buyer_name ?? 'none' }}</td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Buyer NRC</td>
                                        <td class="fw-normal">{{ $buyer->buyer_nrc ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Type</td>
                                        <td class="fw-normal">{{ $cardata->car_type ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Model</td>
                                        <td class="fw-normal">{{ $cardata->car_model ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Car Number</td>
                                        <td class="fw-normal">{{ $cardata->car_number ?? 'none' }}</td>
                                    </tr>

                                    <tr>
                                        <td class="fw-light" style="width: 300px">Car Image</td>
                                        <td>
                                            <a target="_blank"
                                                href="{{ asset('carimage/' . ($cardata->car_images ?? 'null')) }}">
                                                <img src="{{ asset('carimage/' . ($cardata->car_images ?? 'null')) }}"
                                                    alt="" width="65px">
                                            </a>
                                        </td>
                                    </tr>



                                </table>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="card">
                    <div class="card ">
                        <div class="card-header text-secondary">



                            <a href="{{ route('payment.detail', ['id' => $buyer->car_id]) }}"
                                class="btn btn-default text-white" style="background-color: #C82333">
                                Add Payment
                            </a>



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class='table table-bordered mt-4' style="font-size: 20">
                                    <tr>
                                        <td class="fw-light" style="width: 300px; background-color: #d0dce9;">Profit
                                        </td>
                                        <td class="fw-normal" style="background-color: #d0dce9">
                                            {{ number_format(intval(($buyer->selling ?? 0) - ($buy->price + $totalExpense)), 0, '', ',') ?? 'none' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Buy Price
                                        </td>
                                        <td class="fw-normal">

                                            {{ number_format(intval($buy->price), 0, '', ',') ?? 'none' }}

                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Sell Price</td>
                                        <td class="fw-normal">

                                            {{ number_format(intval($buyer->selling), 0, '', ',') ?? 'none' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Payment</td>
                                        <td class="fw-normal">
                                            {{ number_format(intval($buyer->payment + $totalAmount), 0, '', ',') ?? 'none' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-light" style="width:300px">Balance</td>
                                        <td class="fw-normal">
                                            {{-- {{ $buyer->balance }} --}}
                                            @php
                                                $buyerBalance = $buyer->balance ?? 'none';
                                                $totalAmount = $totalAmount ?? 'none';

                                                if ($buyerBalance !== 'none' && $totalAmount !== 'none') {
                                                    $result = $buyerBalance - $totalAmount;
                                                    echo number_format(intval($result), 0, '', ',');
                                                } else {
                                                    echo "Invalid input: One or both values are 'none'.";
                                                }
                                            @endphp
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


    </section>

    </div>



    </div>


    @include('master.footer')
