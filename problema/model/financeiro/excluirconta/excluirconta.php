

<?php

    require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");

$tipo = $_POST['tipo'];
$id = $_POST['id'];
$data_anterior = $_POST['data_anterior'];
$parcela_atual = $_POST['parcela_atual'];


if($tipo == 'Extra'){

$excluir_valor = $conn->prepare("DELETE FROM valor_contas_a_pagar WHERE codigo='$id'");
$excluir_conta = $conn->prepare("DELETE FROM contas_a_pagar WHERE id='$id'");

$excluir_valor ->execute();
$excluir_conta ->execute();

echo "Deletado com sucesso";
}


if($tipo == 'Fixo'){


$update_banco = $conn->prepare( "UPDATE contas_a_pagar SET fim_conta = '$data_anterior' WHERE id='$id'");
$update_banco->execute();


echo $data_anterior;
   echo "FIXO Deletado com sucesso"; 
}

if($tipo == 'Parcelado'){

$parcela_atual = $parcela_atual - 1;

$update_banco = $conn->prepare( "UPDATE contas_a_pagar SET fim_conta = '$data_anterior', parcelas = '$parcela_atual'  WHERE id='$id'");
$update_banco->execute();

   echo "Parcelado Deletado com sucesso"; 

}


?>