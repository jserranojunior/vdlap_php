<?php
    /*
    Template Name: Listagem de funcionarios
    */
       require "$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/header.php";
require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 

?>

<?php  /* Corpo do site */ ?>
<div class="mini-content container">

 <table border="1" class="table table-condensed table-hover table-bordered table-striped">
<tr>
<thead>
<td>Matricula:</td>
<td>Nome</td>
</tr>
</thead>

<?php 
$consulta = $conn->query("SELECT * FROM cmi_cadastro_de_funcionarios"); 

while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) 
{ echo "
<tr>
	<td>
		 {$linha['matricula']} 
	</td>
	<td> {$linha['nome']}
	</td>
	<td>
		<form action='../../../model/rh/deletarfuncionarios/deletar.php' method='post'>
			<input type='hidden' name='id' value='{$linha['id']}' />
			<input type='submit'  class='btn-table btn btn-primary btn-sm'  name='deletar' value='Deletar' />
		</form>
	</td>
	<td>
		<form action='../../../model/rh/editarfuncionarios/editar.php' method='post'>
			<input type='hidden' name='id' value='{$linha['id']}' />
			<input type='submit' class='btn-table btn btn-primary btn-sm'  name='deletar' value='Editar' />
		</form>
	</td>
</tr> "; 
}


?>




</table>





</div>