<div class="container middle-align">
	<a href="index.php?p=add" class="btn mb-1">Tambah</a>
	<div class="box">
		<div class="table-responsive">
			<table class="table">
				<tr>
					<th>NIM</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Telepon</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
				<?php 
					try {
						// query untuk memanggil isi dari tabel mahasiswa
						$sql	= "SELECT * FROM mahasiswa ORDER BY nama ASC";

						// prepare query dari sql injection
						$prep 	= $db->prepare($sql);
						// eksekusi query
						$prep->execute();

						// konversi data dari table mahasiswa menjadi object dalam php
						$data	= $prep->fetchAll(PDO::FETCH_OBJ);
					} catch (PDOException $e) {
						die("Error : ".$e->getMessage());
					}


					if($prep->rowCount()){
						// tampilkan data mahasiswa
						foreach ($data as $item) {
				?>
							<tr>
								<td><a href="index.php?p=show&nim=<?php echo $item->nim ?>"><?php echo e($item->nim) ?></a></td>
								<td title="<?php echo $item->nama ?>"><?php echo strlen($item->nama) > 20 ? substr($item->nama, 0, 20)."..." : e($item->nama)   ?></td>
								<td title="<?php echo $item->alamat ?>"><?php echo strlen($item->alamat) > 20 ? substr($item->alamat, 0, 20)."..." : e($item->alamat)  ?></td>
								<td><?php echo e($item->no_telp) ?></td>
								<td><?php echo e(ucfirst($item->status)) ?></td>
								<td>
									<a href="index.php?p=edit&nim=<?php echo $item->nim ?>" class="btn">Edit</a>
									<form action="index.php?p=destroy" method="post" style="display: inline-block;">
										<input type="hidden" name="nim" value="<?php echo $item->nim ?>">
										<button type="submit" class="btn btn-danger">Hapus</button>
									</form>
								</td>
							</tr>
				<?php
						} 
					}else{
				?>
						<tr>
							<td colspan="7"><strong>tidak ada data</strong></td>
						</tr>
				<?php
					}
				?>
			</table>
		</div>
	</div>
</div>