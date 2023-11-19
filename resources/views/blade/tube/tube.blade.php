<div class="container-fluid">
    <div class="row">
        <div class="col-12">


            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            @if (session('deleteStatus'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('deleteStatus') }}
                </div>
            @endif
            @if (session('updateStatus'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updateStatus') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-end">
                            <a href="{{ url('dashboard/tube') }}" class="btn btn-primary"> Register</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="container-fluid my-5"> --}}


            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Details Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">




                    <table id="example1" class="display table table-bordered ">
                        <thead>
                            {{-- <th scope="col" style="vertical-align: middle;background-color:white">No</th> --}}
                            <th scope="col" style="vertical-align: middle;background-color:white;text-align:center">
                                Date</th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                   background-color:white;
                                            border-left: 0;border:none">
                                            ကော်စေ့</th>
                                    </tr>

                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;

                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            ခုတ်ဖတ်</th>
                                    </tr>

                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white"">
                                            အိတ်ခွံ</th>
                                    </tr>

                                </table>
                            </th>



                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            24 g</th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-top:0;
                                                    border-right: 1px solid #DEE2E6;
                                                    border-bottom: 0;
                                                    border-left: 0;background-color:white">
                                            ဖြူ</td>
                                        <td style="border: none;">ပြာ</td>
                                    </tr>
                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            25 g</th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-top:0;
                                                    border-right: 1px solid #DEE2E6;
                                                    border-bottom: 0;
                                                    border-left: 0;">
                                            ဖြူ</td>
                                        <td style="border: none;">ပြာ</td>
                                    </tr>
                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            13g</th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-top:0;
                                                    border-right: 1px solid #DEE2E6;
                                                    border-bottom: 0;
                                                    border-left: 0;background-color:white">
                                            ဖြူ</td>
                                        <td style="border: none;">ပြာ</td>
                                    </tr>
                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            16 g</th>
                                    </tr>
                                    <tr>
                                        <td
                                            style="border-top:0;
                                                    border-right: 1px solid #DEE2E6;
                                                    border-bottom: 0;
                                                    border-left: 0;background-color:white">
                                            ဖြူ</td>
                                        <td style="border: none;">ပြာ</td>
                                    </tr>
                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                    <tr>
                                        <th colspan="3"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;">

                                        </th>


                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;">
                                            အဖုံး
                                        </th>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;">

                                        </th>

                                    </tr>
                                    <tr>
                                        <td style="border: none;background-color:white">
                                            ပြာနု</td>
                                        <td style="border: none;background-color:white">
                                            ပြာရင့်</td>
                                        <td style="border: none;background-color:white">

                                            အစိမ်း</td>
                                        <td style="border: none;background-color:white">

                                            အဝါ</td>
                                        <td style="border: none;background-color:white">
                                            အနီ</td>
                                        <td style="border: none;background-color:white">

                                            အနက်</td>
                                        <td style="border: none;background-color:white">
                                            ပန်းရောင်</td>
                                        <td style="border: none;background-color:white">

                                            အဖြူ</td>

                                    </tr>
                                    </tr>

                                </table>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            မှတ်ချက်</th>
                                    </tr>

                                </table>
                            </th>
                            <th scope="col" style="vertical-align: middle;" class="p-0">
                                <table class="w-100 text-center m-0">
                                    <tr>
                                        <th colspan="2"
                                            style="border-top:0;
                                                    border-right: 0;
                                                    border-bottom: 1px solid #FFFFFF;
                                                    border-left: 0;background-color:white">
                                            Action</th>
                                    </tr>

                                </table>
                            </th>
                        </thead>
                        <tbody>

                            @foreach ($tubes as $tube)
                                <tr>

                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">

                                                    {{ (new DateTime($tube->date))->format('d.M.y') }}

                                                </td>

                                            </tr>

                                        </table>
                                    </td>

                                    <td class="p-0" style="vertical-align: middle;">
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: none;">{{ $tube->kaw1 }}
                                                </td>
                                                <td style="border: none;">{{ $tube->kaw2 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td class="p-0" style="vertical-align: middle;">
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">{{ $tube->khote1 }}
                                                </td>
                                                <td style="border: none;">{{ $tube->khote2 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">{{ $tube->size1 }}
                                                </td>
                                                <td style="border: none;">{{ $tube->size2 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">
                                                    {{ $tube->white24 }}</td>
                                                <td style="border: none;">{{ $tube->blue24 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">
                                                    {{ $tube->white25 }}</td>
                                                <td style="border: none;">{{ $tube->blue25 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">{{ $tube->white3 }}
                                                </td>
                                                <td style="border: none;">{{ $tube->blue3 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: 0.5px;">
                                                    {{ $tube->white16 }}</td>
                                                <td style="border: none;">{{ $tube->blue16 }}
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table class="w-100 text-center ">
                                            <tr>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->lightblue }}</td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->darkblue }}</td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->green }}
                                                </td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->yellow }}
                                                </td>

                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->red }}
                                                </td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->black }}
                                                </td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->pink }}
                                                </td>
                                                <td style="border: none;background-color:#F2F2F2">
                                                    {{ $tube->white }}
                                                </td>





                                            </tr>

                                        </table>
                                    </td>


                                    <td>
                                        <table class="w-100 text-center m-0">
                                            <tr>
                                                <td style="border: none;">{{ $tube->remark }}
                                                </td>

                                            </tr>

                                        </table>
                                    </td>
                                    <td>

                                        <a href="{{ url('edit', $tube->id) }}" class="btn btn-success"><i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                        <a href="{{ url('delete_detail', $tube->id) }}"
                                            onclick="return confirm('Are you sure you want to delete?')"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>
</div>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted"> New Life (Taungggyi)</div>
            <div>
                ပလပ်စတစ် ဘူးခွံလုပ်ငန်း
            </div>
        </div>
    </div>
</footer>
