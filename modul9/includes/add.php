<div class="middle-align">
	<?php 
		if(post('button') !== null){
			try {
				$nim 		= post('nim');
				$nama 		= post('nama');
				$alamat 	= post('alamat');
				$no_telp 	= post('no_telp');
				$status 	= post('status');

				$rules = [
					'nim' => ['required'],
					'nama'	=> ['required', 'max' => 255],
					'alamat'	=> ['required'],
					'no_telp'	=> ['required'],
					'status'	=> ['required'],
				];

				$valid = validation($rules);

				if(empty($valid)){
					$sql = "INSERT INTO mahasiswa(nim, nama, alamat, no_telp, status) VALUES (?, ?, ?, ?, ?)";

					$prep = $db->prepare($sql);
					$prep->execute([$nim, $nama, $alamat, $no_telp, $status]);

					echo "Berhasil di masukkan";
				}else{
					echo $valid;
				}
			} catch (PDOException $e) {
				die("Error : ".$e->getMessage());
			}
		}
	?>
	<div class="box">
		<form action="index.php?p=add" method="post">
			<div class="form-group">
				<label for="nim">NIM</label>
				<input type="text" class="form-input" name="nim" id="nim">
			</div>
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" class="form-input" name="nama" id="nama">
			</div>
			<div class="form-group">
				<label for="alamat">Alamat</label>
				<textarea name="alamat" id="alamat" rows="5" class="form-input"></textarea>
			</div>
			<div class="form-group">
				<label for="no_telp">No. Telp</label>
				<input type="text" class="form-input" name="no_telp" id="no_telp">
			</div>
			<div class="form-group">
				<label for="status">Status</label>
				<div class="select-wrapper">
					<select name="status" class="form-input" id="status">
						<option value="aktif">Aktif</option>
						<option value="nonaktif">Nonaktif</option>
					</select>
				</div>
			</div>
			
			<button type="submit" name="button" class="btn btn-primary">Tambah</button>
			<a href="index.php?p=get" class="btn">Kembali</a>
		</form>
	</div>
</div>