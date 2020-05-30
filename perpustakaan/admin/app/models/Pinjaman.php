<?php 

class Pinjaman
{
	
	static function getAll($limit = 0){
        $sql = "
            SELECT pinjaman.*, u1.nama as nama_peminjam, u2.nama as nama_admin FROM pinjaman
            INNER JOIN user AS u1 ON u1.id_user = pinjaman.id_peminjam
            INNER JOIN user AS u2 ON u2.id_user = pinjaman.id_admin
        ";
		if(Session::sess('akses') > 1){
			$sql .= ' AND pinjaman.id_admin = "'.Session::sess('id').'"';
		}

		if($limit > 0){
			$awal = empty(Input::get('hal')) ? 1 : Input::get('hal');
			$awal = ($awal-1)*$limit;
			$sql .= " LIMIT {$awal}, {$limit}";
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function laporan($limit = 0){
		$sql = "SELECT * FROM penjualan LEFT JOIN kasir ON kasir.id_kasir = penjualan.id_kasir WHERE penjualan.del = 0";
		if(Session::sess('akses') > 1){
			$sql .= ' AND penjualan.id_kasir = "'.Session::sess('id').'"';
		}
		if(!empty(Input::get('awal')) && !empty(Input::get('akhir'))){
			if(Input::get('awal') == Input::get('akhir')){
				$sql .= ' AND DATE(penjualan.tanggal) = "'.Input::get('awal').'"';
			}else{
				$sql .= ' AND DATE(penjualan.tanggal) BETWEEN "'.Input::get('awal').'" AND "'.Input::get('akhir').'"';
			}
		}else{
			$sql .= ' AND DATE(penjualan.tanggal) = "'.date('Y-m-d').'"';
		}

		$sql .= ' ORDER BY DATE(penjualan.tanggal) ASC';

		$prep = DB::conn()->prepare($sql);
		$prep->execute();
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}


	static function getSingle($id){
		$sql = "SELECT * FROM penjualan WHERE id_penjualan = ?";

		if(Session::sess('akses') > 1){
			$sql .= ' AND id_kasir = "'.Session::sess('id').'"';
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$id]);
		return $prep->fetch(PDO::FETCH_OBJ);
	}

	static function getDetail($id){
		$sql = "SELECT * FROM detail_view WHERE id_penjualan = ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$id]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function getStats(){
		$sql = "SELECT count(*) as jml FROM pinjaman WHERE MONTH(tanggal_permohonan) = ? AND YEAR(tanggal_permohonan) = ?";

		$prep = DB::conn()->prepare($sql);
		$prep->execute([
            date('M'),
            date('Y')
        ]);
		return $prep->fetch(PDO::FETCH_OBJ);
	}


	static function search($search){
		$search = '%'.$search.'%';
		$sql = "SELECT * FROM penjualan_view WHERE (id_penjualan LIKE ? OR id_kasir LIKE ? OR nama LIKE ?) AND del = 0";
		if(Session::sess('akses') > 1){
			$sql .= ' AND id_kasir = "'.Session::sess('id').'"';
		}

		$prep = DB::conn()->prepare($sql);
		$prep->execute([$search, $search, $search]);
		return $prep->fetchAll(PDO::FETCH_OBJ);
	}

	static function add(){
        $id     = autoNum('pinjaman', 'id_pinjaman', 'PJ');
		
		$sql     = "";
		$idBuku  = Input::post('id');
		$jumlah  = Input::post('jumlah');
        $newJml  = 0;
        $status  = Input::post('status');
        $date    = Input::post('tanggal').' '.date('H:i:s');
        $peminjam= Input::post('id_peminjam');
		$admin   = Session::sess('id');
		$arr     = [];


		foreach ($idBuku as $key => $newId) {
			$sql     .= "INSERT INTO pinjaman_detail (id_pinjaman, id_buku, jumlah) VALUES (?, ?, ?);";	
			$newJml  += $jumlah[$key];
			$arr      = array_merge($arr, [$id, $newId, $jumlah[$key]]);
		}

        $sql  = "INSERT INTO pinjaman (id_pinjaman, id_peminjam, id_admin, jumlah, `status`, tanggal_permohonan, tanggal_status, tanggal_kembali) VALUES (?, ?, ?, ?, ?, ?, ?, ?);".$sql;
		$arr  = array_merge([$id, $peminjam, $admin, $newJml, $status, $date, $date, null], $arr);
		$prep = DB::conn()->prepare($sql);
		return $prep->execute($arr);
    }

    static function changeStatus()
    {
        $id_pinjaman = Input::post('id_pinjaman');
        $status = Input::post('status') == 1 ? 1 : 2;

        $sql  = "UPDATE pinjaman SET `status` = ? WHERE id_pinjaman = ?";
        $prep = DB::conn()->prepare($sql);
        return $prep->execute([$status, $id_pinjaman]);
    }

	static function del(){
		$id = explode(',' ,substr(Input::post('id'), 1));

		$sql = '';
		foreach ($id as $newId) {
			$sql .= "DELETE FROM pinjaman WHERE id_pinjaman = ?;";
		}

		$prep = DB::conn()->prepare($sql);
		return $prep->execute($id);
	}
}