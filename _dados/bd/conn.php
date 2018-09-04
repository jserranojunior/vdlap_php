<?php



try {
    $conn = new PDO('sqlsrv:Server=SERVIDORVM01-PC\SQLEXPRESS;Database=vdlap_novo', 'sa', '@fgh55qdy');
	$conn->exec("SET CHARACTER SET utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


try {
     $connold = new PDO('sqlsrv:Server=SERVIDORVM01-PC\SQLEXPRESS;Database=vdlap', 'sa', '@fgh55qdy');
	$connold->exec("SET CHARACTER SET utf8");
    $connold->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


  ?>