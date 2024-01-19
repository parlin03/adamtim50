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
                    <div class="card">
                        <div class="card-header">
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
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" align="center">
                                <thead class=" text-dark">
                                    <tr>
                                        <TH>#</th>
                                        <TH>DPT</th>
                                        <TH>Program</th>
                                        <TH>No Telpon</th>
                                        <TH>Foto KTP</th>
                                        <TH>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    <?php foreach ($kec as $m) : ?>

                                        <tr>
                                            <th class="text-center" scope="row"><?= $i; ?>
                                            </th>
                                            <td><b><?= $m['noktp']; ?></b>
                                                <br><b><?= $m['nama']; ?></b>
                                                <br><?= $m['alamat']; ?>
                                                <br>Kel. <?= $m['namakel']; ?>
                                                Kec. <?= $m['namakec']; ?>
                                                RT. <?= $m['rt']; ?>
                                                RW. <?= $m['rw']; ?>
                                                <b>TPS. <?= $m['tps']; ?></b>
                                            </td>
                                            <td><?= $m['program']; ?></td>
                                            <td><?= $m['nohp']; ?></td>
                                            <td style="width: 150px">
                                                <a href="<?= base_url('assets/img/tim50/') . $m['image']; ?>" class="portfolio-popup">
                                                    <img src="<?= base_url('assets/img/tim50/') . $m['image']; ?> " class="img-thumbnail" />
                                                </a>
                                            </td>
                                            <td class="text-center" style="width: 120px">
                                                <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>
                                                <!-- <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a> -->
                                                <!-- <a href="" class="badge badge-danger">delete</a> -->
                                                <a href="<?= site_url('details/delete/' . $m['id'] . '/' . $m['image']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $m['nama']; ?> ?');" class="btn btn-danger btn-circle" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash"></i></a>
                                            </td>
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
                                                    <form action="<?= base_url('details/edit/') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" readonly value="<?= $m['id']; ?>" name="id" class="form-control">
                                                            <!-- <input readonly value="<?= $m['image']; ?>" name="id" class="form-control"> -->
                                                            <div class="form-group row">
                                                                <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" disabled class="form-control" id="noktp" name="noktp" value="<?= $m['noktp']; ?>" placeholder="NIK">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                                <div class="col-sm-9">
                                                                    <input disabled type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama']; ?>" placeholder="Nama">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-9">
                                                                    <textarea disabled class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $m['alamat']; ?> RT. <?= $m['rt']; ?> RW. <?= $m['rt']; ?> KEL. <?= $m['namakel']; ?> KEC. <?= $m['namakec']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <!--  -->
                                                            <div class="form-group row">
                                                                <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                                                <div class="col-sm-9">
                                                                    <input disabled type="text" class="form-control" id="tps" name="tps" value="<?= $m['tps']; ?>" placeholder="rw">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="program" class="col-sm-3 col-form-label">Program</label>
                                                                <div class="col-sm-9">
                                                                    <select class="form-control" id="program" name="program">
                                                                        <option value='Beasiswa PIP' <?php echo ($m['program'] == 'Beasiswa PIP') ? 'selected' : ''; ?>>Beasiswa PIP</option>
                                                                        <option value='Beasiswa KIP' <?php echo ($m['program'] == 'Beasiswa KIP') ? 'selected' : ''; ?>>Beasiswa KIP</option>
                                                                        <option value='BPUM' <?php echo ($m['program'] == 'BPUM') ? 'selected' : ''; ?>>BPUM</option>
                                                                        <option value='Bedah Rumah' <?php echo ($m['program'] == 'Bedah Rumah') ? 'selected' : ''; ?>>Bedah Rumah</option>
                                                                        <option value='Pelayanan' <?php echo ($m['program'] == 'Pelayanan') ? 'selected' : ''; ?>>Pelayanan</option>
                                                                        <option value='Relawan Doa Ibu' <?php echo ($m['program'] == 'Relawan Doa Ibu') ? 'selected' : ''; ?>>Relawan Doa Ibu</option>
                                                                        <option value='Tandem Paman' <?php echo ($m['program'] == 'Tandem Paman') ? 'selected' : ''; ?>>Tandem Paman</option>
                                                                        <option value='Tandem Tabir' <?php echo ($m['program'] == 'Tandem Tabir') ? 'selected' : ''; ?>>Tandem Tabir</option>
                                                                        <option value='Tim 50' <?php echo ($m['program'] == 'Tim 50') ? 'selected' : ''; ?>>Tim 50</option>
                                                                        <option value='Tim 25' <?php echo ($m['program'] == 'Tim 25') ? 'selected' : ''; ?>>Tim 25</option>
                                                                        <option value='Tim 10' <?php echo ($m['program'] == 'Tim 10') ? 'selected' : ''; ?>>Tim 10</option>
                                                                        <option value='Pasukan Timur' <?php echo ($m['program'] == 'Pasukan Timur') ? 'selected' : ''; ?>>Pasukan Timur</option>
                                                                        <option value='Pasukan Ayam Jantan' <?php echo ($m['program'] == 'Pasukan Ayam Jantan') ? 'selected' : ''; ?>>Pasukan Ayam Jantan</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $m['nohp']; ?>" placeholder="No Telpon">
                                                                    <input type="hidden" class="form-control" id="oldimage" name="oldimage" value="<?= $m['image']; ?>" placeholder="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nohp" class="col-sm-3 col-form-label">Picture</label>
                                                                <div class="col-sm-9">
                                                                    <input type="file" class="form-control mb-1" id="image" name="image" accept=".bmp,.gif,.jpeg,.jpg,.png,.tiff,.tiff,.webp">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <span class="info-box-icon bg-warning elevation-1">
                                                                        <img src="<?= base_url('assets/img/tim50/') . $m['image']; ?> " class="img-thumbnail" />
                                                                    </span>
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