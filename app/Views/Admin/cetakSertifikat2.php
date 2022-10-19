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

	</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <table width="625">
                        <tr>
                            <td><img src="<?= base_url() ?>/docs/img/img_logo/logokab.gif" width="90" height="90"></td>
                            <td>
                            <center>
                                <font size="4"><b>PEMERINTAH KABUPATEN MADIUN</b></font><br>
                                <font size="3"><b>BADAN KESATUAN BANGSA DAN POLITIK DALAM NEGERI</b></font><br>
                                <font size="2"><i><?= $profil['alamat'] ?></i></font><br>
                                <font size="2"><i>Email : <?= $profil['email'] ?></i></font><br>
                                <font size="3">CARUBAN (63153)</font>
                            </center>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b><hr></b></td>
                        </tr>
                    </table>
                    <h1>
                        <u>Sertifikat</u>
                    </h1>
                    <br>
                    <font size="3" style="text-align:left; padding-left:50px;">
                        Yang bertanda tangan dibawah ini atas nama Kantor Badan Kesatuan Bangsa<br><br>
                        dan Politik Dalam Negeri Kabupaten Madiun, menerangkan bahwa :<br><br><br>
                    </font>
                </center>
                <center>
                    <table width="625" style="padding-left:90px;">
                        <tr>
                            <td width="200">
                                <font size="3">Nama Peserta</font><br><br>
                            </td>
                            <td>
                                <font size="3"> : <?= $nama ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="200">
                                <font size="3">Sekolah / Perguruan Tinggi</font><br><br>
                            </td>
                            <td>
                                <font size="3"> : <?= $asal ?></font>
                            </td>
                        </tr>
                        
                        <tr>
                            <td width="200">
                                <font size="3">Jurusan / Program Studi</font><br><br>
                            </td>
                            <td>
                                <font size="3"> : <?= $jurusan ?></font>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <font size="3" style="text-align:left; padding-left:50px;">
                        Telah mengikuti kegiatan Magang / Praktik Kerja Industri di kantor <br><br>
                    </font>
                    <br>                    
                    <font size="4" style="text-align:left; padding-left:50px;">
                        <b><u>Badan Kesatuan Bangsa dan Politik Dalam Negeri Kabupaten Madiun</u></b><br><br>
                    </font>
                    <br>
                    <br>
                    <table width="625">
                        <tr>
                            <td width="430"><br><br><br><br></td>
                            <td class="text" align="center">Kepala BANKESBANPOLDAGRI<br><br><br><br><br><br><br><?= $profil['kepala'] ?></td>
                        </tr>
                    </table>
                </center>
            </div>
        </div>
    </div>
</body>
	<script>
	</script>
</html>
