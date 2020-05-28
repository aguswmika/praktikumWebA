<?php
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
DEFINE('BASE_PATH', __DIR__ . '/');
date_default_timezone_set("Asia/Makassar");

require_once BASE_PATH.'app/init.php';


CSRF::start();
$url = !empty(Input::get('p')) ? strtolower(Input::get('p')) : 'dashboard';

switch ($url) {
	case 'dashboard':
		cekLogin();

		load('dashboard');
		break;

	case 'pinjaman':
		cekLogin();
		load('pinjaman');
		break;

	case 'pasok':
		cekLogin();
		load('pasok');
		break;

	case 'buku':
		cekLogin();
		load('buku');
		break;

	case 'distributor':
		cekLogin();
		cekAkses();
		load('distributor');
		break;

	// case 'pesan':
	// 	cekLogin();
	// 	cekAkses();
	// 	load('pesan');
	// 	break;

	// case 'laporan':
	// 	cekLogin();

	// 	load('laporan');
	// 	break;

	case 'user':
		cekLogin();
		load('user');
		break;
	case 'backup':
		cekLogin();
		cekAkses();
		$date = date('Y-m-d-H-i-s');
		
		//Change $exec into your directory mysqldump and your database
		$exec = 'C:\xampp\mysql\bin\mysqldump -u root perpustakaan > Backup-'.$date.'.sql';
		
		exec($exec);
		header('Content-disposition: attachment; filename="Backup-'.$date.'.sql"');
		readfile('Backup-'.$date.'.sql');

		unlink('Backup-'.$date.'.sql');
		break;

	case 'login':
		cekStatus();
		model('user');
		if(cekPost()){
			if(User::login()){
				redirect('?p=dashboard');
			}else{
				msg('Username / Password Salah', 'error');
				redirect('?p=login');
			}
		}else{
			view('login/index.login');
		}
		break;

	case 'logout':
		session_destroy();
		redirect('?p=login');
		break;
	default:
		die('404 Not Found');
		break;
}
