<?php 

class Pesan
{

	static function add(){
		$perihal = Input::post('perihal');
		$nama    = Input::post('nama');
		$email   = Input::post('email');
		$pesan   = Input::post('pesan');

		$sql = "INSERT INTO pesan (perihal, nama, email, pesan, tanggal) VALUES (?, ?, ?, ?, '".date('Y-m-d H:i:s')."')";

		$prep = DB::conn()->prepare($sql);
		return $prep->execute([$perihal, $nama, $email, $pesan]);
	}
}