<?php $nim = $_GET['nim']; $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa"); $que = mysqli_query($koneksi, "SELECT * FROM datamhs WHERE nim = $nim"); $ro = mysqli_fetch_array($que); ?>

<form method="POST">
	<br><br>
	<h1>EDIT DATA</h1>
	<table>

		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><input type="number" name="nim" value="<?php echo $ro['nim']; ?>"></td>
		</tr>

		<tr>
			<td>NAMA</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $ro['nama']; ?>"></td>
		</tr>

		<tr>
			<td>JENIS KELAMIN</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="Pria"> Pria <input type="radio" name="jk" value="Wanita"> Wanita</td>
		</tr>

		<tr>
			<td>PROGRAM STUDI</td>
			<td>:</td>
			<td><select name="prodi">
					<option value="1">Pilih Prodi</option>
					<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
					<option value="S1 Akuntansi">S1 Akuntansi</option>
					<option value="D4 Sistem Informasi">D4 Sistem Informasi</option>
				</select></td>
		</tr>

		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
				<option value="-1">Pilih Fakultas</option>
				<option value="Ilmu Terapan">Ilmu Terapan</option>
				<option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
				<option value="Teknik Elektro">Teknik Elektro</option>
				</select></td>
		</tr>

		<tr>
			<td>ASAL</td>
			<td>:</td>
			<td><input type="text" name="asal" value="<?php echo $ro['asal']; ?>"></td>
		</tr>

		<tr>
			<td>MOTTO HIDUP</td>
			<td>:</td>
			<td><textarea name="motto"><?php echo $ro['motto_hidup']; ?></textarea></td>
		</tr>

		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="GANTI"> <a href="search.php">CARI</a></td>
		</tr>

	</table>
</form>

<?php
	if (isset($_POST['submit'])) {
		$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

		$nim = $_GET['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		$asal = $_POST['asal'];
		$motto = $_POST['motto'];

		$qrySelect = mysqli_query($koneksi, "SELECT * FROM datamhs WHERE nim = '".$nim."'");
		$rw = mysqli_fetch_array($qrySelect);

		if ($prodi !== -1) {

			if ($fakultas !== -1) {
				
				$sql = mysqli_query($koneksi, "UPDATE `datamhs` SET `nama` = '".$nama."', `jeniskelamin` = '".$jk."', `prodi` = '".$prodi."', `fakultas` = '".$fakultas."', `asal` = '".$asal."', `motto_hidup` = '".$motto."' WHERE nim = '".$nim."'");
				echo "BERHASIL DI UBAH<br>";
			}
			else{
				echo "Kosong";
			}
		}
		else{
			echo "Tidak Boleh Kosong";
		}
	}

?>
