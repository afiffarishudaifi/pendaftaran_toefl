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
		  <?php if($nilai == null) { ?>
				<div class="row">
					<div class="col-md-12">
					<center>
						<img src="<?= base_url('docs/img/tambahan/illustration-2.png') ?>" style="width:50%"><br>
						<div class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
							<center>
								<strong>Peringatan!</strong> Penilaian belum tersedia sebelum masa magang selesai
							</center>
						</div>
					</center> 
					</div>
				</div>
		  <?php } else { ?>
			<form autocomplete="off" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="row row-lg">
					<div class="col-md-6 col-lg-4">
					<!-- Example Disable -->
					<div class="example-wrap">
						<h4 class="example-title">Nilai Kedisiplinan</h4>
						<input type="text" class="form-control" value="<?= $nilai['kedisiplinan'] ?>" disabled>
						</div>
					</div>

					<div class="col-md-6 col-lg-4">
						<div class="example-wrap">
							<h4 class="example-title">Nilai Tanggung Jawab</h4>
							<input type="text" class="form-control" value="<?= $nilai['tanggung_jawab'] ?>" disabled>
						</div>
					</div>

					<div class="col-md-6 col-lg-4">
						<div class="example-wrap">
							<h4 class="example-title">Nilai Kerja Sama</h4>
							<input type="text" class="form-control" value="<?= $nilai['kerja_sama'] ?>" disabled>
						</div>
					</div>

					<div class="col-md-6 col-lg-4">
						<div class="example-wrap">
							<h4 class="example-title">Nilai Kerajinan</h4>
							<input type="text" class="form-control" value="<?= $nilai['kerajinan'] ?>" disabled>
						</div>
					</div>

					<div class="col-md-6 col-lg-4">
						<div class="example-wrap">
							<h4 class="example-title">Nilai Inisiatif</h4>
							<input type="text" class="form-control" value="<?= $nilai['inisiatif'] ?>" disabled>
						</div>
					</div>

					<div class="col-md-6 col-lg-4">
						<div class="example-wrap">
						<h4 class="example-title">Rata - Rata</h4>
						<input type="text" class="form-control" value="<?= $nilai['rata_rata'] ?>" disabled>
						</div>
					</div>
				</div>
				<a href="<?= base_url('Peserta/Penilaian/generate') ?>" class="btn btn-success"><span class="fa fa-print"></span> Cetak Sertifikat</a>
			</form>
		  <?php } ?>
          </div>
        </div>
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
    </script>

  </body>
</html>
