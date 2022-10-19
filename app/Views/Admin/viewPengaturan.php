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

                    <input type="hidden" value="<?= $session->get('id_login'); ?>" name="id_admin" id="id_admin" style="display: none;">

                    <div class="form-group form-material">
                      <label class="form-control-label">Nama Admin</label>
                      <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                            data-parsley-required="true" placeholder="Masukkan Nama Admin" autofocus="" autocomplete="off" />
                  	</div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Jabatan</label>
                          <select name="edit_jabatan" id="edit_jabatan" class="form-control">
                            <?php foreach ($jabatan as $value) { ?>
                              <option value="<?= $value['id_jabatan'] ?>"><?= $value['nama_jabatan'] ?></option>
                            <?php } ?>
                          </select>
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Username Admin</label>
                          <input type="text" class="form-control" id="edit_username" name="edit_username"
                                data-parsley-required="true" placeholder="Masukkan Username Admin" autocomplete="off" />
                            <span class="text-danger" id="error_username"></span>
                      </div>

                      <div class="form-group form-material">
                          <label class="form-group form-material">Password Admin</label>
                          <input type="Password" class="form-control" id="edit_password" name="edit_password" placeholder="Masukkan Password Admin" autofocus="on">
                      </div>
                      <div class="form-group form-material">
                          <label class="form-group form-material">Ulangi Password</label>
                          <input type="Password" class="form-control" id="edit_password_konfirmasi" name="edit_password_konfirmasi" placeholder="Masukkan Ulangi Password" autofocus="on" data-parsley-equalto="#edit_password">
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">No Telp</label>
                          <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                      </div>

                      <div class="form-group">
                          <div class="col-md-12">
                              <center>
                                  <img id="foto_lama" style="width: 120px; height: 160px;" src="">
                              </center>
                          </div>
                      </div>

                      <div class="form-group">
                        <label class="form-control-label"><b>Foto Admin</b></label>
                        <br>
                          <input type="file" id="edit_foto" class="dropify-event" name="edit_foto" accept="image/png, image/gif, image/jpeg"
                          />
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Status Admin</label>
                          <select name="edit_status" class="form-control" id="edit_status">
                              <option value="Aktif" selected="">Aktif</option>
                              <option value="Tidak Aktif">Tidak Aktif</option>
                          </select>
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
                $('#id_admin').val(json.id_admin);
                $('#edit_username').val(json.username_admin);
                $('#edit_nama').val(json.nama_admin);
                $('#edit_email').val(json.email_admin);
                $('#edit_no_telp').val(json.no_telp_admin);
                $('#edit_status').val(json.status_admin);



                if (json.foto_resmi_admin != '' || json.foto_resmi_admin != null) {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto_resmi_admin) ;
                } else {
                    $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + "docs/img/img_admin/noimage.jpg");
                }

                $('#edit_jabatan').append('<option selected value="' + json.id_jabatan + '">' + json.nama_jabatan +
                    '</option>');
                $('#edit_jabatan').select2('data', {
                    id: json.id_jabatan,
                    text: json.nama_jabatan
                });
                $('#edit_jabatan').trigger('change');

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
