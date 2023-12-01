<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 480px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark"> Event</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Event</li>
                    </ol> -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10">

                                    <h5 class="card-title m-0">Dashboard</h5>
                                </div>
                                <div class="col-md-2">


                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row justify-content-center">
                                <div class="info-box mb-6 bg-warning">
                                    <span class="info-box-icon bg-warning elevation-1">
                                        <!-- <i class="fas fa-users"></i> -->
                                        <img src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="card-img">
                                    </span>

                                    <div class="info-box-content align-content-center">
                                        <span class="info-box-text">
                                            <h5 class="card-title"><?= $user['name']; ?></h5>
                                        </span>
                                        <span class="info-box-text"><?= $user['email']; ?></span>
                                        <span class="info-box-text">
                                            <small class="text-muted">Member since <?= date('d F Y', $user['date_created']); ?></small>
                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->