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

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header border-0">
                            <!-- <div class="d-flex justify-content-between"> -->
                            <h3 class="card-title">Suara Terdaftar</h3>
                            <!-- </div> -->
                            <div class="card-tools">
                                <div class="input-group input-group-sm d-flex justify-content-end" style="width: 150px;">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <p class="d-flex flex-column">
                                    <!-- <span class="text-bold text-lg">820</span>
                                    <span>Visitors Over Time</span> -->
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                    <!-- <span class="text-success">
                                        <i class="fas fa-arrow-up"></i> 12.5%
                                    </span>
                                    <span class="text-muted">Since last week</span> -->
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="visitors-chart" height="350"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                                <!-- <span class="mr-2">
                                    <i class="fas fa-square text-primary"></i> This Week
                                </span>

                                <span>
                                    <i class="fas fa-square text-gray"></i> Last Week
                                </span> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 bg-warning">

                        <div class="info-box-content">
                            <span class="info-box-text">Total Suara Terdaftar</span>
                            <span class="info-box-number">0</span>
                        </div>
                        <span class="info-box-icon"><i class="fas fa-edit"></i></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <div class="info-box-content">
                            <span class="info-box-text">Persentase Pencapaian</span>
                            <a href="<?= base_url(); ?>">
                                <span class="info-box-number">00,00 %</span>
                            </a>
                        </div>

                        <span class="info-box-icon"><i class="fas fa-trophy"></i></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Pencapaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kecamatan</th>
                                        <th>Terdaftar</th>
                                        <th>Konfirmasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Panakkukang</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Biringkanaya</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Manggala</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Tamalanrea</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Lainnya</td>
                                        <td class="text-right">0</td>
                                        <td class="text-right">0</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th colspan="2" class="text-center">Total</th>
                                        <th class="text-right">0</th>
                                        <th class="text-right">0</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->




                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Dukungan Terbaru</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="">Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" align="center">

                                <tbody>
                                    <tr>
                                        <td>
                                            <b>183 John Doe</b>
                                            <br>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            <br>11-7-2014
                                            <!-- <span class="tag tag-success">Approved</span> -->
                                        </td>
                                        <td style="width: 10px">
                                            <img class="img-fluid " src="<?= base_url('assets/img/profile/') . $user['image'] ?>">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>219 Alexander Pierce</b>
                                            <br>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            <br>11-7-2014
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>657 Bob Doe</b>
                                            <br>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            <BR>11-7-2014
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>175 Mike Doe</B>
                                            <br>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.
                                            <br>11-7-2014
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->