      
<?php include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/header.php");
require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 
?>



<script type="text/javascript">
    jQuery(document).ready(function(){
    		jQuery('#update_data').submit(function(){
    			var dados = jQuery( this ).serialize();
				$("#retorno").html("<img src='loader.gif'>");
    
    			jQuery.ajax({
    				type: "POST",
    				url: "../../../model/manutencao/dataentregaos/update_data_entrega.php",
    				data: dados,
    				success: function( data )
    				{
						  $("#retorno").html(data);
    		alert("DATA ADICIONADA COM SUCESSO!");
    					window.location.reload()
    				}
    			});
    			return false;
    		});
    	});

</script>

<script>
function exibeValor(nomeCampo, lenCampo, controle)
{
	if ((nomeCampo.value.length == lenCampo) && (checarTabulacao))
	{	
		var i=0;
		for (i=0; i<document.forms[0].elements.length; i++)
		{
			if (document.forms[0].elements[i].name == nomeCampo.name)
			{
				while ((i+1) < document.forms[0].elements.length)
				{
					if (document.forms[0].elements[i+1].type != "hidden")
					{
						document.forms[0].elements[i+1].focus();
						break;
					}
					i++;
				}
				checarTabulacao=false;
				break;
			}
		}
	}
}
	
function stopTabCheck(nomeCampo)
{checarTabulacao=false;}
 
function startTabCheck()
{checarTabulacao=true;}
</script>


<label for="numerounidade">Procure o numero da unidade</label>
<form method="post" action="#">
<table>

<tr><td><input maxlength="2"  onkeypress="startTabCheck();" onkeyup="exibeValor(this, 2, 0)" size="4" onfocus="stopTabCheck(this)"  placeholder="Unidade" type="text" name="numerounidade" class="form-control"></input>
</td><td>
<input placeholder="Numero OS"type="text" name="numeroos" class="form-control"></input>
</td>
<td>
<input type="submit"  class="form-control btn btn-primary" value="ENVIAR"></input>
</td>
</tr>
</table>
</form>

<?php

$numeroos = "0";
$numerounidade = "0";

if (isset($_POST['numeroos'])){
$numeroos = $_POST['numeroos'];

};

if (isset($_POST['numerounidade'])){
$numerounidade = $_POST['numerounidade'];

};



?>
<?php 
if ($_POST){ 

$consulta = $connold->query("SELECT * FROM TBL_OrdemServico2 WHERE (num_os = '$numeroos') AND (cd_unidade_os = '$numerounidade')  ORDER BY dt_entrada DESC ");
 
 
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

$dataentrada = $linha['dt_entrada'];
$tamanhodataentrada = strlen($dataentrada);
$datadaentrada = substr($dataentrada,0, $tamanhodataentrada-13);

$dataentradaos = $linha['dt_os'];
$tamanhodataos = strlen($dataentradaos);
$datadaos = substr($dataentradaos,0, $tamanhodataos-13);
$cd_codigo = "{$linha['cd_codigo']}";


echo "Numero da OS: {$linha['num_os']}<br>";


  $unidade = $connold->query("SELECT * FROM TBL_unidades WHERE (cd_codigo = '$numerounidade')" );
$unidade_linha = $unidade->fetch(PDO::FETCH_ASSOC);
echo "Unidade: {$unidade_linha['nm_unidade']}<br>";

$cd_unidade = "{$unidade_linha['nm_unidade']}";

	
$codigo_equipamento = "{$linha['cd_equipamento']}";
$equipe = $connold->query("SELECT * FROM TBL_equipamento WHERE (cd_codigo = '$codigo_equipamento')" );
$equipamento = $equipe->fetch(PDO::FETCH_ASSOC);


echo "Equipamento: {$equipamento['nm_equipamento_novo']}<br>";

echo "Entregue por:<span style='text-decoration: underline;'> {$linha['nm_solicitante']}</span><br><br>";

				
					
					?>
					<p> Adicione a data que será entregue!</p>
					<form id="update_data" method="POST" action="../../../model/manutencao/dataentregaos/update_data_entrega.php" >
					<input type="hidden" name="cd_codigo" value="<?php echo $cd_codigo; ?>"></input>
                                        <input type="hidden" name="cd_unidade" value="<?php echo $cd_unidade; ?>"></input>
                                        
					<input name="data_entrega" value="<?php echo "{$linha['data_entrega']}";?>" type="date"></input>
					<input type="submit" value="Adcionar">
					</form>
					
				
<?php 
};

?>
</body>
</html>


