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
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Periode</th>
                                <th style="text-align: center;">Waktu Daftar</th>
                                <th style="text-align: center;">Waktu Pelaksanaan</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Periode</th>
                                <th style="text-align: center;">Waktu Daftar</th>
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
                                <td><?= $item['tanggal_mulai_daftar']; ?> s/d <?= $item['tanggal_selesai_daftar']; ?></td>
                                <td><?= $item['tanggal_mulai_pelaksanaan']; ?> s/d <?= $item['tanggal_selesai_pelaksanaan']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-daftar" onclick="detail_edit(<?= $item['idjadwal']; ?>)"
                                            class="btn btn-sm btn-daftar btn-success">Daftar</i></a>
                                        <a href="<?= base_url('Mahasiswa/Test/detail_test' . '/' . $item['idjadwal']) ?>" name="btn-edit" class="btn btn-sm btn-edit btn-info">Detail</i></a>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Panel Table Individual column searching -->
        </div>
    </div>
    <!-- End Page -->

    <!-- Start Modal Add Class-->
    <form action="<?php echo base_url('Mahasiswa/Test/add_test'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Mahasiswa </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="input_jadwal" id="input_jadwal">
                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Pendaftar</label>
                            <input type="hidden" name="input_pendaftar" value="<?= $session->get('id_login') ?>">
                            <input type="text" class="form-control"
                                data-parsley-required="true" placeholder="Masukkan Nama Jadwal" autocomplete="off" value="<?= $session->get('nama_login') ?>" readonly/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="batal_add"
                            data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Add Class-->

    <!-- Footer -->
    <?= $this->include("Mahasiswa/layout/footer") ?>

    <?= $this->include("Mahasiswa/layout/js_tabel") ?>

    <script>
    function Hapus(id) {
        $('.id').val(id);
        $('#deleteModal').modal('show');
    };

    function detail_edit(isi) {
        $('#input_jadwal').val(isi);
    }
    </script>

</body>

</html>
