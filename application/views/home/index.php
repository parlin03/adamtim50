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
                                            <a href="<?= base_url('tim50'); ?>" class="btn btn-primary"> <i class="fas fa-plus"></i></a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty($grafik)) {
                                /* Mengambil query report*/
                                foreach ($grafik as $result) {
                                    $date[] = $result->date_created; //ambil bulan
                                    $value[] = (float) $result->total; //ambil nilai
                                }
                                /* end mengambil query*/
                            }
                            ?>

                            <!-- Load chart dengan menggunakan ID -->
                            <!-- END load chart -->

                            <div class="position-relative mb-4">
                                <div id="report" style="height: 330px;"></div>
                                <!-- <canvas id="report" height="350"></canvas> -->
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

                        <?php $tdaftar = 0; ?>
                        <?php foreach ($TotalDaftar as $td) : ?>
                            <?php $tdaftar += $td['totaldaftar']; ?>
                        <?php endforeach; ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Suara Terdaftar</span>
                            <span class="info-box-number"><?= $tdaftar; ?></span>
                        </div>
                        <span class="info-box-icon"><a href="<?= base_url('tim50/details'); ?>"><i class="fas fa-edit"></i></a></span>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 bg-success">
                        <!-- <?php $tdpt = 0; ?> -->
                        <?php foreach ($TotalDpt as $tp) : ?>
                            <?php $tdpt += $tp['totaldpt']; ?>
                        <?php endforeach; ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Persentase Pencapaian</span>
                            <a href="<?= base_url(); ?>">
                                <span class="info-box-number"><?= number_format(($tdaftar * 100 / $tdpt), 2); ?> %</span>
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
                            <table class="table table-sm" border="1">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Kecamatan</th>
                                        <th class="text-center">Terdaftar</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php $total = 0; ?>

                                <?php foreach ($pencapaian as $cp) : ?>
                                    <tbody>
                                        <tr>
                                            <th class="text-center" scope="row"><?= $i; ?>
                                            </th>
                                            <td><?= $cp['namakec']; ?></td>
                                            <td class="text-center"><?= $cp['total']; ?></td>
                                        </tr>


                                    </tbody>
                                    <?php $i++; ?>
                                    <?php $total += $cp['total']; ?>
                                <?php endforeach; ?>
                                <tfoot>
                                    <tr>

                                        <th colspan="2" class="text-center">Total</th>

                                        <th class="text-center"><?= $total; ?></th>
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


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" align="center">

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tim50 as $m) : ?>

                                        <tr>
                                            <td>
                                                <?= $m['noktp']; ?>
                                                <br><b><?= $m['nama']; ?></b>
                                            </td>
                                            <td>
                                                <?= $m['alamat']; ?>
                                                Kec. <?= $m['namakec']; ?> Kel. <?= $m['namakel']; ?>
                                                <br>RT <?= $m['rt']; ?> RW <?= $m['rw']; ?> TPS <?= $m['tps']; ?>

                                            </td>
                                            <td style="vertical-align: middle;">
                                                <?= $m['nohp']; ?>
                                            </td>
                                            <td class="<?= $m['status'] == 'Terdaftar DPT' ? 'bg-green' : 'bg-red'; ?>"></td>

                                        </tr>

                                        <?php $i++; ?>
                                    <?php endforeach; ?>

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

<!-- Script untuk memanggil library Highcharts -->
<script type="text/javascript">
    $(function() {
        $('#report').highcharts({
            chart: {
                type: 'line',
                margin: 75,
                options3d: {
                    enabled: false,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Laporan Suara Terdaftar',
                style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
            subtitle: {
                text: '',
                style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
                }
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: <?php echo json_encode($date); ?>
            },
            exporting: {
                enabled: false
            },
            yAxis: {
                title: {
                    text: 'Jumlah'
                },
            },
            tooltip: {
                formatter: function() {
                    return 'Tanggal <b>' + this.x + '</b>, ' + this.series.name + ' = <b>' + Highcharts.numberFormat(this.y, 0) + '</b>';
                }
            },
            series: [{
                name: 'Suara Terdaftar',
                data: <?php echo json_encode($value); ?>,
                shadow: true,
                dataLabels: {
                    enabled: true,
                    color: '#045396',
                    align: 'center',
                    formatter: function() {
                        return Highcharts.numberFormat(this.y, 0);
                    }, // one decimal
                    y: 0, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
</script>