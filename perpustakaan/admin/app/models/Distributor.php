<?php 

class Distributor
{
	
	static function getAll($limit = 0){
		$sql = "SELECT * FROM distributor";

		if($limit > 0){
			$awal = empty(Input::get('hal')) ? 1 : Input::get('hal');
			$awal = ($awal-1)*$limit;
			$sql .= " LIMIT {$awal}, {$limit}";
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getSingle($id){
		$sql = "SELECT * FROM distributor WHERE id_distributor = ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$id]);
		return $prep->fetch(PDO::FETCH_OBJ);
	}

	static function search($search){
		$search = '%'.$search.'%';
		$sql = "SELECT * FROM distributor WHERE (id_distributor LIKE ? OR nama_distributor LIKE ?)";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$search, $search]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function add(){
		$id      = autoNum('distributor', 'id_distributor', 'DS');
		
		$nama     = Input::post('nama');
		$alamat   = Input::post('alamat');
		$telepon  = Input::post('telepon');


		$sql  = "INSERT INTO distributor (id_distributor, nama_distributor, alamat, telepon) VALUES (?, ?, ?, ?);";
		$prep = DB::conn()->prepare($sql);
		return $prep->execute([$id, $nama, $alamat, $telepon]);
	}

	static function edit($id){
		
		$nama     = Input::post('nama');
		$alamat   = Input::post('alamat');
		$telepon  = Input::post('telepon');


		$sql  = "UPDATE distributor SET nama_distributor = ?, alamat = ?, telepon = ? WHERE id_distributor = ?;";
		$prep = DB::conn()->prepare($sql);
		return $prep->execute([$nama, $alamat, $telepon, $id]);
	}

	static function del(){
		$id = explode(',' ,substr(Input::post('id'), 1));

		$sql = '';
		foreach ($id as $newId) {
			$sql .= "DELETE FROM distributor WHERE id_distributor = ?;";
		}

		$prep = DB::conn()->prepare($sql);
		return $prep->execute($id);
	}
}