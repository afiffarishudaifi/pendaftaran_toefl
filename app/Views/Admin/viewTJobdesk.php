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
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Status</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
              $no = 1;
              foreach ($jobdesk as $item) {
              ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_siswa']; ?></td>
                                <td><?= $item['nama_jobdesk']; ?></td>
                                <td><?= $item['deskripsi']; ?></td>
                                <td><?= $item['waktu_mulai']; ?></td>
                                <td><?= $item['waktu_selesai']; ?></td>
                                <td><?= $item['status_jobdesk']; ?></td>
                                <!-- <td>
                                    <center>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['id_jobdesk']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['id_jobdesk']; ?>">Hapus</a>
                                    </center>
                                </td> -->
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
    <form action="<?php echo base_url('Admin/Jobdesk/add_jobdesk'); ?>" method="post" id="form_add"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="addModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Jobdesk </h5>
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

                        <div class="form-group form-material">
                            <label class="form-control-label">Judul Jobdesk</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Jobdesk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Deskripsi</label>
                            <textarea class="form-control" id="input_deskripsi" name="input_deskripsi"
                                rows="2" required></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Waktu Mulai</label>
                            <input type="datetime-local" value="<?= date('Y-m-d') ?>T00:00" class="form-control"
                                id="input_waktu_mulai" name="input_waktu_mulai" data-parsley-required="true"
                                placeholder="Masukkan Waktu Mulai" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Waktu Selesai</label>
                            <input type="datetime-local" value="<?= date('Y-m-d') ?>T00:00" class="form-control"
                                id="input_waktu_selesai" name="input_waktu_selesai" data-parsley-required="true"
                                placeholder="Masukkan Waktu Selesai" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Jobdesk</label>
                            <select name="input_status" class="form-control" id="input_status" required>
                                <option value="Selesai" selected="">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
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
    <form action="<?php echo base_url('Admin/Jobdesk/update_jobdesk'); ?>" method="post" id="form_edit"
        data-parsley-validate="true" autocomplete="off">
        <div class="modal fade" id="updateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Jobdesk </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;" name="id_jobdesk" id="id_jobdesk">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Siswa</label>
                            <br>
                            <select name="edit_siswa" id="edit_siswa" style="width: 100%;" class="form-control select2"
                                data-plugin="select2" required>
                            </select>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Jobdesk</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Jobdesk" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Deskripsi</label>
                            <textarea class="form-control" id="edit_deskripsi" name="edit_deskripsi"
                                rows="2" required></textarea>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Waktu Mulai</label>
                            <input type="datetime-local" value="<?= date('d/m/Y') ?>T00:00" class="form-control"
                                id="edit_waktu_mulai" name="edit_waktu_mulai" data-parsley-required="true"
                                placeholder="Masukkan Waktu Mulai" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Waktu Selesai</label>
                            <input type="datetime-local" value="<?= date('d/m/Y') ?>T00:00" class="form-control"
                                id="edit_waktu_selesai" name="edit_waktu_selesai" data-parsley-required="true"
                                placeholder="Masukkan Waktu Selesai" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status Jobdesk</label>
                            <select name="edit_status" class="form-control" id="edit_status" required>
                                <option value="Selesai" selected="">Selesai</option>
                                <option value="Belum Selesai">Belum Selesai</option>
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
    <form action="<?php echo base_url('Admin/Jobdesk/delete_jobdesk'); ?>" method="post">
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

                        <h4>Apakah Ingin menghapus job deskripsi ini?</h4>

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
        $("#input_siswa").select2({
            placeholder: "Pilih Siswa",
            theme: 'bootstrap4',
            ajax: {
                url: '<?php echo base_url('Admin/Jobdesk/data_siswa'); ?>',
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
                url: '<?php echo base_url('Admin/Jobdesk/data_siswa'); ?>',
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
            $("#input_nama").val('');
            $("#input_deskripsi").val('');
            $("#input_waktu_mulai").val('');
            $("#input_waktu_selesai").val('');
            $("#input_status").val('');
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_siswa").val('');
            $("#input_nama").val('');
            $("#input_deskripsi").val('');
            $("#input_waktu_mulai").val('');
            $("#input_waktu_selesai").val('');
            $("#input_status").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_siswa").val('');
            $("#edit_nama").val('');
            $("#edit_deskripsi").val('');
            $("#edit_waktu_mulai").val('');
            $("#edit_waktu_selesai").val('');
            $("#edit_status").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Jobdesk/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#id_jobdesk').val(json.id_jobdesk);
                $('#edit_nama').val(json.nama_jobdesk)
                $('#edit_deskripsi').val(json.deskripsi);
                $('#edit_waktu_mulai').val(json.waktu_mulai);
                $('#edit_waktu_selesai').val(json.waktu_selesai);
                $('#edit_status').val(json.status_jobdesk);

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
