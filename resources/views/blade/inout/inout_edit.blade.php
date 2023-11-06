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

        </nav>

        @include('master.sidebar')

        <div class="content-wrapper">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Main content -->
                <section class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 offset-3 my-3">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">ပေးရန်/ရရန် Update</h3>
                                    </div>
                                    <form action="{{ url('/inout_update', $inout->id) }}" method="POST">
                                        @csrf
                                        <div class="card-body">


                                            <div class="form-group">
                                                <label for="date">Date</label>
                                                <input type="text" class="form-control" id="date" name="date"
                                                    placeholder="Enter Date" value="{{ $inout->date }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="Enter Price" value="{{ $inout->price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" class="form-control" id="description"
                                                    name="description" placeholder="Enter Description "
                                                    value="{{ $inout->description }}">
                                            </div>



                                            <!-- /.card-body -->
                                            <div class="modal-footer justify-content-end">

                                                <button type="submit" class="btn btn-primary"
                                                    style="background-color: #007BFF">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                </section>


            </div>
        </div>

    </div>





</body>

@include('master.footer')
