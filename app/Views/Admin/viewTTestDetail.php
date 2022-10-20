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
                                <th style="text-align: center;">Nama Ujian</th>
                                <th style="text-align: center;">Nama Pendaftar</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Ujian</th>
                                <th style="text-align: center;">Nama Pendaftar</th>
                                <th style="text-align: center;">Email</th>
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
                                <td><?= $item['nama_pendaftar']; ?></td>
                                <td><?= $item['email']; ?></td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-edit" onclick="detail_edit(<?= $item['idtes']; ?>)"
                                            class="btn btn-sm btn-edit btn-warning">Edit</a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['idtes']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['idtes']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Test/add_test'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" style="display: none;" value="<?= $idjadwal ?>" name="input_jadwal" id="input_jadwal">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Pendaftar</label>
                            <br>
                            <select name="input_pendaftar" id="input_pendaftar" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Valid</label>
                            <select name="input_valid" class="form-control" id="input_valid" required>
                                <option value="1" selected="">Aktif</option>
                                <option value="0">Tidak Aktif</option>
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
    <form action="<?php echo base_url('Admin/Test/update_test'); ?>" method="post" id="form_edit"
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
                        <input type="hidden" style="display: none;" name="idtes" id="idtes">
                        <input type="hidden" style="display: none;" value="<?= $idjadwal ?>" name="idjadwal">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Pendaftar</label>
                            <br>
                            <select name="edit_pendaftar" id="edit_pendaftar" style="width: 100%;"
                                class="form-control select2" data-plugin="select2" required>
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
                            <label class="form-control-label"><b>Foto Bukti Pembayaran</b></label>
                            <br>
                            <input type="file" id="edit_foto" class="dropify-event" name="edit_foto"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Valid</label>
                            <select name="edit_valid" class="form-control" id="edit_valid" required>
                                <option value="1" selected="">Aktif</option>
                                <option value="0">Tidak Aktif</option>
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
    <form action="<?php echo base_url('Admin/Test/delete_test'); ?>" method="post">
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
                        <input type="hidden" style="display: none;" value="<?= $idjadwal ?>" name="idjadwal">
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
        $("#input_pendaftar").select2({
            placeholder: "Pilih Pendaftar",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Test/data_pendaftar'); ?>',
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

        $("#edit_pendaftar").select2({
            placeholder: "Pilih Pendaftar",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Test/data_pendaftar'); ?>',
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
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Test/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#idtes').val(json.idtes);

                $('#edit_pendaftar').append('<option selected value="' + json.idpendaftar + '">' + json.nama_pendaftar +
                    '</option>');
                $('#edit_pendaftar').select2('data', {
                    id: json.idpendaftar,
                    text: json.nama_pendaftar
                });
                $('#edit_pendaftar').trigger('change');

                if (json.bukti_bayar != '' || json.bukti_bayar != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.bukti_bayar);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_siswa/noimage.jpg");
                }
                
                if(json.valid == 1) {
                    document.getElementById("edit_valid").selectedIndex = 0;
                } else {
                    document.getElementById("edit_valid").selectedIndex = 1;
                }

            });
    }
    </script>

</body>

</html>
