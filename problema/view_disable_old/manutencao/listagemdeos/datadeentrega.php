      
	<?php include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/header.php"); ?>



<p class="btn-info text-center"> Listar OS </p><br><br>
<table>
<form action="../../../view/manutencao/listagemdeos/selectlistaos.php" method="post">

<tr><td><label for="codigo_unidade">Número da Unidade</label></td><td>
<input type="number" class="form-control" name="codigo_unidade"></input>
</td></tr>
<tr><td><label for="data_entrega">Data para buscar</label></td><td>
<input type="date" class="form-control"  name="data_entrega"></input>
</td></tr>
<tr><td><input type="submit" class="form-control btn btn-primary"  value="Procurar"></input></td></tr>



</form>



</table>

</body>
</html>