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
                                <th style="text-align: center;">Sekolah</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Alamat Peserta</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Sekolah</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Alamat Peserta</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                    $no = 1;
                    foreach ($siswa as $item) {
                    ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_siswa']; ?></td>
                                <td><?= $item['nama_sekolah']; ?></td>
                                <td><?= $item['status']; ?></td>
                                <td><?= $item['alamat_siswa']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-edit" onclick="detail_edit(<?= $item['id_siswa']; ?>)"
                                            class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['id_siswa']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['id_siswa']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Peserta/add_siswa'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Siswa </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Sekolah</label>
                            <br>
                            <select name="input_sekolah" id="input_sekolah" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nomor Induk</label>
                            <input type="text" class="form-control" id="input_nis" name="input_nis"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                            <span class="text-danger" id="error_nis"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Username Siswa</label>
                            <input type="text" class="form-control" id="input_username" name="input_username"
                                data-parsley-required="true" placeholder="Masukkan Username Siswa" autocomplete="off" />
                            <span class="text-danger" id="error_username"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-group form-material">Password Siswa</label>
                            <input type="Password" class="form-control" id="input_password" name="input_password"
                                data-parsley-required="true" placeholder="Masukkan Password Siswa" autofocus="on">
                        </div>
                        <div class="form-group form-material">
                            <label class="form-group form-material">Ulangi Password</label>
                            <input type="Password" class="form-control" id="input_password_konfirmasi"
                                name="input_password_konfirmasi" data-parsley-required="true"
                                placeholder="Masukkan Ulangi Password" autofocus="on"
                                data-parsley-equalto="#input_password">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Email Siswa</label>
                            <input type="email" class="form-control" id="input_email" name="input_email"
                                data-parsley-required="true" placeholder="Masukkan Email Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="input_no_telp" name="input_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Peserta</label>
                            <textarea class="form-control" id="input_alamat" name="input_alamat"
                                data-parsley-required="true" placeholder="Masukkan Alamat"></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Jurusan</label>
                            <input type="text" class="form-control" id="input_jurusan" name="input_jurusan"
                                data-parsley-required="true" placeholder="Masukkan Jurusan" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Siswa</b></label>
                            <br>
                            <input type="file" id="input_foto" class="dropify-event" name="input_foto"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Siswa</label>
                            <select name="input_status" class="form-control" id="input_status" required>
                                <option value="Aktif" selected="">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
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
    <form action="<?php echo base_url('Admin/Peserta/update_siswa'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Siswa </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;" name="id_siswa" id="id_siswa">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Sekolah</label>
                            <br>
                            <select name="edit_sekolah" id="edit_sekolah" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nomor Induk</label>
                            <input type="text" class="form-control" id="edit_nis" name="edit_nis"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                            <span class="text-danger" id="error_nis"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Username Siswa</label>
                            <input type="text" class="form-control" id="edit_username" name="edit_username"
                                data-parsley-required="true" placeholder="Masukkan Username Siswa" autocomplete="off" />
                            <span class="text-danger" id="error_username"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-group form-material">Password Siswa</label>
                            <input type="Password" class="form-control" id="edit_password" name="edit_password"
                                placeholder="Masukkan Password Siswa" autofocus="on">
                        </div>
                        <div class="form-group form-material">
                            <label class="form-group form-material">Ulangi Password</label>
                            <input type="Password" class="form-control" id="edit_password_konfirmasi"
                                name="edit_password_konfirmasi" placeholder="Masukkan Ulangi Password" autofocus="on"
                                data-parsley-equalto="#edit_password">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Email Siswa</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email"
                                data-parsley-required="true" placeholder="Masukkan Email Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Peserta</label>
                            <textarea class="form-control" id="edit_alamat" name="edit_alamat"
                                data-parsley-required="true" placeholder="Masukkan Alamat"></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Jurusan</label>
                            <input type="text" class="form-control" id="edit_jurusan" name="edit_jurusan"
                                data-parsley-required="true" placeholder="Masukkan Jurusan" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <center>
                                    <img id="foto_lama" style="width: 120px; height: 160px;" src="">
                                </center>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Siswa</b></label>
                            <br>
                            <input type="file" id="edit_foto" class="dropify-event" name="edit_foto"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Siswa</label>
                            <select name="edit_status" class="form-control" id="edit_status" required>
                                <option value="Aktif" selected="">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
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
    <form action="<?php echo base_url('Admin/Peserta/delete_siswa'); ?>" method="post">
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

                        <h4>Apakah Ingin menghapus siswa ini?</h4>

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
        $("#input_sekolah").select2({
            placeholder: "Pilih Sekolah",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Peserta/data_sekolah'); ?>',
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

        $("#edit_sekolah").select2({
            placeholder: "Pilih Sekolah",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Peserta/data_sekolah'); ?>',
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

        $("#input_username").keyup(function() {
            var username = $(this).val().trim();

            if (username != '') {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Peserta/cek_username'); ?>' + '/' + username,
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
                    url: '<?php echo base_url('Admin/Peserta/cek_username'); ?>' + '/' + username,
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
            $("#input_nama").val('');
            $("#input_username").val('');
            $("#input_sekolah").val('');
            $("#input_nis").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_email").val('');
            $("#input_no_telp").val('');
            $("#input_alamat").val('');
            $("#input_jurusan").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_nama").val('');
            $("#input_username").val('');
            $("#input_sekolah").val('');
            $("#input_nis").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_email").val('');
            $("#input_no_telp").val('');
            $("#input_alamat").val('');
            $("#input_jurusan").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_username").val('');
            $("#edit_sekolah").val('');
            $("#edit_nis").val('');
            $("#edit_password").val('');
            $("#edit_password_konfirmasi").val('');
            $("#edit_email").val('');
            $("#edit_no_telp").val('');
            $("#edit_alamat").val('');
            $("#edit_jurusan").val('');
            $("#edit_foto").val('');
            $("#edit_status").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Peserta/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_siswa').val(json.id_siswa);
                $('#edit_nis').val(json.nomor_induk);
                $('#edit_username').val(json.username_siswa);
                $('#edit_nama').val(json.nama_siswa);
                $('#edit_email').val(json.email_siswa);
                $('#edit_no_telp').val(json.no_telp_siswa);
                $('#edit_alamat').val(json.alamat_siswa);
                $('#edit_jurusan').val(json.jurusan);
                $('#edit_status').val(json.status);

                if (json.foto_resmi != '' || json.foto_resmi != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto_resmi);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_siswa/noimage.jpg");
                }

                $('#edit_sekolah').append('<option selected value="' + json.id_sekolah + '">' + json.nama_sekolah +
                    '</option>');
                $('#edit_sekolah').select2('data', {
                    id: json.id_sekolah,
                    text: json.nama_sekolah
                });
                $('#edit_sekolah').trigger('change');

            });
    }
    </script>

</body>

</html>
