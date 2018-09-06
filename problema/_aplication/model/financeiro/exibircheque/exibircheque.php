<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>


<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>

<body>	
<div class="container">


<table class="table table-hover table-bordered table-striped">

<thead>

<tr>
<th colspan="3" class="text-center">
Pagamentos efetuados
</th>

<tr>
<th>Descrição</th>
<th>Vencimento</th>
<th>valor</th>
</tr>

</thead>
<tbody>
<?php
$soma_total = 0;

$test = $_POST['test'];
$numero_cheque = $_POST['numero_cheque'];

$consulta_cheque = $conn->query("SELECT * FROM financeiro_pagamentos_feitos WHERE numero_cheque = '$numero_cheque'");  

while ($cheque = $consulta_cheque ->fetch(PDO::FETCH_ASSOC)){
     $id_conta = "{$cheque['id_conta']}"; 
     
     $data_conta = "{$cheque['data_conta']}";
     $conta = "{$cheque['conta']}";
     $data_atual = substr($data_conta, 0, 7);
     $valor_pago = "{$cheque['valor_pago']}";

     $tipo_pagamento = "{$cheque['tipo_pagamento']}"; 
?>
	

<?php

$segconsulta_tipo = $conn->query("SELECT * FROM contas_a_pagar WHERE (id = '$id_conta')");                  
$tipo_valor = $segconsulta_tipo->fetch(PDO::FETCH_ASSOC);

$tipo = "{$tipo_valor['tipo']}";

if($tipo !== 'Parcelado'){
$segconsulta = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = '$id_conta') AND SUBSTRING(inicio_mes,1,7)= '$data_atual'");                  
$valor_atual = $segconsulta->fetch(PDO::FETCH_ASSOC);
}

if($tipo == 'Parcelado'){
$segconsulta = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = '$id_conta') AND SUBSTRING(inicio_mes,1,7) <= '$data_atual'");                  
$valor_atual = $segconsulta->fetch(PDO::FETCH_ASSOC);
}

 $favorecido = "{$valor_atual['favorecido']}";
 $item = "{$valor_atual['item']}";
  $inicio_mes = "{$valor_atual['inicio_mes']}";
$valor_atual = "{$valor_atual['valor']}";

?>


<?php
if($favorecido !== ""){?>
<tr>
    <td><?php echo $favorecido.'-'.$item; ?></td>
    <td class="text-center"> <?php echo date('d/m/Y',  strtotime($inicio_mes));
    
    
      ?></td>
    <td class="text-right"> <?php echo $valor_atual ?></td>
</tr>
<?php
 }
?>

<?php

  $valor_atual = str_ireplace(".", "",   $valor_atual);
  $valor_atual = str_ireplace(",", ".",   $valor_atual);

$soma_total = $soma_total + $valor_atual;
   
}

?>
<tr>
<th colspan="2">
VALOR TOTAL
</th>
<th class="text-right bold"> 
    <?php 
    
    $soma_total = number_format($soma_total,2, ',', '.');
    echo
    
     $soma_total ;
     
     
     ?>
    </th>
</tr>

<tr>
<td>
Conta
</td>
<td>
Numero Pagamento
</td>
<td>
Data Pagamento
</td>
</tr>


<tr>
<td>
<?php echo $conta;?>
</td>

<td>
<?php echo $numero_cheque;?>
</td>

<td>

<?php echo $data_conta;?>
</td>
</tr>
</tbody>

</table>