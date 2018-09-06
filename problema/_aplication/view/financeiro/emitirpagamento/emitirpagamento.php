<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>
<?php 

$data_atual = $_POST['data_atual'];




$soma_total = 0;

if(isset($_POST['data'])){

$data =  $_POST['data'];
}

if(isset($_POST['data_atual'])){

$data_atual =  $_POST['data_atual'];
}
 

?>


<!DOCTYPE html>
<html lang="pt-BR">
    <head>
<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>

	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#form1').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "../../../model/financeiro/emitirpagamento/insert.php",
				data: dados,
				success: function( data )
				{
				window.close()
                                window.opener.location.reload()
				}
			});
			
			return false;
		});
	});
	</script>

</head>


<body>

	
<div class="container">
<form method="POST" name="form1" id="form1">

<table class="table table-condensed">


<tr>
<td colspan="3">
<h5>Emitir Pagamento</h5>
</td>
</tr>


<tr>
<td>
<label for="tipo_pagamento">Tipo de pagamento</label>
</td>
<td>
<select class="form-control" name="tipo_pagamento" id="tipo_pagamento" >
<option></option>
<option value="Cheque">Cheque</option>
<option value="Transferência">Transferência</option>
</select>
</td>
</tr>

</form>




<tr>
<td>
<label for="conta_pagamento">Conta</label>
</td>
<td>
	
<select class="form-control" name="conta">

<option></option>
<option>Vd Lap</option>
<option>CMI</option>
</select>

</td>
<td>

	</td>
	</tr>


<tr>
<td>
<label for="numero_cheque">N° Cheque</label>
</td>
<td>
<input type="number" class="form-control" id="numero_cheque" name="numero_cheque">
</td>
</tr>




<tr>
<td>
<label for="data_conta">Data</label>
</td>
<td>
<input type="date" name="data_conta"  id="data_conta" value="<?php echo $data; ?>" class="form-control"></input>
</td>
</tr>






<tr>
<td>
<h5>CONTAS</h5>
</td>
</tr>

<?php


if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $id) {

   echo "
   <input type='hidden' name='check_list[]' value='$id'>
   ";
   
  
$contas = $conn->query("SELECT * FROM contas_a_pagar WHERE (id = '$id')");                  
               $linha = $contas->fetch(PDO::FETCH_ASSOC);

 $segconsulta = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = '$id') AND SUBSTRING(inicio_mes,1,7)= '$data_atual'");                  
               $valor_atual = $segconsulta->fetch(PDO::FETCH_ASSOC);

$id = "{$linha['id']}";

 $favorecido = "{$valor_atual['favorecido']}";

$tipo = "{$linha['tipo']}";


$valor_atual = "{$valor_atual['valor']}";


   $valor_atual = str_ireplace(".","",$valor_atual);
$valor_atual = str_ireplace(",",".",$valor_atual);

if($tipo == "Parcelado" ){

        /* Consulta qual o valor do ultimo mês com pagamento */
        $ult_mes = $conn->query("SELECT top 1 *   FROM valor_contas_a_pagar WHERE (codigo = $id)AND (SUBSTRING(inicio_mes,1,7) < '$data_atual') order by inicio_mes desc");
        $ultimo_mes = $ult_mes->fetch(PDO::FETCH_ASSOC);
        $valor_ultimo_mes = "{$ultimo_mes['valor']}";
        $valor_ultimo_mes = str_ireplace(".", "", $valor_ultimo_mes);
        $valor_ultimo_mes = str_ireplace(",", ".", $valor_ultimo_mes);

        /* Consulta qual o valor do primeiro mês com pagamento */
        $prim_mes = $conn->query("SELECT top 1 *   FROM valor_contas_a_pagar WHERE (codigo = $id) order by inicio_mes asc");
        $primeira_parcela = $prim_mes->fetch(PDO::FETCH_ASSOC);
        $mes_primeira_parcela = "{$primeira_parcela['inicio_mes']}";
        $mes_primeira_parcela = substr($mes_primeira_parcela, 0, 7);


/* Verifica os valores do parcelado */
        if ($valor_atual == "") {
            $valor_atual = $valor_ultimo_mes;
        }

}








              $linha_mes = "{$linha['inicio_conta']}";
               $dia_pagamento = substr("$linha_mes",8); 
$data_conta = $data_atual."-".$dia_pagamento;

$data_conta = date('d/m/Y', strtotime($data_conta));






  echo "
   <input type='hidden' name='valor[]' value='$valor_atual'>";






?>

<tr>
   <td>
                  <?php echo $favorecido; ?>
               </td>
              <td>
                  <?php
                
                   echo $data_conta ;
                  
                   
                   ?>
               </td>
               <td>
                  <?php echo number_format($valor_atual,2, ',', '.'); ;?>
               </td>
               
               </tr>


<?php
 
$soma_total = $soma_total + $valor_atual;



    }
}
?>
<tr>
<td colspan="2">
VALOR TOTAL
</td>
    <td>
    <?php 
    
    $soma_total = number_format($soma_total,2, ',', '.');
    echo
    
     $soma_total ;
     
     
     ?>
    </td>
</tr>

				<tr>
				<td>
                <input type="hidden" name="data" value="<?php echo $data; ?>">
                <input type="hidden" name="data_atual" value="<?php echo $data_atual; ?>">
				<input type="submit" class="form-control center btn btn-info" value="EMITIR"></input>
				</td>
				</tr>

</form>
</table>
</div>


</body>	
</html>