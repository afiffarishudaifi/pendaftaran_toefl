<?php $session = session(); ?>
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
      </div>

      <div class="page-content">

        <!-- Panel Table Individual column searching -->
        <div class="panel">
          <header class="panel-heading">
            <h3 class="panel-title">
            	<?php if ($absen == 0) { ?>
            		<?= $judul; ?>
          		<?php } ?>
          		</h3>
          </header>
          <div class="panel-body">
          	<?php if ($absen == 1) { ?>
          		<center>
          			<h2>Anda sudah melakukan absensi untuk hari ini</h2>
          		</center>
          	<?php } else { ?>
          	<form action="<?php echo base_url('Peserta/Absen/add_absen'); ?>" method="post" id="form_add"
		        data-parsley-validate="true" autocomplete="off" enctype="multipart/form-data">
		        <?= csrf_field(); ?>

                  	<div class="form-group">
	                    <label class="form-control-label"><b>Foto Bukti Absensi</b></label>
	                    <br>
	                      <input type="file" id="input_foto" class="dropify-event" name="input_foto" accept="image/png, image/gif, image/jpeg"/ required>
    					           <div id="emailHelp" class="form-text">upload foto sebagai bukti pendukung melakukan absen aplikasi Geotag Photos.</div>
                  	</div>

                  	<div class="form-group form-material">
                      <label class="form-control-label">Keterangan</label>
                      <input type="text" class="form-control" id="input_keterangan" name="input_keterangan"
                            data-parsley-required="true" placeholder="Masukkan Keterangan" autocomplete="off" />
                  	</div>

                  	<div class="form-group form-material">
                    	<label class="form-control-label">Status Absen</label>
                      	<select name="input_status" class="form-control" id="input_status">
                          <option value="Hadir" selected="">Hadir</option>
                          <option value="Izin">Izin</option>
                          <option value="Sakit">Sakit</option>
                          <option value="Bolos">Bolos</option>
                      	</select>
                  	</div>

                    <button type="reset" class="btn btn-secondary">Batal</button>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
				</form>
			<?php } ?>
          	</div>
        </div>
        <!-- End Panel Table Individual column searching -->

      </div>
    </div>
    <!-- End Page -->

    <!-- Start Modal Add Class-->
    
    <!-- End Modal Add Class-->

    <!-- Footer -->
    <?= $this->include("Mahasiswa/layout/footer") ?>

    <?= $this->include("Mahasiswa/layout/js_tabel") ?>

  </body>
</html>
