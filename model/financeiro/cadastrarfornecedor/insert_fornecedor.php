




<?php


require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 

$campos_tabela = array(
$fornecedor = $_POST['fornecedor'],
$cep = $_POST['cep'],
$cidade = $_POST['cidade'],
$endereco = $_POST['endereco'],
$bairro = $_POST['bairro'],
$uf = $_POST['uf'],
$complemento = $_POST['complemento'],
$numero = $_POST['numero'],
$cnpj = $_POST['cnpj'],
$ie = $_POST['ie'],

);

/* Formata o Array adicionando aspas simples no inicio e fim */
foreach( $campos_tabela as $x => $y ) {
	$campos_tabela[ $x ] = "'" . $y . "'";
}

/* Converte o Array em String e adiciona uma virgula */
$campos_tabela = implode(', ', $campos_tabela );

$segundo_insert_banco = $conn->prepare("INSERT INTO fornecedor_contas_a_pagar(fornecedor, cep, cidade, endereco, bairro,  uf, complemento, numero, cnpj, ie) VALUES ($campos_tabela)");
$segundo_insert_banco->execute();



?>

<script>
opener.location.reload();
window.close();

</script>