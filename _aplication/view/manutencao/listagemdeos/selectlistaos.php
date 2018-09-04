<style>

.thead{
background-color:#808080;
}
.thead{
color:#fff;
}
.novepx{
font-size:12px;
font-weight: bold;
margin-top:2px;
}

td{
font-size:12px;

margin-top:2px;

}
.center{

text-align:center;

}
.input{
margin:
0;
padding:0;
}

.option_data{

margin-top:40px;
border:1px solid black; 
background-color:#c7d9e8;
margin-bottom:30px;
width:30%;
}

form{
margin:
0;
padding:0;
}
td {
    font-size: 15px! important;
    padding: 1px! important;
}
</style>
<header>   <?php require("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>
</header>

<div class="mini-content container">
<?php 

require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 


$data_entrega = $_POST['data_entrega'];
$codigo_unidade = $_POST['codigo_unidade'];

?>



<img src="../../../view/img/header/logovdlap.png"/><br>
<span class="left"><h4>Data de entrega: <?php echo date('d/m/Y', strtotime($data_entrega));?></h4>
</span>

<span class="center"><h2>
<?php
$unidade = $connold->query("SELECT * FROM TBL_unidades WHERE (cd_codigo = '$codigo_unidade')" );
$unidade_linha = $unidade->fetch(PDO::FETCH_ASSOC);
echo "{$unidade_linha['nm_unidade']}";
?>
</h2>
</span>



<br>
<table class="table table-striped tabelaman" border="1px">
<thead>
<tr>

<td> <p class="novepx"> NÚMERO DA OS </p></td>
<td> <p class="novepx">INSTRUMENTAL </p></td>

<td><p class="novepx"> RECEBIMENTO </p></td>


</tr>
</thead>
<tbody>
<?php 



?>




<?php



$consulta = $connold->query("SELECT * FROM TBL_OrdemServico2 WHERE (data_entrega = '$data_entrega') AND (cd_unidade_os = '$codigo_unidade')" );
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC))
{
?>



<tr>





<td style="font-size:18px! important;"><?php echo "{$linha['num_os']}";?></td>
<td style="font-size:18px! important;"><?php 

$codigo_equipamento = "{$linha['cd_equipamento']}";

$equipe = $connold->query("SELECT * FROM TBL_equipamento WHERE (cd_codigo = '$codigo_equipamento')" );
$equipamento = $equipe->fetch(PDO::FETCH_ASSOC);



echo "{$equipamento['nm_equipamento_novo']}";






?></td>

<td>



</tr>
<?php
}
;

?>

<style>
.left{
	
	float:right;
	
}

.center{
	
	text-align: center;
	
}

</style>

</tbody>
</table><br><br><br><br>
					<span class="left">Recebido por:    ___________________________<br><br>
					Recebido no dia: _____/______/______<br><span>