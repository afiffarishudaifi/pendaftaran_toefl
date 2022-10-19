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
                <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah Data</button>
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
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Kedisiplinan</th>
                                <th>Tanggung Jawab</th>
                                <th>Kerja Sama</th>
                                <th>Kerajinan</th>
                                <th>Inisiatif</th>
                                <th>Rata-Rata</th>
                                <th>Cetak</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Kedisiplinan</th>
                                <th>Tanggung Jawab</th>
                                <th>Kerja Sama</th>
                                <th>Kerajinan</th>
                                <th>Inisiatif</th>
                                <th>Rata-Rata</th>
                                <th>Cetak</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($nilai as $item) {
                            ?>
                                <tr>
                                    <td width="1%"><?= $no++; ?></td>
                                    <td><?= $item['nama_siswa']; ?></td>
                                    <td><?= $item['kedisiplinan']; ?></td>
                                    <td><?= $item['tanggung_jawab']; ?></td>
                                    <td><?= $item['kerja_sama']; ?></td>
                                    <td><?= $item['kerajinan']; ?></td>
                                    <td><?= $item['inisiatif']; ?></td>
                                    <td><?= $item['rata_rata']; ?></td>
                                    <td>
                                        <center>
                                            <a href="<?= base_url('Admin/Nilai/generate') . '/' . $item['id_nilai'] ?>"  class="btn btn-sm btn-cetak btn-info">Cetak</i></a>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal" name="btn-edit" onclick="detail_edit(<?= $item['id_nilai']; ?>)" class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                                            <a href="" class="btn btn-sm btn-delete btn-danger" onclick="Hapus(<?= $item['id_nilai']; ?>)" data-toggle="modal" data-target="#deleteModal" data-id="<?= $item['id_nilai']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Nilai/add_nilai'); ?>" method="post" id="form_add" data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Nilai Peserta</h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Peserta</label>
                            <br>
                            <select name="input_siswa" id="input_siswa" style="width: 100%;" class="form-control select2" data-plugin="select2">
                            </select>
                        </div>

                        <!-- <div class="form-group form-material">
                            <label class="form-control-label">Sertifikat</label>
                            <br>
                            <select name="input_sertifikat" id="input_sertifikat" style="width: 100%;" class="form-control select2" data-plugin="select2">
                            </select>
                        </div> -->

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kedisiplinan</label>
                            <input type="number" class="form-control" id="input_kedisiplinan" name="input_kedisiplinan" data-parsley-required="true" placeholder="Masukkan Nilai Kedisiplinan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Tanggung Jawab</label>
                            <input type="number" class="form-control" id="input_tanggung_jawab" name="input_tanggung_jawab" data-parsley-required="true" placeholder="Masukkan Nilai Tanggung Jawab" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kerja Sama</label>
                            <input type="number" class="form-control" id="input_kerja_sama" name="input_kerja_sama" data-parsley-required="true" placeholder="Masukkan Nilai Kerja Sama" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kerajinan</label>
                            <input type="number" class="form-control" id="input_kerajinan" name="input_kerajinan" data-parsley-required="true" placeholder="Masukkan Nilai Kerajinan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Inisiatif</label>
                            <input type="number" class="form-control" id="input_inisiatif" name="input_inisiatif" data-parsley-required="true" placeholder="Masukkan Nilai Inisiatif" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Jumlah Nilai</label>
                            <input type="text" class="form-control" id="input_jumlah" name="input_jumlah" placeholder="Jumlah Nilai" readonly="">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Rata - Rata</label>
                            <input type="text" class="form-control" id="input_rata" name="input_rata" placeholder="Rata - Rata Nilai" readonly="">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="batal_add" data-dismiss="modal">Batal</button>
                        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Add Class-->

    <!-- Modal Edit Class-->
    <form action="<?php echo base_url('Admin/Nilai/update_nilai'); ?>" method="post" id="form_edit" data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Nilai Peserta</h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_nilai" id="id_nilai" style="display: none;">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Peserta</label>
                            <br>
                            <select name="edit_siswa" id="edit_siswa" style="width: 100%;" class="form-control select2" data-plugin="select2">
                            </select>
                        </div>

                        <!-- <div class="form-group form-material">
                            <label class="form-control-label">Sertifikat</label>
                            <br>
                            <select name="edit_sertifikat" id="edit_sertifikat" style="width: 100%;" class="form-control select2" data-plugin="select2">
                            </select>
                        </div> -->

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kedisiplinan</label>
                            <input type="number" class="form-control" id="edit_kedisiplinan" name="edit_kedisiplinan" data-parsley-required="true" placeholder="Masukkan Nilai Kedisiplinan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Tanggung Jawab</label>
                            <input type="number" class="form-control" id="edit_tanggung_jawab" name="edit_tanggung_jawab" data-parsley-required="true" placeholder="Masukkan Nilai Tanggung Jawab" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kerja Sama</label>
                            <input type="number" class="form-control" id="edit_kerja_sama" name="edit_kerja_sama" data-parsley-required="true" placeholder="Masukkan Nilai Kerja Sama" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Kerajinan</label>
                            <input type="number" class="form-control" id="edit_kerajinan" name="edit_kerajinan" data-parsley-required="true" placeholder="Masukkan Nilai Kerajinan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nilai Inisiatif</label>
                            <input type="number" class="form-control" id="edit_inisiatif" name="edit_inisiatif" data-parsley-required="true" placeholder="Masukkan Nilai Inisiatif" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Jumlah Nilai</label>
                            <input type="text" class="form-control" id="edit_jumlah" name="edit_jumlah" placeholder="Jumlah Nilai" readonly="">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Rata - Rata</label>
                            <input type="text" class="form-control" id="edit_rata" name="edit_rata" placeholder="Rata - Rata Nilai" readonly="">
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

    <!-- Start Modal Delete Class -->
    <form action="<?php echo base_url('Admin/Nilai/delete_nilai'); ?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"> </span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Apakah Ingin menghapus nilai peserta ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Delete Class -->


    <!-- Footer -->
    <?= $this->include("Admin/layout/footer") ?>
    <?= $this->include("Admin/layout/js_tabel") ?>

    <script>
        function Hapus(id) {
            $('.id').val(id);
            $('#deleteModal').modal('show');
        };

        $(function() {
            $("#input_siswa").select2({
                placeholder: "Pilih Siswa",
                theme: 'bootstrap4',
                ajax: {
                    url: '<?php echo base_url('Admin/Nilai/data_siswa'); ?>',
                    type: "post",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            query: params.term, // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response.data
                        };
                    },
                    cache: true
                }
            });

            $("#edit_siswa").select2({
                placeholder: "Pilih Siswa",
                theme: 'bootstrap4',
                ajax: {
                    url: '<?php echo base_url('Admin/Nilai/data_siswa'); ?>',
                    type: "post",
                    delay: 250,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            query: params.term, // search term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response.data
                        };
                    },
                    cache: true
                }
            });

            $("#input_kedisiplinan").keyup(function() {
                var hasil1 = $('#input_kedisiplinan').val();
                var hasil2 = $('#input_tanggung_jawab').val();
                var hasil3 = $('#input_kerja_sama').val();
                var hasil4 = $('#input_kerajinan').val();
                var hasil5 = $('#input_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#input_jumlah').val(total);
                $('#input_rata').val(rata);
            });

            $("#input_tanggung_jawab").keyup(function() {
                var hasil1 = $('#input_kedisiplinan').val();
                var hasil2 = $('#input_tanggung_jawab').val();
                var hasil3 = $('#input_kerja_sama').val();
                var hasil4 = $('#input_kerajinan').val();
                var hasil5 = $('#input_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#input_jumlah').val(total);
                $('#input_rata').val(rata);
            });

            $("#input_kerja_sama").keyup(function() {
                var hasil1 = $('#input_kedisiplinan').val();
                var hasil2 = $('#input_tanggung_jawab').val();
                var hasil3 = $('#input_kerja_sama').val();
                var hasil4 = $('#input_kerajinan').val();
                var hasil5 = $('#input_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#input_jumlah').val(total);
                $('#input_rata').val(rata);
            });

            $("#input_kerajinan").keyup(function() {
                var hasil1 = $('#input_kedisiplinan').val();
                var hasil2 = $('#input_tanggung_jawab').val();
                var hasil3 = $('#input_kerja_sama').val();
                var hasil4 = $('#input_kerajinan').val();
                var hasil5 = $('#input_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#input_jumlah').val(total);
                $('#input_rata').val(rata);
            });

            $("#input_inisiatif").keyup(function() {
                var hasil1 = $('#input_kedisiplinan').val();
                var hasil2 = $('#input_tanggung_jawab').val();
                var hasil3 = $('#input_kerja_sama').val();
                var hasil4 = $('#input_kerajinan').val();
                var hasil5 = $('#input_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#input_jumlah').val(total);
                $('#input_rata').val(rata);
            });

            $("#edit_kedisiplinan").keyup(function() {
                var hasil1 = $('#edit_kedisiplinan').val();
                var hasil2 = $('#edit_tanggung_jawab').val();
                var hasil3 = $('#edit_kerja_sama').val();
                var hasil4 = $('#edit_kerajinan').val();
                var hasil5 = $('#edit_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#edit_jumlah').val(total);
                $('#edit_rata').val(rata);
            });

            $("#edit_tanggung_jawab").keyup(function() {
                var hasil1 = $('#edit_kedisiplinan').val();
                var hasil2 = $('#edit_tanggung_jawab').val();
                var hasil3 = $('#edit_kerja_sama').val();
                var hasil4 = $('#edit_kerajinan').val();
                var hasil5 = $('#edit_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#edit_jumlah').val(total);
                $('#edit_rata').val(rata);
            });

            $("#edit_kerja_sama").keyup(function() {
                var hasil1 = $('#edit_kedisiplinan').val();
                var hasil2 = $('#edit_tanggung_jawab').val();
                var hasil3 = $('#edit_kerja_sama').val();
                var hasil4 = $('#edit_kerajinan').val();
                var hasil5 = $('#edit_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#edit_jumlah').val(total);
                $('#edit_rata').val(rata);
            });

            $("#edit_kerajinan").keyup(function() {
                var hasil1 = $('#edit_kedisiplinan').val();
                var hasil2 = $('#edit_tanggung_jawab').val();
                var hasil3 = $('#edit_kerja_sama').val();
                var hasil4 = $('#edit_kerajinan').val();
                var hasil5 = $('#edit_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#edit_jumlah').val(total);
                $('#edit_rata').val(rata);
            });

            $("#edit_inisiatif").keyup(function() {
                var hasil1 = $('#edit_kedisiplinan').val();
                var hasil2 = $('#edit_tanggung_jawab').val();
                var hasil3 = $('#edit_kerja_sama').val();
                var hasil4 = $('#edit_kerajinan').val();
                var hasil5 = $('#edit_inisiatif').val();
                var total = parseInt(hasil1) + parseInt(hasil2) + parseInt(hasil3) + parseInt(hasil4) + parseInt(hasil5);
                var rata = parseInt(total) / 5;

                $('#edit_jumlah').val(total);
                $('#edit_rata').val(rata);
            });

            $('#batal').on('click', function() {
                $('#form_add')[0].reset();
                $('#form_edit')[0].reset();
                $("#input_kedisiplinan").val('');
                $("#input_tanggung_jawab").val('');
                $("#input_kerja_sama").val('');
                $("#input_kerajinan").val('');
                $("#input_inisiatif").val('');
                $("#input_jumlah").val('');
                $("#input_rata").val('');
            });

            $('#batal_add').on('click', function() {
                $('#form_add')[0].reset();
                $("#input_siswa").val('');
                $("#input_sertifikat").val('');
                $("#input_kedisiplinan").val('');
                $("#input_tanggung_jawab").val('');
                $("#input_kerja_sama").val('');
                $("#input_kerajinan").val('');
                $("#input_inisiatif").val('');
                $("#input_jumlah").val('');
                $("#input_rata").val('');
            });

            $('#batal_up').on('click', function() {
                $('#form_edit')[0].reset();
                $("#edit_siswa").val('');
                $("#edit_sertifikat").val('');
                $("#edit_kedisiplinan").val('');
                $("#edit_tanggung_jawab").val('');
                $("#edit_kerja_sama").val('');
                $("#edit_kerajinan").val('');
                $("#edit_inisiatif").val('');
                $("#edit_jumlah").val('');
                $("#edit_rata").val('');
            });
        })

        function detail_edit(isi) {
            $.getJSON('<?php echo base_url('Admin/Nilai/data_edit'); ?>' + '/' + isi, {},
                function(json) {
                    $('#id_nilai').val(json.id_nilai);
                    $('#edit_kedisiplinan').val(json.kedisiplinan);
                    $('#edit_tanggung_jawab').val(json.tanggung_jawab);
                    $('#edit_kerja_sama').val(json.kerja_sama);
                    $('#edit_kerajinan').val(json.kerajinan);
                    $('#edit_inisiatif').val(json.inisiatif);
                    $('#edit_jumlah').val(json.jumlah);
                    $('#edit_rata').val(json.rata_rata);

                    $('#edit_siswa').append('<option selected value="' + json.id_siswa + '">' + json.nama_siswa +
                        '</option>');
                    $('#edit_siswa').select2('data', {
                        id: json.id_siswa,
                        text: json.nama_siswa
                    });
                    $('#edit_siswa').trigger('change');
                });
        }
    </script>

</body>

</html>
