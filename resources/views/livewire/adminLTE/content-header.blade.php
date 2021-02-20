<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{ Auth::user()->fullname }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <?php $role = Auth::user()->role ?>

                        <li class="breadcrumb-item"><a href="{{  $role == 1 ? '/admin/dashboard' : ($role == 2) ? '/hubin/dashboard' : ($role == 3 ? '/dashboard' : '') }}"> <i class="fas fa-tachometer-alt"></i> &nbsp; Home</a></li>
                        <li class="breadcrumb-item active">Starter Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
