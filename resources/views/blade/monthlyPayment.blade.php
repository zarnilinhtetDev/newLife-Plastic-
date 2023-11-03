@include('backend.header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

<body class="sb-nav-fixed">


    @include('backend.nav')

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                @include('backend.sidebar')
            </nav>
        </div>

        <div id="" style="width:100%">
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid px-4 mt-4">
                        {{-- <h1 class="mt-4">Tables</h1> --}}
                        <ol class="breadcrumb mb-4 ">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ url('/monthly_payment') }}">Monthly
                                    Payment</a>
                            </li>
                        </ol>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('deleteStatus'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('deleteStatus') }}
                            </div>
                        @endif
                        @if (session('update'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('update') }}
                            </div>
                        @endif
                        <div class="container-fluid my-6">
                            <div class="row">

                                <div class="col-md-12">


                                    <div class="col-md-12 d-flex justify-content-end">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ url('/monthly_payment/register') }}"
                                                class="btn btn-primary ml-auto">
                                                Payment Register</a> &nbsp;
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-2 mb-3">
                            <div class="ro">
                                <button id="exportButton" class="btn form-control text-white"
                                    style="background-color: #157347">Export to
                                    Excel</button>

                            </div>
                        </div>

                        <div class="card my-6">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Payment Table

                            </div>

                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Car / Plate Number</th>
                                            <th>Company Pay</th>
                                            <th>Company Pay Date</th>
                                            <th>Owner Pay</th>
                                            <th>Owner Pay Date</th>
                                            <th>Driver Pay</th>
                                            <th>Driver Pay Date</th>

                                            <th>Car Expense</th>


                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = '1';
                                        @endphp
                                        @foreach ($pay as $pays)
                                            <tr>
                                                <td>
                                                    @if ($pays->car)
                                                        {{ $pays->car->car_brand_name }} -
                                                        {{ $pays->car->plate_number }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $pays->company_pay }}</td>
                                                <td>{{ $pays->company_date }}</td>
                                                <td>{{ $pays->owner_pay }}</td>

                                                <td>{{ $pays->owner_date }}</td>
                                                <td>{{ $pays->driver_pay }}</td>
                                                <td>{{ $pays->driver_date }}</td>

                                                <td>{{ $pays->car_expense }}</td>




                                                <td>
                                                    <a href="{{ url('monthly_payment_show', $pays->id) }}"
                                                        class="btn btn-success"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                    <a href="{{ url('paymentDelete', $pays->id) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this user ?')"><i
                                                            class="fa-solid fa-trash"></i></a>

                                                </td>
                                            </tr>
                                            @php
                                                $no++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>

            </div>

            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SSE@2023</div>
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



    <script>
        document.getElementById('exportButton').addEventListener('click', function() {
            // Create an array to store the data
            var data = [];

            // Get the table element by its ID
            var table = document.getElementById('datatablesSimple');

            // Get the table header cells
            var headerRow = table.rows[0];

            // Create an array to store the column indices to export
            var columnsToExport = [0, 1, 2, 3, 4, 5, 6]; // Adjust the indices as needed

            // Create a mapping of header cell content to its column index
            var headerMap = {};
            for (var i = 0; i < headerRow.cells.length; i++) {
                headerMap[headerRow.cells[i].textContent.trim()] = i;
            }

            // Add the header row to the data array
            var headerData = [];
            for (var i = 0; i < columnsToExport.length; i++) {
                var columnIndex = columnsToExport[i];
                headerData.push(headerRow.cells[columnIndex].textContent.trim());
            }
            data.push(headerData);

            // Iterate through the rows of the table and add only the desired columns to the data array
            for (var row = 1; row < table.rows.length; row++) {
                var rowData = [];
                for (var i = 0; i < columnsToExport.length; i++) {
                    var columnIndex = columnsToExport[i];
                    var cellContent = table.rows[row].cells[columnIndex].textContent.trim();

                    // Special handling for the "Car / Plate Number" and "Car" columns
                    if (columnIndex === headerMap['Car / Plate Number']) {
                        var carPlate = cellContent.split('-');
                        var carBrand = carPlate[0].trim();
                        var plateNumber = carPlate[1].trim();
                        rowData.push(carBrand + " - " + plateNumber);
                    } else {
                        rowData.push(cellContent);
                    }
                }
                data.push(rowData);
            }

            // Create a worksheet
            var ws = XLSX.utils.aoa_to_sheet(data);

            // Create a workbook
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            // Export the workbook to an Excel file
            XLSX.writeFile(wb, 'table_data.xlsx');
        });
    </script>




    @include('backend.script')
</body>

</html>
