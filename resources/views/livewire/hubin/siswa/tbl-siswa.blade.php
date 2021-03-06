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
                                    @if ($siswa->isNotEmpty())
                                    <select wire:model="paginate" id="" class="form-control form-control-sm w-auto">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input type="text" wire:model="search" class="form-control mb-3 form-control-sm" placeholder="Cari berdasarkan Nama atau NIS siswa ...">
                                </div>

                            </div>
                            @if ($siswa->isNotEmpty())
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
                                        <th scope="colgroup">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 + ($paginate * ($page - 1)); ?>
                                    
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
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <button wire:click="$emitTo('hsiswa.siswa-create-account', 'createAccount', {{ $s->nis }})" 
                                                        data-tultip="tooltip" 
                                                        data-placement="top" 
                                                        data-toggle="modal"
                                                        title="Buat Akun Siswa"
                                                        class="btn btn-secondary btn-sm mr-1 ml-1">
                                                        <i class="fas fa-user-circle"></i>
                                                    </button>
                                                    <button wire:click="$emitTo('hsiswa.siswa-update', 'updateSiswa', {{ $s->nis }})" 
                                                        data-tultip="tooltip" 
                                                        data-placement="top" 
                                                        title="Edit"
                                                        class="btn btn-info btn-sm mr-1 ml-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button wire:click="$emitTo('hsiswa.siswa-detail', 'detailSiswa', {{ $s->nis }})"
                                                        data-tultip="tooltip" 
                                                        data-placement="top" 
                                                        title="Detail"
                                                        data-toggle="modal"
                                                        class="btn btn-warning btn-sm text-white mr-1 ml-1">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                    <button 
                                                        wire:click="$emit('deletesiswa', {{ $s->nis }})"
                                                        data-tultip="tooltip" 
                                                        data-placement="top"
                                                        title="Delete"
                                                        class="btn btn-danger btn-sm mr-1 ml-1"
                                                        >
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else 
                                <div class="row justify-content-center">
                                    <div class="col">
                                         <h2 class="text-center">Data siswa tidak di temukan 😔 !!!</h2>
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
        
        {{--  COMPONENT DETAIL UNTUK MODAL/POPUP SISWA  --}}
        <livewire:hsiswa.siswa-create-account :jurusan="$jurusan"></livewire:hsiswa.siswa-create-account>

    </div>

    {{--  push css link animasi  --}}
    @push('css-animate')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    @endpush

    @push('css-modal')
        <style>
            .modal.modal-static .modal-dialog { -webkit-transform: none !important; transform: none !important; }
        </style>
    @endpush

    {{--  push js sweet-alert-2  --}}
    @push('sweet-alert-js')
        <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/script.alert.js') }}"></script>
        <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            Livewire.on('deletesiswa', (nis) => {
                Swal.fire({
                    icon: 'warning',
                    title: 'Apakah anda yakin ?',
                    text: 'Siswa ini akan Dihapus Permanent !!!',
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonColor: 'var(--warning)',
                    confirmButtonColor: 'var(--danger)',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    //if user clicks on delete
                    if (result.value) {
                        // calling destroy method to delete
                       Livewire.emit('DeleteSiswa', nis);
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                        'Cancelled',
                        'Data siswa tidak jadi di hapus :)',
                        'error'
                        )
                    }
                });
            });
        });
        </script>
    @endpush

    {{--  push script js unruk event click modal/popup  --}}
    @push('modal-crud')
        <script>
            //event untuk close modal
            window.addEventListener('closeModal', event => {
                $("#modal_create_siswa").modal('hide');
            })
            //event untuk close modal
            window.addEventListener('closeModalUpdate', event => {
                $("#modal_update_siswa").modal('hide');
            })
            //event untuk open modal
            window.addEventListener('openModal', event => {
                $("#modal_update_siswa").modal('show');
            })
            //event untuk open modal
            window.addEventListener('openModalDetail', event => {
                $("#modal_detail_siswa").modal('show');
            })
            //event untuk open modal
            window.addEventListener('openModalCreateAccount', event => {
                $("#modal_account_create_siswa").modal('show');
            })

            // untuk memunculkan tooltip keren pada saat di sorot button crud
            $(function () {
                $('[data-tultip="tooltip"]').tooltip()
            })
        </script>
    @endpush

    {{--  notification toast css and js (pengganti sweet-alert)  --}}
    @push('toast-notification-js')
        <script src="{{ asset('vendor\toast\js\toastr.min.js') }}"></script>
    @endpush
    @push('toast-notification-css')
        <link rel="stylesheet" href="{{ asset('vendor\toast\css\toastr.min.css') }}">
    @endpush
</div>