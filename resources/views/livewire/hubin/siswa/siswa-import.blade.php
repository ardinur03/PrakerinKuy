<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div wire:ignore.self class="modal fade" id="importSiswa" tabindex="-1" aria-labelledby="importSiswaModal"
        aria-hidden="true">
        <div class="modal-dialog">
            <form wire:submit.prevent="insertfile">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importSiswaModal">Import data siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="upload">Upload file excel</label>
                                    <input type="file"
                                        class="form-control @error('fileSiswaCreate') is-invalid @enderror"
                                        wire:model="fileSiswaCreate" id="upload">
                                    @error('fileSiswaCreate')
                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <small>Note <b class="text-red">*</b> : Tipe file wajib xlsl, xls</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="import" class="btn btn-block btn-primary btn-lg">Download template
                            excel</button>
                        <button wire:click="cancel" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
