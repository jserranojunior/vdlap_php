
<?php require("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>



	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#excluir').submit(function(){
			var dados = jQuery( this ).serialize();

			jQuery.ajax({
				type: "POST",
				url: "../../../model/financeiro/excluirconta/excluirconta.php",
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

<body onunload="window.opener.location.reload();">
<div class="container">
    <div class="row">

<h2 class="text-center">Deseja realmente excluir?</h2>

<?php 

$tipo = $_POST['tipo'];
$id = $_POST['id'];
$data_anterior = $_POST['data_anterior'];
$parcela_atual = $_POST['parcela_atual'];
?>



        <form method="POST" id="excluir" name="excluir">
<input type="hidden" value="<?php echo $id ?>" name="id">
<input type="hidden" value="<?php echo $tipo ?>" name="tipo">
<input type="hidden" value="<?php echo $parcela_atual ?>" name="parcela_atual">
<input type="hidden" value="<?php echo $data_anterior ?>" name="data_anterior">



</div>
<div class="row">
        <div class="col-xs-4 col-xs-offset-2">
            <input class="btn btn-primary" type="submit" value="Excluir">
            </input>
        </div>
        <div class="col-xs-4">
                <div class="btn btn-warning"  onclick="window.close()">Cancelar</div>
                </div>
        </div>
        </div>
    </div>
</div>
</form>



