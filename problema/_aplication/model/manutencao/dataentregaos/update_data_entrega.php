<?php 


require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 

 
$cd_unidade = $_POST['cd_unidade'];	
$data_entrega = $_POST['data_entrega'];
$cd_codigo = $_POST['cd_codigo'];





$update_banco = $connold->prepare( "UPDATE TBL_OrdemServico2 SET data_entrega = '$data_entrega' WHERE cd_codigo = '$cd_codigo'");
$update_banco->execute();


	echo $data_entrega

?>
