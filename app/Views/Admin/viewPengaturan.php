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
		    <form action="<?php echo base_url('Admin/Pengaturan/update_admin'); ?>" method="post" id="form_edit"
		        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
		        <?= csrf_field(); ?>

                    <input type="hidden" value="<?= $session->get('id_login'); ?>" name="idadmin" id="idadmin" style="display: none;">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Admin</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Admin" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Username Admin</label>
                            <input type="text" class="form-control" id="edit_username" name="edit_username"
                                data-parsley-required="true" placeholder="Masukkan Username Admin" autocomplete="off" />
                            <span class="text-danger" id="error_username"></span>
                        </div>

                        <div class="form-group form-material">
                            <label class="form-group form-material">Password Admin</label>
                            <input type="Password" class="form-control" id="edit_password" name="edit_password"
                                placeholder="Masukkan Password Admin" autofocus="on">
                        </div>
                        <div class="form-group form-material">
                            <label class="form-group form-material">Ulangi Password</label>
                            <input type="Password" class="form-control" id="edit_password_konfirmasi"
                                name="edit_password_konfirmasi" placeholder="Masukkan Ulangi Password" autofocus="on"
                                data-parsley-equalto="#edit_password">
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">No Telp</label>
                            <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Alamat Admin</label>
                            <textarea class="form-control" id="edit_alamat" name="edit_alamat"
                                data-parsley-required="true" placeholder="Masukkan Alamat Admin" autocomplete="off">
                            </textarea>
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
        function Hapus(id){
            $('.id').val(id);
            $('#deleteModal').modal('show');
        };

        $(function() {

        	$.getJSON('<?php echo base_url('Admin/Admin/data_edit'); ?>' + '/' + <?= $session->get('id_login'); ?>, {},
            function(json) {
                $('#idadmin').val(json.idadmin);
                $('#edit_username').val(json.username);
                $('#edit_nama').val(json.nama_admin);
                $('#edit_email').val(json.email);
                $('#edit_no_telp').val(json.notelp);
                $('#edit_alamat').val(json.alamat);
            });


            $("#edit_username").keyup(function(){

                var username = $(this).val().trim();
          
                if(username != '' && username != $('#edit_username_lama').val()){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo base_url('Admin/Admin/cek_username'); ?>' + '/' + username,
                        success: function (data) {
                            if(data['results']>0){
                                $("#error_edit_username").html('Username telah dipakai,coba yang lain');
                                $("#edit_username").val('');
                            }else{
                                $("#error_edit_username").html('');
                            }
                        }, error: function () {
            
                            alert('error');
                        }
                    });
                }
            });
        });
    </script>

  </body>
</html>
