<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div wire:ignore.self class="modal fade" id="printPdfPerusahaan" tabindex="-1" aria-labelledby="printPdfPerus" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printPdfPerus">Print PDF Data Perusahaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Note:</h5>
                                Halaman ini adalah tampilan sesudah mencetak print to pdf
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
                                <div class="row">
                                    <div class="col-12 justify-content-end">
                                        <a href="{{ route('print.pdf.perusahaan') }}" target="_blank" class="btn btn-danger"><i
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
