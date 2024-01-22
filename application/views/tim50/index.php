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
                    <?= $this->session->flashdata('message1'); ?>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="info-box mb-12">
                                <form action=" <?= base_url('tim50/index')  ?>" method="POST">
                                    <div class="input-group mb-4">
                                        <input type="text" class="form-control" placeholder="Masukkan NIK..." name="keyword" autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <button type="submit" name="submit" class="btn btn-primary">Tambahkan</button>
                                            <!-- <input class="btn btn-primary" type="submit" name="submit"> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($search_result) : ?>
                <div class="search-result">
                    <hr>
                    <?php foreach ($search_result as $dptnik) : ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="info-box mb-10">
                                            <form action="<?= base_url('tim50/save'); ?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" class="form-control" id="dpt_id" name="dpt_id" value="<?= $dptnik['id']; ?>">
                                                    <input type="hidden" class="form-control" id="noktp" name="noktp" value="<?= $dptnik['noktp']; ?>">
                                                    <input type="hidden" class="form-control" id="status" name="status" value="Terdaftar DPT">
                                                    <div class="form-group row">
                                                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="noktp" name="noktp" value="<?= $dptnik['noktp']; ?>" placeholder="NIK">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="nama" name="nama" value="<?= $dptnik['nama']; ?>" placeholder="Nama">
                                                            <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $dptnik['nama']; ?>" placeholder="nama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                        <div class="col-sm-9">
                                                            <textarea disabled class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $dptnik['alamat']; ?></textarea>
                                                            <input type="hidden" class="form-control" id="alamat" name="alamat" value="<?= $dptnik['alamat']; ?>" placeholder="alamat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $dptnik['namakel']; ?>" placeholder="Kelurahan">
                                                            <input type="hidden" class="form-control" id="kelurahan" name="kelurahan" value="<?= $dptnik['namakel']; ?>" placeholder="kelurahan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $dptnik['namakec']; ?>" placeholder="Kecamatan">
                                                            <input type="hidden" class="form-control" id="kecamatan" name="kecamatan" value="<?= $dptnik['namakec']; ?>" placeholder="kecamatan">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="rw" name="rw" value="<?= $dptnik['rw']; ?>" placeholder="rw">
                                                            <input type="hidden" class="form-control" id="rw" name="rw" value="<?= $dptnik['rw']; ?>" placeholder="rw">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="rt" name="rt" value="<?= $dptnik['rt']; ?>" placeholder="rt">
                                                            <input type="hidden" class="form-control" id="rt" name="rt" value="<?= $dptnik['rt']; ?>" placeholder="rt">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                                        <div class="col-sm-9">
                                                            <input disabled type="text" class="form-control" id="tps" name="tps" value="<?= $dptnik['tps']; ?>" placeholder="Kecamatan">
                                                            <input type="hidden" class="form-control" id="tps" name="tps" value="<?= $dptnik['tps']; ?>" placeholder="tps">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $dptnik['nohp']; ?>" placeholder="No Telpon">
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Add</button>
                                                </div>
                                            </form>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <!-- <h5 class="card-title">Monthly Recap Report</h5> -->
                        <!-- notif error -->
                        <!-- <?= form_error('tim50', '<div class="alert alert-danger" role ="alert">', '</div>'); ?> -->
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <!-- notif sukses -->
                        <?= $this->session->flashdata('message'); ?>

                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="info-box mb-10">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-striped table-hover ">
                                        <thead class="text-center text-dark">
                                            <tr>
                                                <TH>#</th>
                                                <TH>DPT</th>
                                                <TH>Alamat</th>
                                                <TH>TPS</th>
                                                <TH>No Telpon</th>
                                                <TH colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>

                                            <?php foreach ($tim50 as $m) : ?>

                                                <tr>
                                                    <th class="text-center" scope="row"><?= $i; ?>
                                                    </th>
                                                    <td><?= $m['noktp']; ?>
                                                        <br><b><?= $m['nama']; ?></b>
                                                    </td>
                                                    <td>
                                                        <?= $m['alamat']; ?>
                                                        Kec. <?= $m['namakec']; ?> Kel. <?= $m['namakel']; ?>
                                                        <br>RT <?= $m['rt']; ?> RW <?= $m['rw']; ?>

                                                    </td>
                                                    <td>TPS <?= $m['tps']; ?></td>
                                                    <td><?= $m['nohp']; ?></td>

                                                    <td class="text-center ">
                                                        <?php
                                                        if ($m['status'] == 'Terdaftar DPT') {
                                                            echo '<a data-toggle="modal" data-target="#edit' . $m['id'] . '" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>';
                                                        } else {
                                                            echo '<a href="' . base_url('tim50/xedit?id=') . $m['id'] . '" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>';
                                                        }
                                                        ?>
                                                        <a href="<?= base_url('tim50/delete/' . $m['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $m['nama']; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                    <td class="<?= $m['status'] == 'Terdaftar DPT' ? 'bg-green' : 'bg-red'; ?>"></td>
                                                </tr>
                                                <?php $i++; ?>

                                                <!-- Modal Edit Tim50 -->
                                                <div class=" modal fade" id="edit<?= $m['id']; ?>" tabindex="-1" aria-labelledby="editTim50ModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editTim50ModalLabel">Edit Data</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('tim50/update?id=') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
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
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal Edit Tim50 -->

                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
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