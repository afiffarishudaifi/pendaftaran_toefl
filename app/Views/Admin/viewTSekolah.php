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
                <button class="btn btn-sm btn-primary btn-round" data-toggle="modal" data-target="#addModal"><i
                        class="fa fa-plus"></i> Tambah Data</button>
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
                                <th>NO</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat Sekolah</th>
                                <th>No Telepon</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NO</th>
                                <th>Nama Sekolah</th>
                                <th>Alamat Sekolah</th>
                                <th>No Telepon</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($sekolah as $item) {
                            ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_sekolah']; ?></td>
                                <td><?= $item['alamat_sekolah']; ?></td>
                                <td><?= $item['no_telp_sekolah']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-edit" onclick="detail_edit(<?= $item['id_sekolah']; ?>)"
                                            class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['id_sekolah']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['id_sekolah']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Sekolah/add_sekolah'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Sekolah </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Sekolah</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Sekolah" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Sekolah</label>
                            <textarea class="form-control" id="input_alamat" name="input_alamat" rows="2" required></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telepon</label>
                            <input type="text" class="form-control" id="input_no_telp" name="input_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telepon Sekolah"
                                autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Username</label>
                            <input type="text" class="form-control" id="input_username" name="input_username"
                                data-parsley-required="true" placeholder="Masukkan Username Sekolah"
                                autocomplete="off" />
                            <span class="text-danger" id="error_username"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control" id="input_password" name="input_password"
                                data-parsley-required="true" placeholder="Masukkan Password Sekolah"
                                autocomplete="off" />
                        </div>
                        <div class="form-group form-material">
                            <label class="form-control-label">Ulangi Password</label>
                            <input type="Password" class="form-control" id="input_password_konfirmasi"
                                name="input_password_konfirmasi" data-parsley-required="true"
                                placeholder="Ulangi Password Sekolah" autofocus="on"
                                data-parsley-equalto="#input_password">
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

    <!-- Modal Edit Class-->
    <form action="<?php echo base_url('Admin/Sekolah/update_sekolah'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Sekolah </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_sekolah" id="id_sekolah">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Sekolah</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Sekolah" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Sekolah</label>
                            <textarea class="form-control" id="edit_alamat" name="edit_alamat" rows="2" required></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telepon</label>
                            <input type="text" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telepon Sekolah"
                                autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="edit_username"
                                data-parsley-required="true" placeholder="Masukkan Username Sekolah"
                                autocomplete="off" />
                            <span class="text-danger" id="error_edit_username"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control" id="edit_password" name="edit_password"
                                placeholder="Masukkan Password Sekolah" autocomplete="off" />
                        </div>
                        <div class="form-group form-material">
                            <label class="form-control-label">Ulangi Password</label>
                            <input type="Password" class="form-control" id="edit_password_konfirmasi"
                                name="edit_password_konfirmasi" placeholder="Ulangi Password Sekolah" autofocus="on"
                                data-parsley-equalto="#edit_password">
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
    <form action="<?php echo base_url('Admin/Sekolah/delete_sekolah'); ?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi Hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <h4>Apakah Ingin menghapus sekolah ini?</h4>

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
        $("#input_username").keyup(function() {
            var username = $(this).val().trim();
            if (username != '') {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Sekolah/cek_username'); ?>' + '/' + username,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_username").html(
                                'Username telah dipakai,coba yang lain');
                            $("#input_username").val('');
                        } else {
                            $("#error_username").html('');
                        }
                    },
                    error: function() {

                        alert('error');
                    }
                });
            }

        });
        $("#edit_username").keyup(function() {

            var username = $(this).val().trim();

            if (username != '' && username != $('#edit_username_lama').val()) {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Sekolah/cek_username'); ?>' + '/' + username,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_edit_username").html(
                                'Username telah dipakai,coba yang lain');
                            $("#edit_username").val('');
                        } else {
                            $("#error_edit_username").html('');
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
            $("#input_username").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_nama").val('');
            $("#input_alamat").val('');
            $("#input_no_telp").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_username").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_nama").val('');
            $("#input_alamat").val('');
            $("#input_no_telp").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_username").val('');
            $("#edit_password").val('');
            $("#edit_password_konfirmasi").val('');
            $("#edit_nama").val('');
            $("#edit_alamat").val('');
            $("#edit_no_telp").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Sekolah/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_sekolah').val(json.id_sekolah);
                $('#edit_username').val(json.username_sekolah);
                $('#edit_nama').val(json.nama_sekolah);
                $('#edit_alamat').val(json.alamat_sekolah);
                $('#edit_no_telp').val(json.no_telp_sekolah);
            });
    }
    </script>

</body>

</html>
