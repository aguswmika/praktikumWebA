<?php 

$url = !empty(Input::get('act')) ? Input::get('act') : 'index';
model('pinjaman');
model('buku');
model('user');
switch ($url) {
	case 'index':
		$pinjaman = empty(Input::get('search')) ? Pinjaman::getAll(10) : Pinjaman::search(Input::get('search'));
		$data = [
			'title'     => 'Pinjaman',
			'pinjaman' => $pinjaman,
            'paginate'  => paginate('pinjaman', 10),
        ];
		view('pinjaman/index.pinjaman', $data);
		break;

	case 'add':
		$id = autoNum('pinjaman', 'id_pinjaman', 'PJ');
		$data = [
			'title'     => 'Tambah Pinjaman',
			'id'        => $id,
            'buku'      => Buku::getPj(),
            'user'      => User::getPj()
        ];
		
		if(cekPost()){
			if(Pinjaman::add()){
				msg('Berhasil ditambahkan');
                redirect('?p=pinjaman');
			}else{
				msg('Gagal ditambahkan');
				redirect('?p=pinjaman&act=add');
			}
		}else{
			view('pinjaman/add.pinjaman', $data);
		}
		
        break;
    
    case 'changestatus':
        if (cekPost()) {
            if (Pinjaman::changeStatus()) {
                msg('Berhasil diubah');
            } else {
                msg('Gagal diubah', 'error');
            }
        }

        redirect('?p=pinjaman');
        
        break;

    case 'edit':
        $item = Pinjaman::getSingle(Input::get('id'));
        $data = [
            'title'     => 'Edit Pinjaman',
            'item'        => $id,
            'buku'      => Buku::getPj(),
            'user'      => User::getPj()
        ];

        if (cekPost()) {
            if (Pinjaman::add()) {
                msg('Berhasil ditambahkan');
                redirect('?p=pinjaman');
            } else {
                msg('Gagal ditambahkan');
                redirect('?p=pinjaman&act=add');
            }
        } else {
            view('pinjaman/add.pinjaman', $data);
        }

        break;

	case 'del':
		if(cekPost()){
			if(Pinjaman::del()){
				msg('Berhasil dihapus');
			}else{
				msg('Gagal dihapus', 'error');
			}
		}else{
			redirect('?p=pinjaman');
		}
		break;
	default:
		die('404 Not Found');
		break;
}