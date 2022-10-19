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
                                <th style="text-align: center;">Nama Peserta</th>
                                <th style="text-align: center;">Bukti Absen</th>
                                <th style="text-align: center;">Status Absen</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Peserta</th>
                                <th style="text-align: center;">Bukti Absen</th>
                                <th style="text-align: center;">Status Absen</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($absen as $item) {
                            ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_siswa']; ?></td>
                                <td><?= $item['status_absen']; ?></td>
                                <td><?= $item['status_absen']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal"
                                            data-target="#verifikasiModal" name="btn-edit"
                                            onclick="detail_konfirmasi(<?= $item['id_absen']; ?>)"
                                            class="btn btn-sm btn-edit btn-info">Verifikasi</i></a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['id_absen']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['id_absen']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Absen/add_absen'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Absensi </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <br>
                            <select name="input_siswa" id="input_siswa" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Bukti</b></label>
                            <br>
                            <input type="file" id="input_foto" class="dropify-event" name="input_foto"
                                accept="image/png, image/gif, image/jpeg" / required>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Keterangan</label>
                            <input type="text" class="form-control" id="input_keterangan" name="input_keterangan"
                                data-parsley-required="true" placeholder="Masukkan Keterangan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Absen</label>
                            <select name="input_status" class="form-control" id="input_status" required>
                                <option value="Hadir" selected="">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Bolos">Bolos</option>
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
    <form action="<?php echo base_url('Admin/Absen/update_absen'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Absensi </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;"  name="id_absen" id="id_absen">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <br>
                            <select name="edit_siswa" id="edit_siswa" style="width: 100%;" class="form-control select2"
                                data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <center>
                                    <img id="foto_lama" style="width: 120px; height: 160px;" src="">
                                </center>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label"><b>Foto Bukti</b></label>
                            <br>
                            <input type="file" id="edit_foto" class="dropify-event" name="edit_foto"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Keterangan</label>
                            <input type="text" class="form-control" id="edit_keterangan" name="edit_keterangan"
                                data-parsley-required="true" placeholder="Masukkan Keterangan" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Absen</label>
                            <select name="edit_status" class="form-control" id="edit_status" required>
                                <option value="Hadir" selected="">Hadir</option>
                                <option value="Izin">Izin</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Bolos">Bolos</option>
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

    <!-- Modal Edit Class-->
    <form action="<?php echo base_url('Admin/Absen/konfirmasi_absen'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="verifikasiModal" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Verifikasi Absensi </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;"  name="id_absen_konfirmasi" id="id_absen_konfirmasi">



                        <div class="form-group">
                            <label class="form-control-label">Bukti Absensi</label>
                            <div class="col-md-12">
                                <center>
                                    <img id="foto_lama_konfirmasi" style="width: 120px; height: 160px;" src="">
                                </center>
                            </div>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <br>
                            <input type="text" class="form-control" id="edit_nama_konfirmasi"
                                name="edit_nama_konfirmasi" data-parsley-required="true"
                                placeholder="Masukkan Keterangan" readonly="" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Absen</label>
                            <input type="text" class="form-control" id="edit_status_konfirmasi"
                                name="edit_status_konfirmasi" data-parsley-required="true"
                                placeholder="Masukkan Keterangan" readonly="" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Konfirmasi Absen</label>
                            <select name="konfirmasi_absen" class="form-control" id="konfirmasi_absen">
                                <option value="Ya" selected="">Ya</option>
                                <option value="Tidak">Tidak</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="batal_up" data-dismiss="modal">Batal</button>
                        <button type="submit" name="update" class="btn btn-primary">Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- End Modal Edit Class-->

    <!-- Start Modal Delete Class -->
    <form action="<?php echo base_url('Admin/Absen/delete_absen'); ?>" method="post">
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

                        <h4>Apakah Ingin menghapus absensi peserta ini?</h4>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" style="display: none;"  name="id" class="id">
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
            placeholder: "Pilih Peserta Magang",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Absen/data_siswa'); ?>',
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
            placeholder: "Pilih Peserta Magang",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Absen/data_siswa'); ?>',
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

        $('#batal').on('click', function() {
            $('#form_add')[0].reset();
            $('#form_edit')[0].reset();
            $("#input_siswa").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
            $("#input_keterangan").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_siswa").val('');
            $("#input_foto").val('');
            $("#input_status").val('');
            $("#input_keterangan").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_siswa").val('');
            $("#edit_foto").val('');
            $("#edit_status").val('');
            $("#edit_keterangan").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Absen/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_absen').val(json.id_absen);
                $('#edit_waktu').val(json.waktu_absen);
                $('#edit_keterangan').val(json.keterangan);
                $('#edit_status').val(json.status_absen);

                if (json.foto_absen != '' || json.foto_absen != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto_absen);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_absen/noimage.jpg");
                }

                $('#edit_siswa').append('<option selected value="' + json.id_siswa + '">' + json.nama_siswa +
                    '</option>');
                $('#edit_siswa').select2('data', {
                    id: json.id_siswa,
                    text: json.nama_siswa
                });
                $('#edit_siswa').trigger('change');



                if (json.status_absen == 'Hadir') {
                    document.getElementById("edit_status").selectedIndex = 0;
                } else if (json.status_absen == 'Izin') {
                    document.getElementById("edit_status").selectedIndex = 1;
                } else if (json.status_absen == 'Sakit') {
                    document.getElementById("edit_status").selectedIndex = 2;
                } else {
                    document.getElementById("edit_status").selectedIndex = 3;
                }

            });
    }

    function detail_konfirmasi(isi) {
        $.getJSON('<?php echo base_url('Admin/Absen/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_absen_konfirmasi').val(json.id_absen);
                $('#edit_nama_konfirmasi').val(json.nama_siswa);
                $('#edit_keterangan_konfirmasi').val(json.keterangan);
                $('#edit_status_konfirmasi').val(json.status_absen);

                if (json.foto_absen != '' || json.foto_absen != null) {
                    $("#foto_lama_konfirmasi").attr("src", "<?= base_url() . '/' ?>" + json.foto_absen);
                } else {
                    $("#foto_lama_konfirmasi").attr("src", "<?= base_url() . '/' ?>" +
                        "docs/img/img_absen/noimage.jpg");
                }

            });
    }
    </script>

</body>

</html>
