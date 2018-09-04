
<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>
<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>


<?php 

$mes = date('m');
$ano = date('Y');


if(isset($_POST['mes'])){
$mes = $_POST['mes'];
}
if(isset($_POST['ano'])){
$ano = $_POST['ano'];
}

$data = $ano."-".$mes;

?>



<div class="row"> 
<div class="col-md-6 col-md-offset-3 ">
<div class="col-md-4">
<form action="#" method="post">
<select class="form-control data" name="mes">
<option value="01" <?=($mes == '01')?'selected':''?> >Janeiro</option>
	<option value="02"  <?=($mes == '02')?'selected':''?> >Fevereiro</option>
	<option value="03" <?=($mes == '03')?'selected':''?> >Março</option>
	<option value="04" <?=($mes == '04')?'selected':''?> >Abril</option>
	<option value="05" <?=($mes == '05')?'selected':''?> >Maio</option>
	<option value="06" <?=($mes == '06')?'selected':''?> >Junho</option>
	<option value="07" <?=($mes == '07')?'selected':''?> >Julho</option>
	<option value="08" <?=($mes == '08')?'selected':''?> >Agosto</option>
	<option value="09" <?=($mes == '09')?'selected':''?> >Setembro</option>
	<option value="10" <?=($mes == '10')?'selected':''?> >Outubro</option>
	<option value="11" <?=($mes == '11')?'selected':''?> >Novembro</option>
	<option value="12" <?=($mes == '12')?'selected':''?> >Dezembro</option>
</select>
</div>
<div class="col-md-4">
<input type="number" class="form-control data" name="ano" value="<?php echo "$ano"; ?>"> </input>
</div>
<div class="col-md-4">
<input type="submit" value="Buscar" class="form-control btn btn-primary data">
</div>
</form>
</div>
</div>

      <h3 class="text-center"> CHEQUES EMITIDOS <?php
      
     
     
       echo date('m/Y', strtotime($data));
       
       ?> </h3>

      <table class="table table-bordered table-hover table-condensed">
      <?php

$consulta = $conn->query("SELECT DISTINCT numero_cheque FROM financeiro_pagamentos_feitos  where (tipo_pagamento='Cheque') AND (SUBSTRING(mes_referencia,1,7) = '$data')");
while ($dist= $consulta->fetch(PDO::FETCH_ASSOC)) {
         $numero_cheque = "{$dist['numero_cheque']}";


$consulta_dois = $conn->query("SELECT TOP 1 * FROM financeiro_pagamentos_feitos  where numero_cheque='$numero_cheque'");
while ($linha = $consulta_dois->fetch(PDO::FETCH_ASSOC)) {
         $numero_cheque = "{$linha['numero_cheque']}";


$consulta_conta_paga = $conn->query("SELECT  * FROM financeiro_pagamentos_feitos  where numero_cheque='$numero_cheque'");
$conta_paga = $consulta_conta_paga->fetch(PDO::FETCH_ASSOC);
$id_conta = "{$conta_paga['id_conta']}";

$consulta_conta = $conn->query("SELECT  * FROM valor_contas_a_pagar  where codigo='$id_conta'");
$conta = $consulta_conta->fetch(PDO::FETCH_ASSOC);

?>
   <thead>
<tr class="active">
<th>Conta</th>
<th>Número</th>
<th>Data Pagamento</th>
<th>Valor</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<?php echo "{$linha['conta']} <br>"; ?>
</td>
<td>
<?php  echo "{$dist['numero_cheque']}<br><br>"; ?>

</td>
<td>
<?php  

$data_conta = "{$linha['data_conta']}";
echo 

date('m/Y', strtotime($data_conta))."

<br><br>"; ?>

</td>
<td>
<?php  echo "{$linha['valor_pago']}<br><br>"; ?>
</td>

<tr>
<td>
</td>
<td>
<?php echo "{$conta['favorecido']} <br>"; ?>
</td>
<td>
<?php  echo "{$conta['inicio_mes']}<br><br>"; ?>

</td>
<td>
<?php  echo "{$conta_paga['valor_pago']}<br><br>"; ?>

</td>
<tr>
<td>
</td>
</tr>
</tbody>

<?php

}
}
