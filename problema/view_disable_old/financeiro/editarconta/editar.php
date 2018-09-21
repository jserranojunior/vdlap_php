<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");  ?>
<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); 


$id = $_POST['id'];
$area = $_POST['area'];
$cccustos = $_POST['cccustos'];
$conta = $_POST['conta'];
$tipo = $_POST['tipo'];
$favorecido = $_POST['favorecido'];
$inicio_mes = $_POST['inicio_mes'];
$item = $_POST['item'];
$inicio_conta = $_POST['inicio_conta'];
$dia_pagamento = $_POST['dia_pagamento'];
$fim_conta = $_POST['fim_conta'];
$valor_atual = $_POST['valor_atual'];
$observacoes = $_POST['observacoes'];
$qtdparcela = $_POST['qtdparcela'];
$vazio = $_POST['vazio'];

if($_POST['suspenso'] == "Sim"){
$suspenso = $_POST['suspenso'];
}else{
    $suspenso = "Não";
}


if ($tipo == 'Extra'){
		$fim_conta = $inicio_conta;
}


$data_completa = "$inicio_conta-$dia_pagamento";
$data_completa_fim = "$fim_conta-$dia_pagamento";

if($valor_atual !== ""){
 $valor_atual = number_format($valor_atual, 2, ',', '.');
}

?>



	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#form1').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "../../../model/financeiro/editarconta/updateconta.php",
				data: dados,
				success: function( data )
				{
				window.close()
				}
			});
			
			return false;
		});
	});
	</script>


<body  onunload="window.opener.location.reload();">	
<div class="container">

<table class="table">
<tr>
<td>
<h5>Cadastro de pagamento</h5>
</td>
</tr>
<tr>
<td>
<label for="tipo">Tipo de conta</label>
</td>
<td>
	
<label name="tipo" id="tipo" class="form-control" value="<?php echo $tipo ;?>"><?php echo $tipo ;?></label>


</td>
<td>
	
	

	</td>
	</tr>


<form action="../../../model/financeiro/editarconta/updateconta.php" method="POST" id="form1">

<tr>
<td>
<label for="favorecido">Favorecido</label>
</td>
<td>

	
	<?php $consulta_fixo = $conn->query("SELECT * FROM fornecedor_contas_a_pagar order by fornecedor asc");  ?>
	
	<select name="favorecido"  id="favorecido" class="form-control input_menor">
	<option value="<?php echo $favorecido; ?>"><?php echo $favorecido; ?></option>
	
	<?php     
	 
	 while ($fornecedor = $consulta_fixo->fetch(PDO::FETCH_ASSOC)){
     $fornecedor_bd = "{$fornecedor['fornecedor']}"; 
	 
	 ?>
	 <option value="<?php echo $fornecedor_bd; ?>"><?php echo $fornecedor_bd; ?></option>
	 <?php	
		}
		?>		   
			    

</select>

</td>
</tr>

<tr>
<td>
<label for="item">Item</label>
</td>
<td>
<input type="text" name="item" value="<?php echo $item ;?>" id="item" class="form-control"></input>
</td>
</tr>

<tr>
<td>
<label for="inicio_conta">MES REFERENTE</label>
</td>
<td>
<input type="date" name="inicio_conta"  id="inicio_conta" value="<?php echo $inicio_mes ?>" class="form-control"></input>
</td>
</tr>
<?php 

if ($tipo == 'Fixo'){
	
	?>
<tr>

<input type="hidden" name="fim_conta" value="<?php echo $data_completa_fim ?>" id="fim_conta" class="form-control"></input>

</tr>

<?php
} 
?>
<tr>
    <td>
<label for="valor">Suspender Pagamento?</label>
    </td>
    <td>
        <select class="form-control" name="suspenso">
            <option value="<?php echo "$suspenso";?>" class="form-control"><?php echo "$suspenso";?></option>
            <option value="Sim" class="form-control">Sim</option>
             <option value="Não" class="form-control">Não</option>
        </select>
    </td>
</tr>   
<tr>
<td>
<label for="valor">Valor de cada parcela</label>
</td>
<td>
<input type="text" name="valor" value="<?php echo $valor_atual;?>" value="0,00" id="valor" class="form-control"></input>
</td>
</tr>

<?php 

if ($tipo == 'Parcelado'){
	
	?>
<tr>
<td>
<label for="parcela">Quantida de parcelas</label>
</td>
<td>
<input type="number" name="qtdparcela" value="<?php echo $qtdparcela;?>"  id="qtdparcela" class="form-control"></input>
</td>
</tr>

<?php 
}
?>

<tr>
<td>
<label for="observacoes">Observações</label>
</td>
<td>
<input type="text" name="observacoes" value="<?php echo$observacoes;?>" id="observacoes" class="form-control"></input>
</td>
</tr>

<tr>
<td>
<label for="area">Área</label>
</td>

<td>
<select name="area" id="area" class="form-control">
<option><?php echo $area ;?></option>
<option>CMI</option>
<option>Geops</option>
<option>Loc Lap</option>
<option>LS Star</option>
<option>Vd Lap</option>
</select>
</td>
</tr>


<tr>
<td>
<label for="cccustos">C. custos</label>
</td>

<td>
<select name="cccustos"  id="ccustos" class="form-control">
					<option value="<?php echo $cccustos ;?>"><?php echo $cccustos ;?></option>
						
						<option value="Administrativo">Administrativo</option>
							
						<option value="Caixa">Caixa</option>
							
						<option value="Comunicação">Comunicação</option>
							
						<option value="Financeiro">Financeiro</option>
							
						<option value="Fornecedor">Fornecedor</option>
							
						<option value="Imposto">Imposto</option>
							
						<option value="Logística">Logística</option>
							
						<option value="Salário">Salário</option>
						
				</select>

</td>
</tr>

<tr>
<td>
<label for="conta">Conta</label>
</td>

<td>
<select name="conta" class="form-control">
					<option value="<?php echo $conta ;?>"><?php echo $conta ;?></option>
						
						<option value="Administrativo">Administrativo</option>
							
						<option value="Benefícios">Benefícios</option>
							
						<option value="Encargos">Encargos</option>
							
						<option value="Férias">Férias</option>
							
						<option value="Folha">Folha</option>
							
						<option value="Geops Encargos">Geops Encargos</option>
							
						<option value="Geops-Folha">Geops-Folha</option>
							
						<option value="Impostos">Impostos</option>
							
						<option value="Investimento">Investimento</option>
							
						<option value="Manutenção">Manutenção</option>
							
						<option value="PF - CMI">PF - CMI</option>
							
						<option value="Recisão">Recisão</option>
							
						<option value="Reposição">Reposição</option>
						
				</select>
				</td>
				</tr>
				
							
				<tr>
				<td>
				<input type="hidden" name="vazio" value="<?php echo $vazio ?>" id="vazio" class="form-control"></input>
				<input type="hidden" name="tipo" value="<?php echo $tipo ?>" id="tipo" class="form-control"></input>
				<input type="hidden" name="id" value="<?php echo $id ?>" id="id" class="form-control"></input>
				<input type="submit" class="form-control center btn btn-primary" value="EDITAR"></input>
				</td>
				</tr>

</form>
</table>
</div>


</body>	
</html>