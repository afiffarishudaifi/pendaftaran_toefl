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
                                <th style="text-align: center;">Nama Periode</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Periode</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                    $no = 1;
                    foreach ($periode as $item) {
                    ?>
                            <tr>
                                <td width="1%"><?= $no++; ?></td>
                                <td><?= $item['nama_periode']; ?></td>
                                <td>
                                    <?php
                                        if($item['aktif']==1) {
                                            echo "Aktif";
                                        } else {
                                            echo "Tidak Aktif";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <center>
                                        <a href="" data-toggle="modal" data-toggle="modal" data-target="#updateModal"
                                            name="btn-edit" onclick="detail_edit(<?= $item['idperiode']; ?>)"
                                            class="btn btn-sm btn-edit btn-warning">Edit</a>
                                        <a href="" class="btn btn-sm btn-delete btn-danger"
                                            onclick="Hapus(<?= $item['idperiode']; ?>)" data-toggle="modal"
                                            data-target="#deleteModal" data-id="<?= $item['idperiode']; ?>">Hapus</a>
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
    <form action="<?php echo base_url('Admin/Periode/add_periode'); ?>" method="post" id="form_add"
        data-parsley-aktifate="true" autocomplete="off">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Periode </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Periode</label>
                            <input type="text" class="form-control" id="input_nama" name="input_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Periode" autocomplete="off" />
                            <span class="text-danger" id="error_nama"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status aktif</label>
                            <select name="input_aktif" class="form-control" id="input_aktif" required>
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
    <form action="<?php echo base_url('Admin/Periode/update_periode'); ?>" method="post" id="form_edit"
        data-parsley-aktifate="true" autocomplete="off">
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <?= csrf_field(); ?>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Data Periode </h5>
                        <button type="reset" class="close" data-dismiss="modal" id="batal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" style="display: none;"  name="idperiode" id="idperiode">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Periode</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Periode" autocomplete="off" />
                            <span class="text-danger" id="error_edit_nama"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Status aktif</label>
                            <select name="edit_aktif" class="form-control" id="edit_aktif" required>
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
    <form action="<?php echo base_url('Admin/Periode/delete_periode'); ?>" method="post">
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

                        <h4>Apakah Ingin menghapus Periode ini?</h4>

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
        $("#input_nama").keyup(function() {

            var nama = $(this).val().trim();
            if (nama != '') {
                $.ajax({
                    type: 'GET',
                    dataType: 'json',
                    url: '<?php echo base_url('Admin/Periode/cek_nama'); ?>' + '/' + nama,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_nama").html('Nama telah dipakai,coba yang lain');
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
                    url: '<?php echo base_url('Admin/Periode/cek_nama'); ?>' + '/' + nama,
                    success: function(data) {
                        if (data['results'] > 0) {
                            $("#error_edit_nama").html('Nama telah dipakai,coba yang lain');
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
        });

        $('#batal_add').on('click', function() {
            $('#form_add')[0].reset();
            $("#input_nama").val('');
        });

        $('#batal_up').on('click', function() {
            $('#form_edit')[0].reset();
            $("#edit_nama").val('');
        });
    })

    function detail_edit(isi) {
        $.getJSON('<?php echo base_url('Admin/Periode/data_edit'); ?>' + '/' + isi, {},
            function(json) {
                $('#idperiode').val(json.idperiode);
                $('#edit_nama').val(json.nama_periode);
                if(json.aktif == 1) {
                    document.getElementById("edit_aktif").selectedIndex = 0;
                } else {
                    document.getElementById("edit_aktif").selectedIndex = 1;
                }
            });
    }
    </script>
</body>

</html>
