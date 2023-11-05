@include('master.header')

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">

                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Accounts</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Accounts</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            {{-- <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section> --}}

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 my-3">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Transaction Update</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('transaction_update', $transaction->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="accounts_id">Account Name</label>
                                            <select name="account_id" class="form-control" id="account_id">
                                                <option value="">Select Accounts</option>

                                                @foreach ($accounts as $account)
                                                    <option value="{{ $account->id }}">
                                                        {{ $account->account_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="transaction_code">Code</label>
                                            <input type="text" class="form-control" id="transaction_code"
                                                name="transaction_code" value="{{ $transaction->transaction_code }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="transaction_name">Name</label>
                                            <input type="text" class="form-control" id="transaction_name"
                                                name="transaction_name" value="{{ $transaction->transaction_name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Descriptions</label>
                                            <textarea class="form-control" rows="3" style="border-color:#6B7280" name="description">{{ $transaction->description }}</textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary"
                                            style="background-color: #007BFF">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>



    </div>


    @include('master.footer')
