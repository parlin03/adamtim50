<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark"><?= $title; ?></h1> -->
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
            <div class="row  justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Verifikasi Jaring Program</h5>
                            <!-- notif error -->
                            <!-- <?= form_error('add', '<div class="alert alert-danger" role ="alert">', '</div>'); ?> -->
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors(); ?>
                                </div>
                            <?php endif; ?>
                            <!-- notif sukses -->
                            <?= $this->session->flashdata('message'); ?>
                            <div class="row justify-content-end">

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <form action="<?= base_url('verifikasi/add'); ?>" method="POST">

                                    <div class="form-group row">
                                        <label for="nik" class="col-md-4 col-form-label">NIK</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-md-4 col-form-label">Nama</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-md-4 col-form-label">Alamat</label>
                                        <div class="col-md-8">
                                            <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kecamatan" class="col-md-4 col-form-label">Kecamatan</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                                <option value="">-- Pilih Kecamatan --</option>
                                                <?php foreach ($kec as $row) : ?>
                                                    <option value="<?php echo $row['namakec']; ?>"><?php echo $row['namakec']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kelurahan" class="col-md-4 col-form-label">Kelurahan</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
                                            <!-- <select class="form-control" name="kelurahan" id="kelurahan" required>
                                                <option>-- Pilih Kelurahan --</option>
                                            </select> -->
                                            <!-- <select name="kelurahan" id="kelurahan" class="form-control">
                                                <option value="">Pilih Kelurahan</option>
                                                <?php

                                                ?>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nohp" class="col-md-4 col-form-label">No Telpon</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Telpon">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="program" class="col-md-4 col-form-label">Jaring Program</label>
                                        <div class="col-md-8">
                                            <select name="program" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="Beasiswa PIP">Beasiswa PIP</option>
                                                <option value="Beasiswa KIP">Beasiswa KIP</option>
                                                <option value="BPUM">BPUM</option>
                                                <option value="Bedah Rumah">Bedah Rumah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="radio" class="col-md-4 col-form-label">Tanggapan</label>
                                        <div class="col-md-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tanggapan" value="Bersedia">
                                                <label class="form-check-label">Bersedia Memilih</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tanggapan" value="Tidak Bersedia">
                                                <label class="form-check-label">Tidak Bersedia Memilih</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tanggapan" value="Ragu-ragu">
                                                <label class="form-check-label">Ragu-Ragu</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="row col-md-6">
                                                <a class="btn btn-secondary" href="<?= base_url('verifikasi') ?>">Close</a>
                                            </div>
                                            <div class="row justify-content-end">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.info-box -->

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



<!-- End Modal Add New verifikasi -->

<!-- Popper -->
<!-- <script src="<?= base_url("assets/plugins/popper/popper.min.js") ?>"></script> -->

<!-- Bootstrap -->
<!-- <script src="<?= base_url("assets/plugins/bootstrap/js/bootstrap.min.js") ?>"></script> -->

<!-- jQuery UI -->
<!-- <script src="<?= base_url("assets/plugins/jquery-ui/jquery-ui.min.js") ?>"></script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        base_url = '<?= base_url() ?>';
        //request data kabupaten
        $('#kecamatan').change(function() {
            var idkec = $('#kecamatan').val(); //ambil value id dari provinsi
            var url = "<?= base_url('verifikasi/getKelurahanList') ?>";
            console.log(idkec);
            if (idkec != '') {
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        'idkec': idkec
                    },
                    success: function(data) {
                        // console.log(data);
                        $('#kelurahan').html(data)
                    }
                });
            }
        });
    });
</script>