<div>

     <div wire:ignore.self class="modal fade" id="printPdfSiswa" tabindex="-1" aria-labelledby="printPdfPerus" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printPdfPerus">Print PDF Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                Halaman ini adalah tampilan sesudah mencetak print pdf
                            </div>


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
                                <div class="row">
                                    <div class="col-12 justify-content-end">
                                        <a href="{{ route('print.pdf.siswa') }}" target="_blank" class="btn btn-danger"><i
                                                class="fas fa-print"></i> Print ke PDF</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.invoice -->
                        </div><!-- /.col -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>
