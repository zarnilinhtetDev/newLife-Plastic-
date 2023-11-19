<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Life (ပလပ်စတစ် ဘူးခွံလုပ်ငန်း)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<style>
    body {
        background-image: url('{{ asset('yy.jpg') }}');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .btn-color {

        color: #fff;

    }

    .btn-color:hover {
        color: white
    }

    .profile-image-pic {
        height: 100px;
        width: 100px;
        object-fit: cover;
    }



    .cardbody-color {
        background-color: #F6F8FA;
    }

    a {
        text-decoration: none;
    }
</style>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3 ">



                <h2 class="text-center text-black mt-5">Login Form </h2>
                <div class="card  mt-6">

                    <form class="card-body cardbody-color p-lg-5 " method="POST" action="{{ route('admin. login') }}">
                        @csrf

                        <div class="text-center">
                            <h4>New Life </h4>
                            <h6>(ပလပ်စတစ် ဘူးခွံလုပ်ငန်း)</h6>

                        </div>

                        <div class="mb-3 mt-5">
                            <input type="email" class="form-control" id="Username" aria-describedby="emailHelp"
                                placeholder="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}

                            </div>
                        @endif

                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" placeholder="password"
                                name="password" value="{{ old('password') }}">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (session('error'))
                            <span class="text-danger"> {{ session('error') }}</span>
                        @endif
                        <div class="text-center mt-2"><button type="submit"
                                class="btn btn-color px-5 mb-5 w-100 btn-primary">
                                Login</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    </form>
</body>

</html>
