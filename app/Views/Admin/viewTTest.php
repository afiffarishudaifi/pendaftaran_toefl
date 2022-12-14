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
                                        <a href="<?= base_url('Admin/Test/detail_test' . '/' . $item['idjadwal']) ?>" name="btn-edit" class="btn btn-sm btn-edit btn-info">Detail</i></a>
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
    <form action="<?php echo base_url('Admin/Jadwal/add_jadwal'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Jadwal </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Jadwal</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Jadwal" autocomplete="off" />
                            <span class="text-danger" id="error_nama"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Jenis</label>
                            <br>
                            <select name="input_jenis" id="input_jenis" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>                        

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Periode</label>
                            <br>
                            <select name="input_periode" id="input_periode" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Mulai Daftar</label>
                            <input type="date" class="form-control" id="input_mulai_daftar" name="input_mulai_daftar"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Selesai Daftar</label>
                            <input type="date" class="form-control" id="input_selesai_daftar" name="input_selesai_daftar"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Mulai Pelaksanaan</label>
                            <input type="date" class="form-control" id="input_mulai_laksana" name="input_mulai_laksana"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Selesai Pelaksanaan</label>
                            <input type="date" class="form-control" id="input_selesai_laksana" name="input_selesai_laksana"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <!-- <div class="form-group form-material">
                            <label class="form-control-label">Status Siswa</label>
                            <select name="input_status" class="form-control" id="input_status" required>
                                <option value="Aktif" selected="">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div> -->

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

    <!-- Modal Edit Class-->
    <form action="<?php echo base_url('Admin/Jadwal/update_jadwal'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Jadwal </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;" name="idjadwal" id="idjadwal">

                        

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Jadwal</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Jadwal" autocomplete="off" />
                            <span class="text-danger" id="error_edit_nama"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Jenis</label>
                            <br>
                            <select name="edit_jenis" id="edit_jenis" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>                        

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Periode</label>
                            <br>
                            <select name="edit_periode" id="edit_periode" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Mulai Daftar</label>
                            <input type="date" class="form-control" id="edit_mulai_daftar" name="edit_mulai_daftar"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Selesai Daftar</label>
                            <input type="date" class="form-control" id="edit_selesai_daftar" name="edit_selesai_daftar"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Mulai Pelaksanaan</label>
                            <input type="date" class="form-control" id="edit_mulai_laksana" name="edit_mulai_laksana"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Tanggal Selesai Pelaksanaan</label>
                            <input type="date" class="form-control" id="edit_selesai_laksana" name="edit_selesai_laksana"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                        </div>

                        <!-- <div class="form-group form-material">
                            <label class="form-control-label">Status Siswa</label>
                            <select name="edit_status" class="form-control" id="edit_status" required>
                                <option value="Aktif" selected="">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div> -->

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
    <form action="<?php echo base_url('Admin/Jadwal/delete_jadwal'); ?>" method="post">
        <div class="modal fade" id="deleteModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Apakah Ingin menghapus jadwal ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" style="display: none;" name="id" class="id">
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
        $("#input_jenis").select2({
            placeholder: "Pilih Jenis",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Jadwal/data_jenis'); ?>',
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

        $("#edit_jenis").select2({
            placeholder: "Pilih Jenis",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Jadwal/data_jenis'); ?>',
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

        
        $("#input_periode").select2({
            placeholder: "Pilih Periode",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Jadwal/data_periode'); ?>',
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

        $("#edit_periode").select2({
            placeholder: "Pilih Periode",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Jadwal/data_periode'); ?>',
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

        $("#input_nama").keyup(function() {
            var nama = $(this).val().trim();

            if (nama != '') {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Jadwal/cek_nama'); ?>' + '/' + nama,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_nama").html(
                                'Username telah dipakai,coba yang lain');
                            $("#input_nama").val('');
                        } else {
                            $("#error_nama").html('');
                        }
                    },
                    error: function() {

                        alert('error');
                    }
                });
            }

        });
        $("#edit_nama").keyup(function() {

            var nama = $(this).val().trim();

            if (nama != '' && nama != $('#edit_nama_lama').val()) {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Jadwal/cek_nama'); ?>' + '/' + nama,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_edit_nama").html(
                                'Nama telah dipakai,coba yang lain');
                            $("#edit_nama").val('');
                        } else {
                            $("#error_edit_nama").html('');
                        }
                    },
                    error: function() {

                        alert('error');
                    }
                });
            }
        });



        $('#batal').on('click', function() {
            $('#form_add')[0].reset();
            $('#form_edit')[0].reset();
            $("#input_nama").val('');
            $("#input_mulai_daftar").val('');
            $("#input_selesai_dafter").val('');
            $("#input_mulai_laksana").val('');
            $("#input_selesai_laksana").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_nama").val('');
            $("#input_mulai_daftar").val('');
            $("#input_selesai_dafter").val('');
            $("#input_mulai_laksana").val('');
            $("#input_selesai_laksana").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_nama").val('');
            $("#edit_mulai_daftar").val('');
            $("#edit_selesai_dafter").val('');
            $("#edit_mulai_laksana").val('');
            $("#edit_selesai_laksana").val('');
        });
    })

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
