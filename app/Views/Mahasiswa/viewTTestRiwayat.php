<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?= $this->include("Mahasiswa/layout/head_tabel"); ?>

<body class="animsition">

    <?= $this->include("Mahasiswa/layout/nav") ?>

    <?= $this->include("Mahasiswa/layout/sidebar") ?>

    <!-- Page -->
    <div class="page">
        <div class="page-header">
            <h1 class="page-title"><?= $judul; ?></h1>
            <div class="page-header-actions">
                <!-- <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#addModal"><i
                        class="fa fa-plus"></i> Tambah Data</button> -->
            </div>
        </div>

        <div class="page-content">

            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped w-full" id="exampleTableSearch">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Jadwal</th>
                                <th style="text-align: center;">Periode</th>
                                <th style="text-align: center;">Nama Pendaftar</th>
                                <th style="text-align: center;">Waktu Pelaksanaan</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Jadwal</th>
                                <th style="text-align: center;">Periode</th>
                                <th style="text-align: center;">Nama Pendaftar</th>
                                <th style="text-align: center;">Waktu Pelaksanaan</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                    $no = 1;
                    foreach ($jadwal as $item) {
                    ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_jadwal']; ?></td>
                                <td><?= $item['nama_periode']; ?></td>
                                <td><?= $item['nama_pendaftar']; ?></td>
                                <td><?= $item['tanggal_mulai_pelaksanaan']; ?> s/d <?= $item['tanggal_selesai_pelaksanaan']; ?></td>
                                <td>
                                    <center>
                                            <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                                name="btn-edit" onclick="detail_edit(<?= $item['idtes']; ?>)"
                                                class="btn btn-sm btn-edit btn-warning">Upload Sertifikat</a>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->

            

            <!-- Modal Edit Class-->
            <form action="<?php echo base_url('Mahasiswa/RiwayatTest/upload_sertifikat'); ?>" method="post" id="form_edit"
                data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
                <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <?= csrf_field(); ?>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Upload Sertifikat</h5>
                                <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="text" style="display: none;" name="idtes" id="idtes">

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <center>
                                            <img id="foto_lama" style="width: 120px; height: 160px;" src="">
                                        </center>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label"><b>Foto Bukti Pembayaran</b></label>
                                    <br>
                                    <input type="file" id="edit_foto" class="dropify-event" name="edit_foto"
                                        accept="image/png, image/gif, image/jpeg" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" id="batal_up" data-dismiss="modal">Batal</button>
                                <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Modal Edit Class-->

        </div>
    </div>
    <!-- End Page -->

    <!-- Footer -->
    <?= $this->include("Mahasiswa/layout/footer") ?>

    <?= $this->include("Mahasiswa/layout/js_tabel") ?>

    <script>
    function Hapus(id) {
        $('.id').val(id);
        $('#deleteModal').modal('show');
    };

    function detail_edit(isi) {
        $('#idtes').val(isi);
        $.getJSON('<?php echo base_url('Mahasiswa/Test/data_edit'); ?>' + '/' + isi, {},
            function(json) {

                if (json.sertifikat != '' || json.sertifikat != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.sertifikat);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_bukti/noimage.jpg");
                }
            });
    }
    </script>

</body>

</html>
