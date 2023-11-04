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

            <body class="sb-nav-fixed">

                <div id="layoutSidenav">

                    <div id="layoutSidenav_content">
                        <main>
                            <div class="container-fluid px-4 mt-4">
                                @if (session()->has('expenses_success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('expenses_success') }}
                                    </div>
                                @endif
                                <ol class="breadcrumb mb-4 ">
                                    <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/Driver') }}">Driver
                                        </a></li>
                                    <li class="breadcrumb-item active"><a href="{{ url('/DriverAttendance') }}">Driver
                                            Attendance</a></li>
                                </ol>

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show mb-4"role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('deleteStatus'))
                                    <div class="alert alert-danger alert-dismissible fade show mb-4"role="alert">
                                        {{ session('deleteStatus') }}
                                    </div>
                                @endif
                                <div class="container-fluid my-4">
                                    <span class="font-weight-bold" style="font-size: 20px">Driver Name -
                                        {{ $driver->driver_name }}</span>
                                </div>



                                <div class="container-fluid card my-5 p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <form action="{{ route('driver-attendance-start', $driver->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label for="start_image">Start Image:</label>
                                                    <input type="file" name="start_image" id="start_image" required
                                                        class="border border-dark p-2 form-control">
                                                </div>
                                                <div class="mt-3">
                                                    <label for="start_time">Start Time:</label>
                                                    <input type="datetime-local" name="start_time" class="form-control"
                                                        id="start_time" required>
                                                </div>
                                                <button type="submit" type="submit" class="btn text-white mt-3"
                                                    style="background-color: #218838">Start
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('driver-attendance-end', $driver->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div>
                                                    <label for="end_image">End Image:</label>
                                                    <input type="file" name="end_image" id="end_image"
                                                        class="border border-dark p-2 form-control" required>
                                                </div>
                                                <div class="mt-3">
                                                    <label for="end_time">End Time:</label>
                                                    <input type="datetime-local" name="end_time" id="end_time" required
                                                        class="form-control">
                                                </div>
                                                <button type="submit" class="btn text-white mt-3"
                                                    style="background-color: #218838">End </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="container-fluid my-5 ">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="card p-4">
                                            <form
                                                action="{{ route('filter.driver.attendance', ['id' => $driver->id]) }}"
                                                method="get">
                                                <div class="row">
                                                    <div class="col-md-5 form-group">
                                                        <label for="">Date From :</label>
                                                        <input type="date" name="start_date" class="form-control">
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <label ford="">Date To :</label>
                                                        <input type="date" name="end_date" class="form-control">
                                                    </div>
                                                    <div class="col-md-3 mt-3 form-group">
                                                        <input type="submit" class="btn btn-primary form-control"
                                                            value="Search" style="background-color: #0069D9">
                                                    </div>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4 container-fluid">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Driver Attendance Table
                                </div>

                                <div class="card-body">
                                    <table id="datatablesSimple">
                                        <thead>
                                            <th>Start Time</th>
                                            <th>Start Image</th>
                                            <th>End Time</th>
                                            <th>End Image</th>


                                            <th>Total Hours</th>
                                            {{-- <th>Hour Pay</th>
                                            <th>Total Hour Pay</th> --}}

                                            <th>Action</th>


                                        </thead>
                                        <tbody id="aa">
                                            @if (isset($d_Attendance))
                                                @foreach ($d_Attendance as $attendance)
                                                    <tr>
                                                        <td>{{ date('F j, Y g:i A', strtotime($attendance->start_time)) }}
                                                        </td>

                                                        <td>
                                                            <a target="_blank"
                                                                href="/startImage/{{ $attendance->start_image }}">
                                                                <img src="/startImage/{{ $attendance->start_image }}"
                                                                    alt="" width="100px"></a>
                                                        </td>

                                                        <td>{{ date('F j, Y g:i A', strtotime($attendance->end_time)) }}
                                                        </td>
                                                        <td><a target="_blank"
                                                                href="/endImage/{{ $attendance->end_image }}"><img
                                                                    src="/endImage/{{ $attendance->end_image }}"
                                                                    alt="" width="100px"></a><br></td>

                                                        <td>
                                                            <?php
                                                            $startTime = strtotime($attendance->start_time);
                                                            $endTime = strtotime($attendance->end_time);
                                                            $totalSeconds = $endTime - $startTime;
                                                            
                                                            $hours = floor($totalSeconds / 3600);
                                                            $minutes = floor(($totalSeconds - $hours * 3600) / 60);
                                                            
                                                            echo $hours . ' hours and ' . $minutes . ' minutes';
                                                            ?>
                                                        </td>
                                                        {{-- <td>N\A</td>
                                                        <td>N\A</td> --}}

                                                        <td>
                                                            <a href="" class="btn btn-success"> <i
                                                                    class="fa-solid fa-pen-to-square"></i></a>

                                                            <a href="{{ url('/driver_attendanceDelete', $attendance->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this driver ?')"><i
                                                                    class="fa-solid fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                @foreach ($driver->driverAttendances as $attendance)
                                                    <tr>
                                                        <td>{{ date('F j, Y g:i A', strtotime($attendance->start_time)) }}
                                                        </td>
                                                        <td> <a target="_blank"
                                                                href="/startImage/{{ $attendance->start_image }}">
                                                                <img src="/startImage/{{ $attendance->start_image }}"
                                                                    alt="" width="100px"></a><br></td>
                                                        <td>{{ date('F j, Y g:i A', strtotime($attendance->end_time)) }}
                                                        </td>

                                                        <td><a target="_blank"
                                                                href="/endImage/{{ $attendance->end_image }}"><img
                                                                    src="/endImage/{{ $attendance->end_image }}"
                                                                    alt="" width="100px"></a><br></td>

                                                        <td>

                                                            <?php
                                                            $startTime = strtotime($attendance->start_time);
                                                            $endTime = strtotime($attendance->end_time);
                                                            $totalSeconds = $endTime - $startTime;
                                                            
                                                            $hours = floor($totalSeconds / 3600);
                                                            $minutes = floor(($totalSeconds - $hours * 3600) / 60);
                                                            
                                                            echo $hours . ' hours and ' . $minutes . ' minutes';
                                                            ?>
                                                        </td>
                                                        {{-- <td>
                                                            <?php
                                                            $startTime = strtotime($attendance->start_time);
                                                            $endTime = strtotime($attendance->end_time);
                                                            $totalSeconds = $endTime - $startTime;
                                                            
                                                            $hours = floor($totalSeconds / 3600);
                                                            $minutes = floor(($totalSeconds - $hours * 3600) / 60);
                                                            $hourlyRate = $driver->driver_pay / (30 * 24);
                                                            $hourPayment = $hours * $hourlyRate;
                                                            echo number_format($hourPayment, 2);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            $quantity = $hours;
                                                            $totalAmount = $hourPayment * $quantity;
                                                            echo number_format($totalAmount, 2);
                                                            ?>




                                                        </td> --}}
                                                        <td>
                                                            <a href="{{ url('/driver_attendanceShow', $attendance->id) }}"
                                                                class="btn btn-success"> <i
                                                                    class="fa-solid fa-pen-to-square"></i></a>

                                                            <a href="{{ url('/driver_attendanceDelete', $attendance->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this driver ?')"><i
                                                                    class="fa-solid fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif


                                            </tr>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>


                            </div>


                        </main>

                    </div>

                </div>

            </body>

        </div>
    </div>



    @include('backend.script')
</body>


</html>
