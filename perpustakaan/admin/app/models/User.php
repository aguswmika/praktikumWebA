<?php 

class User
{
	
	static function getAll($limit = 0){
		$sql = "SELECT * FROM user WHERE id_user != ?";

		if($limit > 0){
			$awal = empty(Input::get('hal')) ? 1 : Input::get('hal');
			$awal = ($awal-1)*$limit;
			$sql .= " LIMIT {$awal}, {$limit}";
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute([Session::sess('id')]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getSingle($id){
		$sql = "SELECT * FROM user WHERE id_user = ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$id]);
		return $prep->fetch(PDO::FETCH_OBJ);
	}

	static function getPj(){
		$sql = "SELECT * FROM user WHERE akses = 3";


		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function search($search){
		$search = '%'.$search.'%';
		$sql = "SELECT * FROM user WHERE (id_user LIKE ? OR username LIKE ? OR nama LIKE ?) AND id_user != ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$search, $search, $search, Session::sess('id')]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function login(){
		$user = Input::post('user');
		$pass = md5(sha1(Input::post('pass')));
		
		$sql = "SELECT * FROM user WHERE username = ? AND password = ? AND status = 'active'";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$user, $pass]);

		if($prep->rowCount() > 0){
			$item = $prep->fetch(PDO::FETCH_OBJ);

			Session::sess('id', $item->id_user);
			Session::sess('akses', $item->akses);
			Session::sess('nama', $item->nama);

			return true;
		}else{
			return false;
		}
	}

	static function add(){
		$id      = autoNum('user', 'id_user', 'US');
		
		$nama     = Input::post('nama');
		$alamat   = Input::post('alamat');
		$telepon  = Input::post('telepon');
		$user     = Input::post('user');
		$pass     = md5(sha1(Input::post('pass')));
		$akses    = Input::post('akses') == 2 ? 2 : 3;


		$sql  = "INSERT INTO user (id_user, nama, alamat, telepon, status, username, password, akses) VALUES (?, ?, ?, ?, 'active', ?, ?, ?);";
		$prep = DB::conn()->prepare($sql);
		return $prep->execute([$id, $nama, $alamat, $telepon, $user, $pass, $akses]);
	}

	static function edit($id){
		
		$nama     = Input::post('nama');
		$alamat   = Input::post('alamat');
		$telepon  = Input::post('telepon');
		$user     = Input::post('user');
		$pass     = md5(sha1(Input::post('pass')));
		$akses    = Input::post('akses');
		$status   = Input::post('status');
		if(Session::sess('akses') == 1 || Session::sess('id') == $id){
			if(!empty(Input::post('pass'))){
				$sql  = "UPDATE user SET nama = ?, alamat = ?, telepon = ?, status = ?, username = ?, password = ?, akses = ? WHERE id_user = ?;";
				$prep = DB::conn()->prepare($sql);
				return $prep->execute([$nama, $alamat, $telepon, $status, $user, $pass, $akses, $id]);
			}else{
				$sql  = "UPDATE user SET nama = ?, alamat = ?, telepon = ?, status = ?, username = ?, akses = ? WHERE id_user = ?;";
				$prep = DB::conn()->prepare($sql);
				return $prep->execute([$nama, $alamat, $telepon, $status, $user, $akses, $id]);
			}
		}else{
			return false;
		}
    }

    static function del()
    {
        $id = explode(',', substr(Input::post('id'), 1));

        $sql = '';
        foreach ($id as $newId) {
            $sql .= "DELETE FROM user WHERE id_user = ?;";
        }

        $prep = DB::conn()->prepare($sql);
        return $prep->execute($id);
    }
}