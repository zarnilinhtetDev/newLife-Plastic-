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


            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">


                <li class="nav-item">



                <li><a class="dropdown-item btn bg-danger  logout-link" href="{{ url('/logout') }}">Logout</a></li>
                </li>
            </ul>
        </nav>
        @include('master.sidebar')
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Details Update</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Details Update</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="card">
                    <form action="{{ url('update_tube', $update->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" class="form-control" id="date"
                                            aria-describedby="emailHelp" name="date" value="<?php echo date('Y-m-d'); ?>">


                                    </div>
                                    @error('date')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="kaw1">ကော်စေ့ (Location 1)</label>
                                        <input type="text" class="form-control" id="kaw1" name="kaw1"
                                            value="{{ $update->kaw1 }}" placeholder="">

                                    </div>
                                    @error('kaw1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="kaw2">ကော်စေ့ (Location 2)</label>
                                        <input type="text" class="form-control" id="kaw2" name="kaw2"
                                            value="{{ $update->kaw2 }}" placeholder="">

                                    </div>
                                    @error('kaw2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="khote1">ခုတ်ဖတ် (Location 1)</label>
                                        <input type="text" class="form-control" id="khote1" name="khote1"
                                            value="{{ $update->khote1 }}" placeholder="">

                                    </div>
                                    @error('khote1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="khote2">ခုတ်ဖတ် (Location 2)</label>
                                        <input type="text" class="form-control" id="khote2" name="khote2"
                                            value="{{ $update->khote2 }}" placeholder="">

                                    </div>
                                    @error('khote2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="size1">အိတ်ခွံ (Size 1)</label>
                                        <input type="text" class="form-control" id="size1" name="size1"
                                            value="{{ $update->size1 }}" placeholder="">

                                    </div>
                                    @error('size1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="size2">အိတ်ခွံ (Size 2)</label>
                                        <input type="text" class="form-control" id="size2" name="size2"
                                            value="{{ $update->size2 }}" placeholder="">

                                    </div>
                                    @error('size2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="white24">24 g (ဖြူ)</label>
                                        <input type="text" class="form-control" id="white24" name="white24"
                                            value="{{ $update->white24 }}" placeholder="">

                                    </div>
                                    @error('white24')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="blue24">24 g (ပြာ)</label>
                                        <input type="text" class="form-control" id="blue24" name="blue24"
                                            placeholder="" value="{{ $update->blue24 }}">

                                    </div>
                                    @error('blue24')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="white16">16 g (ဖြူ)</label>
                                        <input type="text" class="form-control" id="white16" name="white16"
                                            value="{{ $update->white16 }}" placeholder="">

                                    </div>
                                    @error('white16')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="blue16">16 g (ပြာ)</label>
                                        <input type="text" class="form-control" id="blue16" name="blue16"
                                            value="{{ $update->blue16 }}" placeholder="">

                                    </div>
                                    @error('blue16')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="white25">25 g (ဖြူ)</label>
                                        <input type="text" class="form-control" id="white25" name="white25"
                                            value="{{ $update->white25 }}" placeholder="">

                                    </div>
                                    @error('white25')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="blue25">25 g (ပြာ)</label>
                                        <input type="text" class="form-control" id="blue25" name="blue25"
                                            value="{{ $update->blue25 }}" placeholder="">

                                    </div>
                                    @error('blue25xx')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="white3">13g (ဖြူ)</label>
                                        <input type="text" class="form-control" id="white3" name="white3"
                                            value="{{ $update->white3 }}" placeholder="">

                                    </div>
                                    @error('white3')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="blue3">13g (ပြာ)</label>
                                        <input type="text" class="form-control" id="blue3" name="blue3"
                                            value="{{ $update->blue3 }}" placeholder="">

                                    </div>
                                    @error('blue3')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-12 ">
                                    <hr>
                                    <h3 style="color: #000000">
                                        အဖုံး</h3>
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="lightblue" class="text-primary"> အပြာနု</label>
                                        <input type="text" class="form-control" id="lightblue" name="lightblue"
                                            placeholder="" value="{{ $update->lightblue }}">

                                    </div>
                                    @error('lightblue')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="darkblue" style="color: #0401FF"> အပြာရင့်</label>
                                        <input type="text" class="form-control" id="darkblue" name="darkblue"
                                            value="{{ $update->darkblue }}" placeholder="">

                                    </div>
                                    @error('darkblue')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="green" class="text-success"> အစိမ်း</label>
                                        <input type="text" class="form-control" id="green" name="green"
                                            value="{{ $update->green }}" placeholder="">

                                    </div>
                                    @error('green')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="yellow" class="text-warning"> အဝါ</label>
                                        <input type="text" class="form-control" id="yellow" name="yellow"
                                            value="{{ $update->yellow }}" placeholder="">

                                    </div>
                                    @error('yellow')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="red" class="text-danger"> အနီ</label>
                                        <input type="text" class="form-control" id="red" name="red"
                                            value="{{ $update->red }}" placeholder="">

                                    </div>
                                    @error('red')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="black"> အနက်</label>
                                        <input type="text" class="form-control" id="black" name="black"
                                            value="{{ $update->black }}" placeholder="">

                                    </div>
                                    @error('black')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="pink" style="color: #F188B5"> ပန်းရောင်</label>
                                        <input type="text" class="form-control" id="pink" name="pink"
                                            value="{{ $update->pink }}" placeholder="">

                                    </div>
                                    @error('pink')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="white" style="color: #b4b4b4"> အဖြူ</label>
                                        <input type="text" class="form-control" id="white" name="white"
                                            value="{{ $update->white }}" placeholder="">

                                    </div>
                                    @error('white')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-3 mt-3">
                                    <div class="form-group">
                                        <label for="remark"> မှတ်ချက်</label>
                                        <input type="text" class="form-control" id="remark" name="remark"
                                            value="{{ $update->remark }}" placeholder="">

                                    </div>
                                </div>


                            </div>
                            <div class=" mt-3 ml-auto mr-2">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary mt-3"
                                        style="background-color: #0069D9">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>

        </div>



    </div>


    @include('master.footer')
