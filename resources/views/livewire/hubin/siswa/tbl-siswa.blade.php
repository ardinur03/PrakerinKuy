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
                            <table class="table table-responsive-md table-sm table-hover">
                                <thead class="bg-primary judul">
                                    <tr class="text-center">
                                        <th scope="col">No</th>
                                        <th>NIS</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>kontak</th>
                                        <th>Alamat</th>
                                        <th>Angkatan</th>
                                        <th scope="colgroup">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($siswa as $s)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $s->nis }}</td>
                                        <td>{{ $s->nama_siswa }}</td>
                                        <td>{{ $s->kelas }}</td>
                                        <td>{{ $s->jk_siswa }}</td>
                                        <td>{{ $s->nama_jurusan }}</td>
                                        <td>{{ $s->kontak_siswa }}</td>
                                        <td>{{ $s->alamat }}</td>
                                        <td>{{ $s->angkatan }}</td>
                                        <td>
                                            <div class="btn-group d-inline-flex">
                                                <a href="" data-toggle="tooltip" data-placement="top" title="Edit"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <button class="btn btn-warning btn-sm text-white" data-tooltip="tooltip"
                                                    data-toggle="modal"><i class="fas fa-search"></i></button>
                                                <button data-tooltip="tooltip" data-placement="top" title="Delete"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="far fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>

        <livewire:hsiswa.siswa-create :jurusan="$jurusan"></livewire:hsiswa.siswa-create>
    </div>


    @push('sweet-alert-js')
        <script src="{{ asset('vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('vendor/sweetalert/script.alert.js') }}"></script>
    @endpush


    @push('toast-notification-js')
        <script src="{{ asset('vendor\toast\js\toastr.min.js') }}"></script>
    @endpush

    @push('toast-notification-css')
        <link rel="stylesheet" href="{{ asset('vendor\toast\css\toastr.min.css') }}">
    @endpush

</div>