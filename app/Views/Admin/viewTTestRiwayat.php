<?php $session = session(); ?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<?= $this->include("Admin/layout/head_tabel"); ?>

<body class="animsition">

    <?= $this->include("Admin/layout/nav") ?>

    <?= $this->include("Admin/layout/sidebar") ?>

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
                                        <a href="<?= base_url('Admin/RiwayatTest/detail_test' . '/' . $item['idjadwal']) ?>" name="btn-edit" class="btn btn-sm btn-edit btn-info">Detail</i></a>
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

    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>

    <?= $this->include("Admin/layout/js_tabel") ?>

    <script>
    function Hapus(id) {
        $('.id').val(id);
        $('#deleteModal').modal('show');
    };

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Jadwal/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#idjadwal').val(json.idjadwal);
                $('#edit_nama').val(json.nama_jadwal);
                $('#edit_mulai_daftar').val(json.tanggal_mulai_daftar);
                $('#edit_selesai_daftar').val(json.tanggal_selesai_daftar);
                $('#edit_mulai_laksana').val(json.tanggal_mulai_pelaksanaan);
                $('#edit_selesai_laksana').val(json.tanggal_selesai_pelaksanaan);

                $('#edit_jenis').append('<option selected value="' + json.idjenis + '">' + json.nama_jenis +
                    '</option>');
                $('#edit_jenis').select2('data', {
                    id: json.idjenis,
                    text: json.nama_jenis
                });
                $('#edit_jenis').trigger('change');

                $('#edit_periode').append('<option selected value="' + json.idperiode + '">' + json.namaperiode +
                    '</option>');
                $('#edit_periode').select2('data', {
                    id: json.idperiode,
                    text: json.namaperiode
                });
                $('#edit_periode').trigger('change');

            });
    }
    </script>

</body>

</html>
