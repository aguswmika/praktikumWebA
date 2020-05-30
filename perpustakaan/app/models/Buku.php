<?php 

class Buku
{
	
	static function getAll($limit = 0){
        $sql = "SELECT  * FROM buku";

		if($limit > 0){
			$awal = empty(Input::get('hal')) ? 1 : Input::get('hal');
			$awal = ($awal-1)*$limit;
			$sql .= " LIMIT {$awal}, {$limit}";
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getLatest(){
		$sql = "SELECT * FROM buku ORDER BY id_buku DESC LIMIT 0,4";

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getSingle($id){
		$sql = "SELECT * FROM buku WHERE slug = ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$id]);
		return $prep->fetch(PDO::FETCH_OBJ);
	}

	static function search($search){
		$search = '%'.$search.'%';
		$sql = "SELECT * FROM buku WHERE (id_buku LIKE ? OR judul LIKE ? OR penerbit LIKE ? OR penulis LIKE ?)";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$search, $search, $search, $search]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getFeatured(){
		$sql = "SELECT * FROM buku ORDER BY RAND() DESC LIMIT 0,6";

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getRand(){
		$sql = "SELECT * FROM buku WHERE slug != ? ORDER BY RAND() DESC LIMIT 0,4";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([Input::get('slug')]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}
}