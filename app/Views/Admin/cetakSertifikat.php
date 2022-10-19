<!DOCTYPE html>
<html>
<head>
	<title>Cetak Laporan</title>
    <link rel="shortcut icon" href="<?= base_url() ?>/docs/themeforest/base/assets/images/favicon.ico">
	<style type="text/css">
		table {
			font-family: "Times New Roman", serif;
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

        body {
            background-image : url(<?= base_url('docs/img/img_logo/bg-sertifikat.png') ?>);
            background-repeat: no-repeat;
            background-origin: content-box;
            background-size: cover;
        }

	</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">				
                <p style="padding-top:350px; padding-left: 315px;"> <?= $nama ?> </p>
                <p style="padding-left: 315px;"> <?= $asal ?> </p>
                <p style="padding-left: 315px;"> <?= $jurusan ?> </p>
                <p style="padding-top:343px; padding-left: 460px;"> <?= $kepala ?> </p>
                
            </div>
        </div>
    </body>
	<script>
		// window.print();
	</script>
</html>
