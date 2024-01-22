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
            <div class="row justify-content-center">
                <div class="col-sm-4">
                    <?= $this->session->flashdata('message1'); ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Data NIK <?= $xedit->noktp; ?></h5>
                            <button type="button" class="close" data-dismiss="card" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() . $update . $xedit->id; ?>" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" class="form-control" id="status" name="status" value="Tidak Terdaftar DPT">
                                <div class="form-group row">
                                    <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="noktp" name="noktp" value="<?= $xedit->noktp; ?>" placeholder="NIK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $xedit->nama; ?>" placeholder="Nama">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Alamat ..."><?= $xedit->alamat; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                                    <div class="col-sm-9">
                                        <select id="kecamatan" name="kecamatan" class="form-control" required>
                                            <option value="">Pilih Kecamatan</option>
                                            <?php
                                            foreach ($kecamatan as $data) { // Lakukan looping pada variabel siswa dari controller
                                                if ($xedit->namakec == $data->namakec) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo '<option value="' . $data->namakec . '" ' . $selected . '>' . $data->namakec . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                                    <div class="col-sm-9">
                                        <select id="kelurahan" name="kelurahan" class="form-control">
                                            <option value="" selected>Pilih Kelurahan</option>
                                            <?php
                                            foreach ($kelurahan as $data) { // Lakukan looping pada variabel siswa dari controller
                                                if ($xedit->namakel == $data->namakel) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo '<option value="' . $data->namakel . '" ' . $selected . '>' . $data->namakel . '</option>';
                                            }
                                            ?>
                                        </select>
                                        <div id="loading" style="margin-top: 15px;">
                                            <img src="<?= base_url('assets/img/loading.gif'); ?>" width="18"> <small>Loading...</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rw" class="col-sm-3 col-form-label">RW</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="rw" name="rw" value="<?= $xedit->rw; ?>" placeholder="rw">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rt" class="col-sm-3 col-form-label">RT</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="rt" name="rt" value="<?= $xedit->rt; ?>" placeholder="rt">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tps" class="col-sm-3 col-form-label">TPS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tps" name="tps" value="<?= $xedit->tps; ?>" placeholder="TPS">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nohp" class="col-sm-3 col-form-label">No Telpon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $xedit->nohp; ?>" placeholder="No Telpon">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">

                                    <div class="col-sm-6 d-flex justify-content-center mt-3 mb-3">
                                        <a href="<?= base_url('tim50/index'); ?>" class="btn btn-secondary">Cancel</a>
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

        </div>





</div><!--/. container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>

<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
        // Kita sembunyikan dulu untuk loadingnya
        $("#loading").hide();

        $("#kecamatan").change(function() { // Ketika user mengganti atau memilih data kecamatan
            $("#kelurahan").hide(); // Sembunyikan dulu combobox kelurahan nya
            $("#loading").show(); // Tampilkan loadingnya

            $.ajax({
                type: "POST", // Method pengiriman data bisa dengan GET atau POST
                url: "<?php echo base_url("tim50/listKelurahan"); ?>", // Isi dengan url/path file php yang dituju
                data: {
                    id_kecamatan: $("#kecamatan").val()
                }, // data yang akan dikirim ke file yang dituju
                dataType: "json",
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function(response) { // Ketika proses pengiriman berhasil
                    $("#loading").hide(); // Sembunyikan loadingnya

                    // set isi dari combobox kelurahan
                    // lalu munculkan kembali combobox kelurahannya
                    $("#kelurahan").html(response.list_kelurahan).show();
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
                }
            });
        });
    });
</script>