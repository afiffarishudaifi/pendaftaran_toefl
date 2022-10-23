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
		    <form action="<?php echo base_url('Mahasiswa/Pengaturan/update_pendaftar'); ?>" method="post" id="form_edit"
		        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
		        <?= csrf_field(); ?>

                    <input type="hidden" value="<?= $session->get('id_login'); ?>" style="display: none;" name="idpendaftar" id="idpendaftar">

                        <div class="form-group form-material">
                            <label class="form-control-label">Nama Mahasiswa</label>
                            <input type="text" class="form-control" id="edit_nama" name="edit_nama"
                                data-parsley-required="true" placeholder="Masukkan Nama Siswa" autocomplete="off" />
                        </div>

                        <div class="form-group form-material">
                            <label class="form-control-label">Nomor Induk Mahasiswa</label>
                            <input type="text" class="form-control" id="edit_nim" name="edit_nim"
                                data-parsley-required="true" placeholder="Masukkan Nomor Induk Mahasiswa" autocomplete="off" readonly />
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

        	$.getJSON('<?php echo base_url('Mahasiswa/Pengaturan/data_edit'); ?>' + '/' + <?= $session->get('id_login'); ?>, {},
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

            $("#edit_nim").keyup(function(){

                var nim = $(this).val().trim();
          
                if(nim != '' && nim != $('#edit_nim_lama').val()){
                    $.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '<?php echo base_url('Peserta/Pengaturan/cek_nim'); ?>' + '/' + nim,
                        success: function (data) {
                            if(data['results']>0){
                                $("#error_edit_nim").html('NIM telah dipakai,coba yang lain');
                                $("#edit_nim").val('');
                            }else{
                                $("#error_edit_nim").html('');
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
