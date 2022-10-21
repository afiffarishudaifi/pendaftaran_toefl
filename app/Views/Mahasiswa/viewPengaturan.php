<?php
$session = session();
?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  
  <?= $this->include("Mahasiswa/layout/head_tabel"); ?>

  <body class="animsition">

    <?= $this->include("Mahasiswa/layout/nav") ?>  

    <?= $this->include("Mahasiswa/layout/sidebar") ?> 

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
		    <form action="<?php echo base_url('Peserta/Pengaturan/update_siswa'); ?>" method="post" id="form_edit"
		        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
		        <?= csrf_field(); ?>

                    <input type="hidden" value="<?= $session->get('id_login'); ?>" name="id_siswa" id="id_siswa" style="display: none;">
                      <div class="form-group form-material">
                          <label class="form-control-label">Nama Peserta Magang</label>
                          <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Peserta Magang" autofocus="" autocomplete="off" />
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Sekolah</label>
                          <select name="edit_sekolah" id="edit_sekolah" class="form-control">
                            <?php foreach ($sekolah as $value) { ?>
                              <option value="<?= $value['id_sekolah'] ?>"><?= $value['nama_sekolah'] ?></option>
                            <?php } ?>
                          </select>
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Nomor Induk</label>
                          <input type="text" class="form-control" id="edit_nis" name="edit_nis"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk" autocomplete="off" />
                            <span class="text-danger" id="error_nis"></span>
                      </div>

                      <div class="form-group form-material">
                          <label class="form-group form-material">Password Peserta Magang</label>
                          <input type="Password" class="form-control" id="edit_password" name="edit_password" placeholder="Masukkan Password Peserta Magang" autofocus="on">
                      </div>
                      <div class="form-group form-material">
                          <label class="form-group form-material">Ulangi Password</label>
                          <input type="Password" class="form-control" id="edit_password_konfirmasi" name="edit_password_konfirmasi" placeholder="Masukkan Ulangi Password" autofocus="on" data-parsley-equalto="#edit_password">
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Email Peserta Magang</label>
                          <input type="email" class="form-control" id="edit_email" name="edit_email"
                                data-parsley-required="true" placeholder="Masukkan Email Peserta Magang" autocomplete="off" />
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">No Telp</label>
                          <input type="number" class="form-control" id="edit_no_telp" name="edit_no_telp"
                                data-parsley-required="true" placeholder="Masukkan No Telp" autocomplete="off" />
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Alamat Peserta Magang</label>
                          <textarea class="form-control" id="edit_alamat" name="edit_alamat" data-parsley-required="true" placeholder="Masukkan Alamat"></textarea>
                      </div>

                      <div class="form-group form-material">
                          <label class="form-control-label">Jurusan/Program Studi</label>
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
                        <label class="form-control-label"><b>Foto Peserta Magang</b></label>
                        <br>
                          <input type="file" id="edit_foto" class="dropify-event" name="edit_foto" accept="image/png, image/gif, image/jpeg"
                          />
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
    <?= $this->include("Mahasiswa/layout/footer") ?>
    <?= $this->include("Mahasiswa/layout/js_tabel") ?>

    <script>
        function Hapus(id){
            $('.id').val(id);
            $('#deleteModal').modal('show');
        };

        $(function() {

        	$.getJSON('<?php echo base_url('Peserta/Pengaturan/data_edit'); ?>' + '/' + <?= $session->get('id_login'); ?>, {},
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
                        $("#foto_lama").attr("src", "<?= base_url() . '/' ?>" + json.foto_resmi) ;
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

            $("#edit_username").keyup(function(){

                var username = $(this).val().trim();
          
                if(username != '' && username != $('#edit_username_lama').val()){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo base_url('Peserta/Pengaturan/cek_username'); ?>' + '/' + username,
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

        })

        
    </script>

  </body>
</html>
