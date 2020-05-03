<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas Pertama</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php 
		require_once 'includes/connect.php';
		require_once 'functions.php';

		$url = isset($_GET['p']) ? $_GET['p'] : 'get';
		switch ($url) {
			case '':
			case 'get':
				require_once 'includes/get.php';
				break;

			case 'add':
				require_once 'includes/add.php';
				break;

			case 'edit':
				require_once 'includes/edit.php';
				break;

			case 'destroy':
				require_once 'includes/destroy.php';
				break;				
			
			default:
				echo "<div class='middle-align'><h1>404 not found</h1></div>";
				die();
				break;
		}
	 ?>
</body>
</html>