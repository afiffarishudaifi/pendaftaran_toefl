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
		<center>
			<h3>
				<?= $judul; ?>
			</h3>
		</center>
		<table width="625" border="1">
            <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Peserta</th>
                <th style="text-align: center;">Jurusan</th>
                <th style="text-align: center;">Sekolah</th>
                <th style="text-align: center;">Mulai Magang</th>
                <th style="text-align: center;">Selesai Magang</th>
            </tr>
        	<?php
            $no = 1;
            foreach ($laporan as $item) {
            ?>
            <tr>
                <td width="1%" style="text-align: center;"><?= $no++; ?></td>
                <td><?= $item['nama_siswa']; ?></td>
                <td><?= $item['jurusan']; ?></td>
                <td><?= $item['nama_sekolah']; ?></td>
                <td style="text-align: center;"><?= $item['waktu_mulai']; ?></td>
                <td style="text-align: center;"><?= $item['waktu_selesai']; ?></td>
            </tr>
            <?php } ?>
		</table>
		<br>
		<table width="625">
			<tr>
				<td width="430"><br><br><br><br></td>
				<td class="text" align="center">Kepala BANKESBANPOLDAGRI<br><br><br><br><?= $profil['kepala'] ?></td>
			</tr>
	     </table>
	</center>
</body>
	<script>
		window.print();
	</script>
</html>
