@extends('layouts.templates-print')

@section('content')

<body onload="window.print();">
    <div class="container-fluid">
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
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Nama Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kontak Siswa</th>
                                <th>Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($siswaExcel as $sis)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $sis->nis }}</td>
                                <td>{{ $sis->nama_siswa }}</td>
                                <td>{{ $sis->kelas }}</td>
                                <td>{{ $sis->nama_jurusan }}</td>
                                <td>{{ $sis->jk_siswa }}</td>
                                <td>{{ $sis->alamat }}</td>
                                <td>{{ $sis->kontak_siswa }}</td>
                                <td>{{ $sis->angkatan }}</td>
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
