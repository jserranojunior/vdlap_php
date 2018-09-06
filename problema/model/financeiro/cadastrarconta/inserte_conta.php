<?php


require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 



$area = $_POST['area'];
$favorecido = $_POST['favorecido'];
$item = $_POST['item'];
$ccustos = $_POST['ccustos'];
$conta = $_POST['conta'];


if($_POST['valor'] == ""){

        $valor = "0,00";

}else{

    $valor = $_POST['valor'];

}


$parcelas = $_POST['parcelas'];
$inicio_conta = $_POST['inicio_conta'];

$observacoes = $_POST['observacoes'];
$favorecido = $_POST['favorecido'];
$item = $_POST['item'];
$ccustos = $_POST['ccustos'];
$conta = $_POST['conta'];


if(isset($_POST['inicio_conta'])){
$inicio_conta = $_POST['inicio_conta'];
}

if(isset($_POST['fim_conta '])){
$fim_conta  = $_POST['fim_conta '];
}


if(isset($_POST['parcelas'])){
$parcelas = $_POST['parcelas'];
}

if(isset($_POST['tipo'])){
$tipo = $_POST['tipo'];
}

if(isset($_POST['Parcelado'])){
if($tipo == 'Parcelado'){
$soma_mes_parcela =  "+".$parcelas." months";

$fim_conta = date('Y-m', strtotime($soma_mes_parcela, strtotime($inicio_conta)));

}
}


if ($tipo == 'Extra'){
		$fim_conta = $inicio_conta;
}



if($tipo == 'Parcelado'){
$soma_mes_parcela =  "+".$parcelas." months";

$inicio_conta_mais = date('Y-m-d', strtotime('-1 months', strtotime($inicio_conta)));

$fim_conta = date('Y-m-d', strtotime($soma_mes_parcela, strtotime($inicio_conta_mais)));



}

	
echo "INICIO CONTA: $inicio_conta + FIM CONTA: $fim_conta + SOMA PARCELA $soma_mes_parcela";





$insert_banco = $conn->prepare("INSERT INTO contas_a_pagar(tipo, inicio_conta, fim_conta, area, parcelas) VALUES ('$tipo','$inicio_conta','$fim_conta','$area', '$parcelas')");
$insert_banco->execute();

$consulta = $conn->query("SELECT TOP 1 id FROM contas_a_pagar ORDER BY id DESC  ;"); 

$linha = $consulta->fetch(PDO::FETCH_ASSOC);

$id = $linha['id'];

$segundo_insert_banco = $conn->prepare("INSERT INTO valor_contas_a_pagar(
	codigo, valor, inicio_mes, observacoes, favorecido, item, ccustos,conta
	
	) VALUES ('$id', '$valor','$inicio_conta','$observacoes','$favorecido','$item','$ccustos','$conta')");
$segundo_insert_banco->execute();

?>

<script>
opener.location.reload();
window.close();

</script>

