<form method="POST">
				<h1>CARI DATA</h1>
					<table>

						<tr>
							<td>CARI</td>
							<td>:</td>
							<td><input type="text" name="cariNim" placeholder="Cari NIM"></td>
						</tr>

						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="cari" value="CARI"> <a href="index.php">masukkan data</a></td>
						</tr>
					</table>
			</form>

				<?php
					error_reporting(0);
					$koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

					if (isset($_POST['cari'])) {
						$cariNim = $_POST['cariNim'];

						$query = mysqli_query($koneksi, "SELECT * FROM datamhs WHERE nim = ".$cariNim."");
						echo "Hasil Pencarian '<b>".$cariNim."</b>' :";
						echo "<table border=1>

								<tr>
									<th>NIM</th>
									<th>NAMA</th>
									<th>AKSI</th>
								</tr>";

						foreach ($query as $qry) {
							echo "<tr>

									<td>".$qry['nim']."</td>
									<td>".$qry['nama']."</td>
									<td><a href='delete().php?nim=".$qry['nim']."'>HAPUS</a> |
										<a href='detail.php?nim=".$qry['nim']."'>DETAIL</a></td>
								  </tr>";
						}
					}

					else{
						echo "<h2>DATA</h2>";
						$qrydata = mysqli_query($koneksi, "SELECT * FROM datamhs");

						echo "<table border=0>
								<tr>
									<th>NIM</th>
									<th>NAMA</th>
									<th>JENIS KELAMIN</th>
									<th>PROGRAM STUDI</th>
									<th>FAKULTAS</th>
									<th>ASAL</th>
									<th>MOTTO HIDUP</th>
								</tr>";

						foreach ($qrydata as $qd) {
							echo "<tr>
									<td>".$qd['nim']."</td>
									<td>".$qd['nama']."</td>
									<td>".$qd['jeniskelamin']."</td>
									<td>".$qd['prodi']."</td>
									<td>".$qd['fakultas']."</td>
									<td>".$qd['asal']."</td>
									<td>".$qd['motto_hidup']."</td>
								  </tr>";
						}
					}
		?>
