<div>
    <!-- Content Header (Page header) -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-6">
                    {{--  <h1 class="m-0 text-dark">Tabel Siswa</h1>  --}}
                </div><!-- /.col -->
                <div class="col-md-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <?php $role = Auth::user()->roles; ?>
                            <a href="@if ($role == 1)
                                    {{ '/admin/dashboard' }}
                                @elseif($role == 2)
                                    {{ route('hubin.dashboard') }}
                                @elseif($role == 3)
                                    {{ '/dashboard' }}    
                                @endif" class="text-decoration-none"><i class="fas fa-home"> Dashboard</i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a class="text-text-decoration-none">
                                @if ($title === 'Master data | Siswa')
                                    <i class="fas fa-user-graduate">&nbsp;&nbsp;{{ $title }} </i>
                                @endif
                                
                            </a>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
