<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");  ?>

<?php



$id = $_POST['id'];
$area = $_POST['area'];
$cccustos = $_POST['cccustos'];
$conta = $_POST['conta'];
$tipo = $_POST['tipo'];
$favorecido = $_POST['favorecido'];
$item = $_POST['item'];
$inicio_conta = $_POST['inicio_conta'];
$valor = $_POST['valor'];
$observacoes = $_POST['observacoes'];
$status = $_POST['vazio'];
$suspenso = $_POST['suspenso'];

echo $suspenso;

    $valor_atual = str_ireplace(",", ",", $valor_atual);
  	$valor_atual = str_ireplace(".", ",", $valor_atual);

$data_atual = substr($inicio_conta, 0, 7);

if($valor == ""){
    $valor = "0,00";
}




if(isset($_POST['qtdparcela'])){
$parcelas = $_POST['qtdparcela'];
}else{
    $parcelas = "";
}
if(isset($_POST['fim_conta '])){
$fim_conta  = $_POST['fim_conta'];
}else{
    $fim_conta  = "";
}

if ($tipo == 'Extra'){
		$fim_conta = $inicio_conta;
                $update_banco_ex = $conn->prepare( "UPDATE contas_a_pagar SET inicio_conta = '$inicio_conta', fim_conta = '$inicio_conta' WHERE id='$id'");
$update_banco_ex->execute();

 $update_banco_ex = $conn->prepare( "UPDATE valor_contas_a_pagar SET inicio_mes = '$inicio_conta', suspenso = '$suspenso' WHERE codigo='$id'");
$update_banco_ex->execute();
                
}




if($tipo == 'Parcelado'){
$soma_mes_parcela =  "+".$parcelas." months";
$inicio_conta_mais = date('Y-m-d', strtotime('-1 months', strtotime($inicio_conta)));
$fim_conta = date('Y-m-d', strtotime($soma_mes_parcela, strtotime($inicio_conta_mais)));
}


$update_banco = $conn->prepare( "UPDATE contas_a_pagar SET area = '$area', parcelas = '$parcelas' WHERE id='$id'");
$update_banco->execute();

if($status == ""){

$update_banco_2 = $conn->prepare( "UPDATE [valor_contas_a_pagar]
SET                item = '$item', ccustos = '$cccustos', conta = '$conta', favorecido = '$favorecido', inicio_mes = '$inicio_conta', valor = '$valor', observacoes = '$observacoes', suspenso = '$suspenso'
WHERE        (codigo = '$id') AND (SUBSTRING(inicio_mes, 1, 7) = '$data_atual')
");
$update_banco_2->execute();


}

if($status == "vazio"){


$insert_banco = $conn->prepare("INSERT INTO [valor_contas_a_pagar](codigo, item, ccustos, conta, favorecido, inicio_mes, valor, observacoes, suspenso)
 VALUES ('$id', '$item', '$cccustos', '$conta', '$favorecido', '$inicio_conta', '$valor', '$observacoes', '$suspenso')");

$insert_banco->execute();

}

echo $inicio_conta;

