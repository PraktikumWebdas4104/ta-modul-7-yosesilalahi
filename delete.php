<?php
	$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");
	$nim = $_GET['nim'];

	mysqli_query($koneksi, "DELETE FROM data WHERE nim = ".$nim."");
	header("location:cari.php?pesan=*DATA TELAH DIHAPUS");

?>