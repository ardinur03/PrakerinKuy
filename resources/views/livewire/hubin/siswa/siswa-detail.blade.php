<div>
    {{-- Success is as dangerous as failure. --}}

    <div wire:ignore.self class="modal fade" id="modal_detail_siswa" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-white" id="detailModal">Detail Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">

                    <div class="row">

                        <div class="col-md-5">
                            <img src="{{ asset('siswa/default-avatar.png') }}" class="img-thumbnail"  width="100%" alt="" srcset="">
                        </div>

                        <div class="col-md-7 mt-3 ml-auto">
                            <table class="table table-responsive-sm table-condensed no-margin">
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $nis }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $nama_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $jk_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                    <td>{{ $nama_jurusan }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Kontak Siswa</th>
                                    <td>{{ $kontak_siswa }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Angkatan</th>
                                    <td>{{ $angkatan }}</td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>
