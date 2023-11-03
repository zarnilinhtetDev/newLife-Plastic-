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
            {{-- @include('blade.cars') --}}
            <div id="layoutSidenav">

                <div id="layoutSidenav_content">
                    <main>
                        <div class="container-fluid px-4 mt-4">
                            {{-- <h1 class="mt-4">Tables</h1> --}}
                            <ol class="breadcrumb mb-4 ">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><a href="{{ url('/User_Register') }}">Users</a></li>
                                <li class="ml-auto">Users Register</li>

                            </ol>
                            <div class="container my-5">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}

                                    </div>
                                @endif
                                @if (session('success_import'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success_import') }}

                                    </div>
                                @endif
                                <div class="container mt-5 text-center">
                                    {{-- <h2 class="mb-4">
                                        Laravel 7 Import and Export CSV & Excel to Database Example
                                    </h2> --}}

                                    <form action="{{ route('file-import') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                            <div class="custom-file text-left">
                                                <input type="file" name="file" class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Import data</button>
                                        <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                                    </form>
                                </div>

                                <div class="row mt-6">
                                    <div class="col-md-6 offset-3">

                                        <div class="card  p-6">
                                            <form action="{{ url('/User_Register') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Email address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                                        aria-describedby="emailHelp" name="email">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputPassword1">Password <span
                                                            class="text-danger">*</span></label>
                                                    <input type="password" class="form-control"
                                                        id="exampleInputPassword1" name="password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="is_admin"> Admin </label> &nbsp;
                                                    <input type="checkbox" name="is_admin" value="1"
                                                        class="form-control">
                                                </div>
                                                <button type="submit" class="btn btn-primary"
                                                    style="background-color: #0069D9">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="card my-6">
                                    @if (session('delete_success'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('delete_success') }}

                                        </div>
                                    @endif
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        User Tables
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple" class="">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>

                                                    <th>Create Date</th>
                                                    <th>Update Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php
                                                    $no = '1';
                                                @endphp
                                                @foreach ($showUser_data as $userData)
                                                    <tr>
                                                        <td>{{ $no }}</td>
                                                        <td>{{ $userData->name }}</td>
                                                        <td>{{ $userData->email }}</td>
                                                        <td>
                                                            @if ($userData->is_admin)
                                                                <span class="text-primary ">Admin</span>
                                                            @else
                                                                <span class="text-primary ">User</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{ $userData->created_at->format('Y-m-d h:i A') }}
                                                            ({{ $userData->created_at->diffForHumans() }})
                                                        </td>
                                                        <td>
                                                            {{ $userData->updated_at->format('Y-m-d h:i A') }}
                                                            ({{ $userData->updated_at->diffForHumans() }})
                                                        </td>
                                                        </td>

                                                        </td>
                                                        </td>

                                                        <td>

                                                            {{-- <x-dropdown-link :href="route('profile.edit')">
                                                                {{ __('Profile') }}
                                                            </x-dropdown-link> --}}
                                                            <a href="{{ route('profile.edit') }}"
                                                                class="btn btn-success">
                                                                <i class="fa-solid fa-pen-to-square"></i>

                                                            </a>

                                                            <a href="{{ url('delete_user', $userData->id) }}"
                                                                class="btn btn-danger"
                                                                onclick="return confirm('Are you sure you want to delete this user ?')">
                                                                <i class="fa-solid fa-trash"></i></a>


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
    </div>


    @include('backend.script')
</body>

</html>
