

<?php
$id = $_POST["id"];
echo "Meu id é " . $id;


require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 
$consulta = $conn->query("SELECT matricula, nome FROM cmi_cadastro_de_funcionarios;"); 

$stmt = $conn->query("DELETE FROM cmi_cadastro_de_funcionarios WHERE id =".($id));
$stmt->execute(); 

?>