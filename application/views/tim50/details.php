<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= $title; ?></h1>
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                    <!-- notif error -->
                    <!-- <?= form_error('vjp', '<div class="alert alert-danger" role ="alert">', '</div>'); ?> -->
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- notif sukses -->
                    <?= $this->session->flashdata('message'); ?>
                    <!--  -->
                    <div class="card">
                        <div class="card-body ">
                            <table id="details" class="table table-bordered table-striped">
                                <thead class=" text-dark">
                                    <tr>
                                        <TH>#</th>
                                        <TH>DPT</th>
                                        <TH>Alamat</th>
                                        <TH>TPS</th>
                                        <TH>No Telpon</th>
                                        <TH>Aksi</th>
                                        <TH></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php foreach ($details as $m) : ?>

                                        <tr>
                                            <td class="text-center" scope="row"><?= $i; ?>
                                            </td>
                                            <td><b><?= $m['noktp']; ?></b>
                                                <br><b><?= $m['nama']; ?></b>
                                            </td>
                                            <td>
                                                <?= $m['alamat']; ?>
                                                <br>Kel. <?= $m['namakel']; ?>
                                                Kec. <?= $m['namakec']; ?>
                                                RT. <?= $m['rt']; ?>
                                                RW. <?= $m['rw']; ?>

                                            </td>
                                            <td><b>TPS. <?= $m['tps']; ?></b></td>
                                            <td><?= $m['nohp']; ?></td>

                                            <td class="text-center" style="width: 120px">
                                                <?php
                                                if ($m['status'] == 'Terdaftar DPT') {
                                                    echo '<a data-toggle="modal" data-target="#edit' . $m['id'] . '" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>';
                                                } else {
                                                    echo '<a href="' . base_url('tim50/xedit?id=') . $m['id'] . '&fm=detail" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>';
                                                }
                                                ?>

                                                <a href="<?= site_url('tim50/deletedetail/' . $m['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $m['nama']; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td style="width: 0.1em" class="<?= $m['status'] == 'Terdaftar DPT' ? 'bg-green' : 'bg-red'; ?>"></td>
                                        </tr>
                                        <?php $i++; ?>

                                        <!-- Modal Edit Verifikasi -->
                                        <div class="modal fade" id="edit<?= $m['id']; ?>" tabindex="-1" aria-labelledby="editVerifikasiModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editVerifikasiModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('tim50/updatedetail?id=') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" readonly value="<?= $m['id']; ?>" name="id" class="form-control">
                                                            <input type="hidden" readonly value="<?= $m['status']; ?>" name="status" class="form-control">
                                                            <!-- <input readonly value="<?= $m['image']; ?>" name="id" class="form-control"> -->
                                                            <div class="form-group row">
                                                                <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="noktp" name="noktp" value="<?= $m['noktp']; ?>" placeholder="NIK">
                                                                    <input type="text" disabled class="form-control" id="noktp" name="noktp" value="<?= $m['noktp']; ?>" placeholder="NIK">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $m['nama']; ?>" placeholder="Nama">
                                                                    <input disabled type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama']; ?>" placeholder="Nama">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                <input type="hidden" class="form-control" id="alamat" name="alamat" value="<?= $m['alamat']; ?>" placeholder="Nama">
                                                                <div class="col-sm-9">
                                                                    <textarea disabled class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $m['alamat']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="kecamatan" name="kecamatan" value="<?= $m['namakec']; ?>" placeholder="kecamatan" style="width: 100%;">
                                                                    <input disabled type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $m['namakec']; ?>" placeholder="kecamatan" style="width: 100%;">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="kelurahan" name="kelurahan" value="<?= $m['namakel']; ?>" placeholder="kelurahan">
                                                                    <input disabled type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $m['namakel']; ?>" placeholder="kelurahan">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="rw" name="rw" value="<?= $m['rw']; ?>" placeholder="rw">
                                                                    <input disabled type="text" class="form-control" id="rw" name="rw" value="<?= $m['rw']; ?>" placeholder="rw">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="rt" name="rt" value="<?= $m['rt']; ?>" placeholder="rt">
                                                                    <input disabled type="text" class="form-control" id="rt" name="rt" value="<?= $m['rt']; ?>" placeholder="rt">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                                                <div class="col-sm-9">
                                                                    <input type="hidden" class="form-control" id="tps" name="tps" value="<?= $m['tps']; ?>" placeholder="tps">
                                                                    <input disabled type="text" class="form-control" id="tps" name="tps" value="<?= $m['tps']; ?>" placeholder="tps">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $m['nohp']; ?>" placeholder="No Telpon">

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="row">

                                                                <div class="col-sm-6 d-flex justify-content-center mt-3 mb-3">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                <div class="col-sm-6 d-flex justify-content-center mt-3 mb-3">
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Modal Edit verifikasi -->

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.info-box-content -->

                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jQuery -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#details").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false
        })

    });
</script>