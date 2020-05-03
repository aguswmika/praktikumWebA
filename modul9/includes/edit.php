<div class="middle-align">
	<?php 
		if(post('button') !== null){
			try {
				$nim 		= get('nim');
				$nama 		= post('nama');
				$alamat 	= post('alamat');
				$no_telp 	= post('no_telp');
				$status 	= post('status');

				$sql = "UPDATE mahasiswa SET nama = ?, alamat = ?, no_telp = ?, status = ? WHERE nim = ?";

				$prep = $db->prepare($sql);
				$prep->execute([$nama, $alamat, $no_telp, $status, $nim]);

				echo "Berhasil di edit";
			} catch (PDOException $e) {
				die("Error : ".$e->getMessage());
			}
		}
		
		$sql = "SELECT * FROM mahasiswa WHERE nim = ?";

		$prep = $db->prepare($sql);
		$prep->execute([get('nim')]);
		
		$data = $prep->fetch(PDO::FETCH_OBJ);

		if($prep->rowCount() == 0){
			echo "<h1>Data tidak ditemukan</h1>";
			die();
		}
	?>
	<div class="box">
		<form action="index.php?p=edit&nim=<?php echo get('nim') ?>" method="post">
			<div class="form-group">
				<label for="nim">NIM</label>
				<input type="text" class="form-input" name="nim" id="nim" value="<?php echo $data->nim ?>" disabled>
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-input" name="nama" id="nama" value="<?php echo $data->nama ?>">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="alamat" id="alamat" rows="5" class="form-input"><?php echo $data->alamat ?></textarea>
			</div>
			<div class="form-group">
				<label for="no_telp">No. Telp</label>
				<input type="text" class="form-input" name="no_telp" id="no_telp" value="<?php echo $data->no_telp ?>">
			</div>
			<div class="form-group">
				<label for="status">Status</label>
				<div class="select-wrapper">
					<select name="status" class="form-input" id="status">
						<option value="aktif">Aktif</option>
						<option value="nonaktif" <?php echo ($data->status == 'nonaktif') ? 'selected' : '' ?>>Nonaktif</option>
					</select>
				</div>
			</div>
			
			<button type="submit" name="button" class="btn btn-primary">Edit</button>
			<a href="index.php?p=get" class="btn">Kembali</a>
		</form>
	</div>
</div>