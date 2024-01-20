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
                                            <form action="<?= base_url('tim50/add'); ?>" method="POST" enctype="multipart/form-data">
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

                                                <tr">
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
                                                        <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fas fa-fw fa-edit" aria-hidden="true"></i></a>
                                                        <!-- <a data-toggle="modal" data-target="#edit<?= $m['id']; ?>" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a> -->
                                                        <!-- <a href="" class="badge badge-danger">delete</a> -->
                                                    </td>
                                                    <td class="<?= $m['status'] == 'Terdaftar DPT' ? 'bg-green' : 'bg-red'; ?>"></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                    <?php
                                                    if ($m['status'] == 'Terdaftar DPT') {
                                                        $disable = 'disabled';
                                                    } else {
                                                        $disable = '';
                                                    }
                                                    ?>
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
                                                                <form action="<?= base_url('tim50/edit/') . $m['id']; ?>" method="POST" enctype="multipart/form-data">
                                                                    <div class="modal-body">
                                                                        <input type="hidden" readonly value="<?= $m['id']; ?>" name="id" class="form-control">
                                                                        <!-- <input readonly value="<?= $m['image']; ?>" name="id" class="form-control"> -->
                                                                        <div class="form-group row">
                                                                            <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" <?= $disable; ?> class="form-control" id="noktp" name="noktp" value="<?= $m['noktp']; ?>" placeholder="NIK">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="nama" name="nama" value="<?= $m['nama']; ?>" placeholder="Nama">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                                                            <div class="col-sm-9">
                                                                                <textarea <?= $disable; ?> class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $m['alamat']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?= $m['namakec']; ?>" placeholder="kecamatan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="kelurahan" name="kelurahan" value="<?= $m['namakel']; ?>" placeholder="kelurahan">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="rw" name="rw" value="<?= $m['rw']; ?>" placeholder="rw">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="rt" name="rt" value="<?= $m['rt']; ?>" placeholder="rt">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                                                            <div class="col-sm-9">
                                                                                <input <?= $disable; ?> type="text" class="form-control" id="tps" name="tps" value="<?= $m['tps']; ?>" placeholder="tps">
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

        <!-- Modal Add non DPT Tim50 -->
        <div class="modal fade" id="add" tabindex="-1" aria-labelledby="add non DPTTim50ModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="add non DPTTim50ModalLabel">Tambahkan Data <?= $keyword; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('tim50/add'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="status" name="status" value="Tidak Terdaftar DPT">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="noktp" name="noktp" value="<?= $keyword; ?>" placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                <div class="col-sm-9">
                                    <select id="kecamatan" name="kecamatan" class="form-control select2">
                                        <option value="" selected>Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                <div class="col-sm-9">
                                    <select id="kelurahan" name="kelurahan" class="form-control select2">
                                        <option value="" selected>Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Kelurahan">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="rw">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="rt">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tps" name="tps" placeholder="TPS">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No Telpon">
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
            </div>
        </div>
        <!-- End Modal Add non DPT Tim50 -->
</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
    // Provinsi
    $(document).ready(function() {
        $("#kecamatan").select2({
            ajax: {
                url: '<?= base_url() ?>tim50/getdatakec',
                type: "post",
                dataType: 'json',
                delay: 200,
                data: function(params) {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });

    // Kelurahan
    $("#kecamatan").change(function() {
        var idkec = $("#kecamatan").val();
        $("#kelurahan").select2({
            ajax: {
                url: '<?= base_url() ?>tim50/getdatakec/' + idkec,
                type: "post",
                dataType: 'json',
                delay: 200,
                data: function(params) {
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });




    $('#btn-filter').click(function() { //button filter event click
        dataTable_.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
        $('#kecamatan').val('').trigger('change')
        $('#kelurahan').val('').trigger('change')
        $('#form-filter')[0].reset();
        dataTable_.ajax.reload(); //just reload table
    });
</script>