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
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Institusi</th>
                                <th style="text-align: center;">Email Pendaftar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Institusi</th>
                                <th style="text-align: center;">Email Pendaftar</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                    $no = 1;
                    foreach ($pendaftar as $item) {
                    ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_pendaftar']; ?></td>
                                <td><?= $item['institusi']; ?></td>
                                <td><?= $item['email']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-edit" onclick="detail_edit(<?= $item['idpendaftar']; ?>)"
                                            class="btn btn-sm btn-edit btn-warning">Edit</i></a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['idpendaftar']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['idpendaftar']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Pendaftar/add_pendaftar'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pendaftar </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="input_nim" name="input_nim"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk Mahasiswa" autocomplete="off" />
                            <span class="text-danger" id="error_nim"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-group form-material">Password Mahasiswa</label>
                            <input type="Password" class="form-control" id="input_password" name="input_password"
                                data-parsley-required="true" placeholder="Masukkan Password Mahasiswa" autofocus="on">
                        </div>
                        <div class="form-group form-material">
                            <label class="form-group form-material">Ulangi Password</label>
                            <input type="Password" class="form-control" id="input_password_konfirmasi"
                                name="input_password_konfirmasi" data-parsley-required="true"
                                placeholder="Masukkan Ulangi Password" autofocus="on"
                                data-parsley-equalto="#input_password">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Email Mahasiswa</label>
                            <input type="email" class="form-control" id="input_email" name="input_email"
                                data-parsley-required="true" placeholder="Masukkan Email Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="input_no_telp" name="input_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Institusi</label>
                            <input type="text" class="form-control" id="input_institusi" name="input_institusi"
                                data-parsley-required="true" placeholder="Masukkan Institusi" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Mahasiswa</b></label>
                            <br>
                            <input type="file" id="input_foto" class="dropify-event" name="input_foto"
                                accept="image/png, image/gif, image/jpeg" />
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
    <form action="<?php echo base_url('Admin/Pendaftar/update_pendaftar'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Mahasiswa </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;" name="idpendaftar" id="idpendaftar">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="edit_nim" name="edit_nim"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk Mahasiswa" autocomplete="off" />
                            <span class="text-danger" id="error_nim"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-group form-material">Password Mahasiswa</label>
                            <input type="Password" class="form-control" id="edit_password" name="edit_password"
                                placeholder="Masukkan Password Mahasiswa" autofocus="on">
                        </div>
                        <div class="form-group form-material">
                            <label class="form-group form-material">Ulangi Password</label>
                            <input type="Password" class="form-control" id="edit_password_konfirmasi"
                                name="edit_password_konfirmasi" placeholder="Masukkan Ulangi Password" autofocus="on"
                                data-parsley-equalto="#edit_password">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Email Mahasiswa</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email"
                                data-parsley-required="true" placeholder="Masukkan Email Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Institusi</label>
                            <input type="text" class="form-control" id="edit_institusi" name="edit_institusi"
                                data-parsley-required="true" placeholder="Masukkan Institusi" autocomplete="off" />
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <center>
                                    <img id="foto_lama" style="width: 120px; height: 160px;" src="">
                                </center>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Mahasiswa</b></label>
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

    <!-- Start Modal Delete Class -->
    <form action="<?php echo base_url('Admin/Pendaftar/delete_pendaftar'); ?>" method="post">
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

                        <h4>Apakah Ingin menghapus mahasiswa ini?</h4>

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
        $('#batal').on('click', function() {
            $('#form_add')[0].reset();
            $('#form_edit')[0].reset();
            $("#input_nama").val('');
            $("#input_sekolah").val('');
            $("#input_nim").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_email").val('');
            $("#input_no_telp").val('');
            $("#input_institusi").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_nama").val('');
            $("#input_sekolah").val('');
            $("#input_nim").val('');
            $("#input_password").val('');
            $("#input_password_konfirmasi").val('');
            $("#input_email").val('');
            $("#input_no_telp").val('');
            $("#input_institusi").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_sekolah").val('');
            $("#edit_nim").val('');
            $("#edit_password").val('');
            $("#edit_password_konfirmasi").val('');
            $("#edit_email").val('');
            $("#edit_no_telp").val('');
            $("#edit_institusi").val('');
            $("#edit_foto").val('');
            $("#edit_status").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Pendaftar/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#idpendaftar').val(json.idpendaftar);
                $('#edit_nim').val(json.nim);
                $('#edit_nama').val(json.nama_pendaftar);
                $('#edit_email').val(json.email);
                $('#edit_no_telp').val(json.no_telp);
                $('#edit_institusi').val(json.institusi);

                if (json.foto != '' || json.foto != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_siswa/noimage.jpg");
                }
            });
    }
    </script>

</body>

</html>
