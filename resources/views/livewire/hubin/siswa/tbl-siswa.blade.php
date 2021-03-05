<div>
    {{-- Success is as dangerous as failure. --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>

                        <div class="card-tools">
                            <button data-toggle="modal" data-target="#modal_create_siswa"
                                class="btn btn-success btn-sm"><i class="fas fa-user-graduate"></i> <i
                                    class="fas fa-plus"></i> </button>
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body">
                        <div class="container">
                            <div class="row">

                                <div class="col">
                                    <select wire:model="paginate" id="" class="form-control form-control-sm w-auto">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" wire:model="search" class="form-control mb-3 form-control-sm" placeholder="Cari berdasarkan Nama atau NIS siswa ...">
                                </div>

                            </div>
                            <table class="table table-responsive-md table-sm table-hover">
                                <thead class="bg-primary judul">
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        {{--  <th>kontak</th>  --}}
                                        {{--  <th>Alamat</th>  --}}
                                        <th>Angkatan</th>
                                        <th scope="colgroup">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 + ($paginate * ($page - 1)); ?>
                                    @if (count($siswa))
                                        @foreach ($siswa as $s)
                                        <tr>
                                            <th>{{ $no++ }}</th>
                                            <td>{{ $s->nis }}</td>
                                            <td>{{ $s->nama_siswa }}</td>
                                            <td>{{ $s->kelas }}</td>
                                            <td>{{ $s->jk_siswa }}</td>
                                            <td>{{ $s->nama_jurusan }}</td>
                                            {{--  <td>{{ $s->kontak_siswa }}</td>  --}}
                                            {{--  <td>{{ $s->alamat }}</td>  --}}
                                            <td>{{ $s->angkatan }}</td>
                                            <td>
                                                <div class="btn-group d-inline-flex">
                                                    <button wire:click="$emitTo('hsiswa.siswa-update', 'updateSiswa', {{ $s->nis }})" data-toggle="tooltip" data-placement="top" title="Edit"
                                                        class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                                    <button wire:click="$emitTo('hsiswa.siswa-detail', 'detailSiswa', {{ $s->nis }})" class="btn btn-warning btn-sm text-white" data-tooltip="tooltip"
                                                        data-toggle="modal"><i class="fas fa-search"></i></button>
                                                    <button wire:click="getDelete({{ $s->nis }})" data-tooltip="tooltip" data-placement="top" title="Delete"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else 
                                <div class="row justify-content-center">
                                    <div class="col">
                                         <h2>Data tidak di temukan !!!</h2>
                                    </div>
                                </div>
                                @endif
                            {{ $siswa->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>

        {{--  COMPONENT CREATE UNTUK MODAL/POPUP SISWA  --}}
        <livewire:hsiswa.siswa-create :jurusan="$jurusan"></livewire:hsiswa.siswa-create>

        {{--  COMPONENT UPDATE UNTUK MODAL/POPUP SISWA  --}}
        <livewire:hsiswa.siswa-update :jurusan="$jurusan"></livewire:hsiswa.siswa-update>

        {{--  COMPONENT DETAIL UNTUK MODAL/POPUP SISWA  --}}
        <livewire:hsiswa.siswa-detail :jurusan="$jurusan"></livewire:hsiswa.siswa-detail>

    </div>


    @push('css-animate')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    @endpush

    @push('sweet-alert-js')
        <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/script.alert.js') }}"></script>
    @endpush

    @push('modal-crud')
        <script>
            window.addEventListener('closeModal', event => {
                $("#modal_create_siswa").modal('hide');
            })
            window.addEventListener('closeModalUpdate', event => {
                $("#modal_update_siswa").modal('hide');
            })
            window.addEventListener('openModal', event => {
                $("#modal_update_siswa").modal('show');
            })
            window.addEventListener('openModalDetail', event => {
                $("#modal_detail_siswa").modal('show');
            })
        </script>
    @endpush

    @push('toast-notification-js')
        <script src="{{ asset('vendor\toast\js\toastr.min.js') }}"></script>
    @endpush

    @push('toast-notification-css')
        <link rel="stylesheet" href="{{ asset('vendor\toast\css\toastr.min.css') }}">
    @endpush

</div>