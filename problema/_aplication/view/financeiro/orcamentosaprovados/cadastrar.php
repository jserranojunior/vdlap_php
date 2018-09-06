<?php
$codigo = $_POST['codigo'];
$fornecedor = $_POST['fornecedor'];
$data_orcamento = $_POST['data_orcamento'];
$valor = $_POST['valor'];
$parcela = $_POST['parcela'];
$tipo = "Parcelado";


   ?>
   
<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>
<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>

<?php
 


$data_atual = $data_orcamento; 
$data_atual_hoje = $data_orcamento;

 if ($data_atual == ""){
     $data_atual = date("Y-m-d");
 }
  ?>
	
		</head>
		
<body>	

    
    
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
		<form action="#" method="post" name="menuForm" id="menuForm">

	<td>
	
<select name="tipo" id="tipo" class="form-control"  onchange="this.form.submit();">

<option <?=($tipo == 'Parcelado')?'selected':''?>>Parcelado</option>
</select>
</form>
</td>
<td>
	
	

	</td>
	</tr>


        <form action="../../../model/financeiro/orcamentosaprovados/inserte.php" method="POST">
<input name="tipo" type="hidden" value="<?php echo $tipo; ?>">
<tr>
<td>
<label for="favorecido">Favorecido</label>
</td>
<td>
	<style>
	.input_menor{
		width: 81%;
    float: left;
    margin-right: 3px;
		
	}
.btnfav {
    
    float: right;

}
		
	</style>
	
	<?php $consulta_fixo = $conn->query("SELECT * FROM fornecedor_contas_a_pagar order by fornecedor asc");  ?>
	
	<select name="favorecido"  id="favorecido" class="form-control input_menor">
	<option value="<?php echo $fornecedor; ?>"><?php echo $fornecedor; ?></option>
	
	<?php     
	 
	 while ($fornecedor = $consulta_fixo->fetch(PDO::FETCH_ASSOC)){
     $fornecedor_bd = "{$fornecedor['fornecedor']}"; 
	 
	 ?>
	 <option value="<?php echo $fornecedor_bd; ?>"><?php echo $fornecedor_bd; ?></option>
	 <?php	
		}
                
                
                
            $valor = str_ireplace(".", "", $valor);
            $valor = str_ireplace(",", ".", $valor);
                
            $valor = $valor/$parcela;  
            $valor = number_format($valor,2,',','.');
                
		?>		   
			    

</select>

	 <a class="esquerda"   href="#" onclick="window.open('../../../view/financeiro/cadastrarfornecedor/cadastrofornecedor.php', 'pop', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=200, LEFT=200, WIDTH=450, HEIGHT=450');" >
<div id="btn_tipo_telefone_2"><button type="button" class="btn btn-primary btnfav">

+  </button></div></a>
</td>
</tr>

<tr>
<td>
<label for="item">Item</label>
</td>
<td>
<input type="text" name="item" value="<?php echo "Orç: $codigo - Data Entrega: $data_atual"; ?>" id="item" class="form-control"></input>
</td>
</tr>

<tr>
<td>
<label for="inicio_conta">Data primeiro pagamento</label>
</td>
<td>
    
   
    <?php 
    $data_atual = date('Y-m-d', strtotime($data_atual));
    

    
    ?>
    
     
<input type="date" name="inicio_conta"  id="inicio_conta" value="<?php echo"$data_atual";?>" class="form-control"></input>
</td>
</tr>
<?php 

if ($tipo == 'Fixo'){
	
	?>
<tr>

<input type="hidden" name="fim_conta"  id="fim_conta" class="form-control">

</tr>

<?php
} 
?>

<tr>
<td>
<label for="valor">Valor de cada parcela</label>
</td>
<td>
<input type="text" name="valor" value="<?php echo $valor ?>" id="valor" class="form-control"></input>
</td>
</tr>

<?php 

if ($tipo == 'Parcelado'){
	
	?>
<tr>
<td>
<label for="parcelas">Quantida de parcelas</label>
</td>
<td>
<input type="number" name="parcelas" value="<?php echo $parcela; ?>" id="parcelas" class="form-control"></input>
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
<input type="text" name="observacoes" value="<?php echo "Orç: $codigo - Data Entrega: $data_atual"; ?>" id="observacoes" class="form-control"></input>
</td>
</tr>

<tr>
<td>
<label for="area">Área</label>
</td>

<td>
<select name="area" id="area" class="form-control">
<option></option>
<option selected >CMI</option>
<option>Geops</option>
<option>LS Star</option>
<option>Vd Lap</option>
</select>
</td>
</tr>


<tr>
<td>
<label for="ccustos">C. custos</label>
</td>

<td>
<select name="ccustos" id="ccustos" class="form-control">
					<option value=""></option>
						
						<option value="Administrativo">Administrativo</option>
							
						<option value="Caixa">Caixa</option>
							
						<option value="Comunicação">Comunicação</option>
							
						<option value="Financeiro">Financeiro</option>
							
						<option selected  value="Fornecedor">Fornecedor</option>
							
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
<select name="conta" id="conta" class="form-control">
					<option value=""></option>
						
						<option value="Administrativo">Administrativo</option>
							
						<option value="Benefícios">Benefícios</option>
							
						<option value="Encargos">Encargos</option>
							
						<option value="Férias">Férias</option>
							
						<option value="Folha">Folha</option>
							
						<option value="Geops Encargos">Geops Encargos</option>
							
						<option value="Geops-Folha">Geops-Folha</option>
							
						<option value="Impostos">Impostos</option>
							
						<option value="Investimento">Investimento</option>
							
						<option selected  value="Manutenção">Manutenção</option>
							
						<option value="PF - CMI">PF - CMI</option>
							
						<option value="Recisão">Recisão</option>
							
						<option value="Reposição">Reposição</option>
						
				</select>
				</td>
				</tr>
				
							
				<tr>
				<td>
                                    <input type="hidden" name="codigo" value="<?php echo $codigo;?>" class="form-control">
				<input type="submit" class="form-control center btn btn-primary" value="CADASTRAR"></input>
				</td>
				</tr>

</form>
</table>
</div>


</body>	
</html>