<div>
    {{-- The whole world belongs to you --}}

    <div wire:ignore.self class="modal fade" id="modal_account_create_siswa" tabindex="-1"
        aria-labelledby="create_account_siswa" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="create_account_siswa">Buat Akun Siswa Prakerin</h5>
                    {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>  --}}
                </div>
                <div class="modal-body">
                    <h4 class="text-gray">Data siswa</h4>
                    <table class="table table-responsive-sm table-condensed no-margin">
                        <tr>
                            <th>NIS</th>
                            <td>{{ $nis }}</td>
                        </tr>
                        <tr>
                            <th>Nama Siswa</th>
                            <td>{{ $nama_siswa }}</td>
                        </tr>
                        <tr>
                            <th>Kelas</th>
                            <td>{{ $kelas }}</td>
                        </tr>
                        <tr>
                            <th>Jurusan</th>
                            <td>{{ $nama_jurusan }}</td>
                        </tr>
                        <tr>
                            <th>Kontak Siswa</th>
                            <td>{{ $kontak_siswa }}</td>
                        </tr>
                    </table>
                    <h4 class="text-gray">Buat akun</h4>
                    <hr>

                    <form action="">
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input type="text" readonly wire:model="nis" class="form-control" id="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" wire:model="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Masukan password ...">
                                @error('password')
                                <span class="invalid-feedback @error('password') is-invalid @enderror">
                                    <strong>* {{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm_password" class="col-sm-4 col-form-label">Ketik ulang Password</label>
                            <div class="col-sm-8">
                                <input type="text" wire:model="confirm_password"
                                class="form-control @error('confirm_password') is-invalid @enderror"
                                id="confirm_password"
                                placeholder="Ketik ulang password ...">
                                @error('confirm_password')
                                <span class="invalid-feedback @error('confirm_password') is-invalid @enderror">
                                    <strong>* {{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block bg-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-block btn-success mb-2">BUAT AKUN</button>
                </div>
            </div>
        </div>
    </div>

</div>
