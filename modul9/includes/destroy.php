<?php

$sql = "DELETE FROM mahasiswa WHERE nim = ?";

$prep = $db->prepare($sql);
$prep->execute([post('nim')]);

header('location: index.php');