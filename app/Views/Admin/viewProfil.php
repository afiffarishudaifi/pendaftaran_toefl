<?php
$session = session();
?>
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
            </div>
        </div>

        <div class="page-content">

            <!-- Panel Table Individual column searching -->
            <div class="panel">
                <header class="panel-heading">
                    <h3 class="panel-title"><?= $judul; ?></h3>
                </header>
                <div class="panel-body">
                    <!-- Modal Edit Class-->
                    <form action="<?php echo base_url('Admin/Profil/update_profil'); ?>" method="post" id="form_edit"
                        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
                        <?= csrf_field(); ?>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Instansi</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Instansi" autofocus=""
                                autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Kepala Instansi</label>
                            <input type="text" class="form-control" id="edit_kepala" name="edit_kepala"
                                data-parsley-required="true" placeholder="Masukkan Nama Instansi" autofocus=""
                                autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Email Instansi</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Instansi</label>
                            <textarea class="form-control" id="edit_alamat" name="edit_alamat"
                                data-parsley-required="true" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Simpan</button>
                </div>
                </form>
                <!-- End Modal Edit Class-->
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

    $(function() {
        $.getJSON('<?php echo base_url('Admin/Profil/data_edit'); ?>', {},
            function(json) {
                $('#id').val(json.id);
                $('#edit_nama').val(json.nama);
                $('#edit_email').val(json.email);
                $('#edit_no_telp').val(json.no_telp);
                $('#edit_alamat').val(json.alamat);
                $('#edit_kepala').val(json.kepala);

                if (json.foto != '' || json.foto != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto);
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" +
                    "docs/img/img_logo/noimage.jpg");
                }

            });
    })
    </script>

</body>

</html>
