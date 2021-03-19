@extends('layouts.templates-print')

@section('content')
<body onload="window.print();">
    <div class="container">
        <!-- Main content -->
    <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
            <div class="col-md-10">
                <img src="{{ asset('image/logo/logo-prakerin.png') }}" width="170px">
            </div>
            <!-- /.col -->
            <div class="col-md-auto">
                <img src="{{ asset('image/logo/11.png') }}" width="130px">

            </div>
        </div>

        <div class="row">
            <div class="col-md-auto mt-2 mb-2">
                <h4>
                    <small class="float-right">Date: {{ date('j F Y') }}</small>
                </h4>
            </div>
        </div>

        <!-- Table row -->
        <di class="row">
            <div class="col-12 table-responsive">
                <table class="table table-striped">
                    <thead class="bg-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th>Kode Perusahaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Pimpinan Perusahaan</th>
                            <th>Jenis Perusahaan</th>
                            <th>Email Perusahaan</th>
                            <th>Website</th>
                            <th>kontak Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($perusahaan as $p)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $p->kode_perusahaan }}</td>
                            <td>{{ $p->nama_perusahaan }}</td>
                            <td>{{ $p->pimpinan_perusahaan }}</td>
                            <td>{{ $p->jenis_perusahaan }}</td>
                            <td>{{ $p->email_perusahaan }}</td>
                            <td>{{ $p->website_perusahaan }}</td>
                            <td>{{ $p->kontak_perusahaan }}</td>
                            <td>{{ $p->alamat_perusahaan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </di>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
    </div>
    <!-- /.invoice -->
    </div>
</body>
@endsection