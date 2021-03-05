<div>
    {{-- The whole world belongs to you --}}
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="modal_update_siswa" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form wire:submit.prevent="update">
                    {{ csrf_field() }}
                    <input type="hidden" name="nis" wire:model="nis">
                    <div class="modal-header bg-info">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Data Siswa</h5>
                        <button type="button" class="close text-white border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">

                            <div class="row">
                                {{-- Input NIS --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input readonly type="number" wire:model="nis" id="nis" min="1"
                                            class="form-control @error('nis') is-invalid @enderror" name="NIS"
                                            placeholder="Masukkan NIS">

                                        @error('nis')
                                        <span class="invalid-feedback @error('nis') is-invalid @enderror">
                                            <strong>* {{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- input Nama Siswa --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namasis">Nama Siswa</label>
                                        <input type="text" wire:model="nama_siswa" id="namasis"
                                            class="form-control @error('nama_siswa') is-invalid @enderror"
                                            placeholder="Masukan Nama Siswa">
                                        @error('nama_siswa')
                                        <span class="invalid-feedback @error('nama_siswa') is-invalid @enderror">
                                            <strong>* {{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                {{-- input Kelas --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <div class="input-group">
                                            <select wire:model="kelas" id="kelas"
                                                class="form-control @error('kelas') is-invalid @enderror">
                                                <option value="">Pilih kelas</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            @error('kelas')
                                            <span class="invalid-feedback @error('kelas') is-invalid @enderror">
                                                <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- input Jenis Kelamin --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jk">Jenis Kelamin</label>
                                        <div class="input-group">
                                            <select wire:model="jk_siswa" id="jk"
                                                class="form-control @error('jk_siswa') is-invalid @enderror">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="L">Laki Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                            @error('jk_siswa')
                                            <span class="invalid-feedback @error('jk_siswa') is-invalid @enderror">
                                                <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                {{-- input Jurusan --}}
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="jurusansis">Jurusan</label>
                                        <div class="input-group">
                                            <select wire:model="jurusan_id" id="jurusansis"
                                                class="form-control @error('jurusan_id') is-invalid @enderror">
                                                @foreach ($jurusanlist as $jl)
                                                    @if ($jurusan == $jl->id)
                                                        <option value="{{ $jl->id }}" selected>{{ $jl->nama_jurusan }}</option>
                                                    @endif
                                                        <option value="{{ $jl->id }}">{{ $jl->nama_jurusan }}</option>
                                                @endforeach

                                                {{--  <option value="">pilih</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>  --}}

                                            </select>
                                            @error('jurusan_id')
                                            <span class="invalid-feedback @error('jurusan_id') is-invalid @enderror">
                                                <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- input kontak --}}
                                <div class="col-md-4">
                                    <label for="nope">Kontak</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+62</div>
                                        </div>
                                        <input type="number" wire:model="kontak_siswa" id="nope"
                                            class="form-control @error('kontak_siswa') is-invalid @enderror"
                                            placeholder="No Hp" min="1">
                                        @error('kontak_siswa')
                                        <span class="invalid-feedback @error('kontak_siswa') is-invalid @enderror">
                                            <strong>* {{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- inputan angkatan --}}
                                <div class="col-md-3">
                                    <label for="angkatansis">Angkatan</label>
                                    <div class="input-group">
                                        <select wire:model="angkatan" id="angkatansis"
                                            class="form-control @error('angkatan') is-invalid @enderror">
                                            <option value="">Angkatan</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                        @error('angkatan')
                                        <span class="invalid-feedback @error('angkatan') is-invalid @enderror">
                                            <strong>* {{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- input alamat --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <div class="input-group">
                                            <textarea wire:model="alamat" id="alamat"
                                                class="form-control @error('alamat') is-invalid @enderror"
                                                rows="4"></textarea>
                                            @error('alamat')
                                            <span class="invalid-feedback @error('alamat') is-invalid @enderror">
                                                <strong>* {{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                    </div>
                    <div class="modal-footer">
                        <button wire:click="cancel" class="btn btn-secondary btn-sm text-white" data-dismiss="modal"><i
                                class="fas fa-chevron-circle-left"></i> Kembali</button>
                        <button type="reset" class="btn btn-info btn-sm"><i class="fas fa-trash-restore"></i>
                            Reset Data Input
                        </button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i>
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
