<?php
$host	= 'localhost';
$user 	= 'root';
$pass	= 'root';
$dbname = 'praktikumweb';

try {
	$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die('Failed to connect : '.$e->getMessage());
}


