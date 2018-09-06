<script src="//code.jquery.com/jquery-2.2.2.min.js"></script>
<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#endereco").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
				$("#complemento").val("")
                $("#nacionalidade").val("");
				$("#naturalidade").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")
						$("#complemento").val("...")
                        $("#nacionalidade").val("...")
						$("#naturalidade").val("...")
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#endereco").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
								$("#complemento").val(dados.complemento);
                                $("#nacionalidade").val(dados.localidade);
								$("#naturalidade").val(dados.localidade);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

<?php  /* Envia o formulario sem direcionar e limpa o formulario


<script type="text/javascript" src="/vdlap/js/jquery-1.12.2.min.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function(){
    		jQuery('#enviar_form').submit(function(){
    			var dados = jQuery( this ).serialize();
				$("#retorno").html("<img src='loader.gif'>");
    
    			jQuery.ajax({
    				type: "POST",
    				url: "insert.php",
    				data: dados,
    				success: function( data )
    				{
						  $("#retorno").html(data);
    		alert("Funcionário cadastrado com sucesso");
    					window.location.reload()
    				}
    			});
    			return false;
    		});
    	});

</script>

			
 */ ?>


<?php /* Faz a imagem ser carregada quando seleciona */ ?>
<script language="javascript" type="text/javascript">
    function readURL(input, id) {
               if (input.files && input.files[0]) {
                   var reader = new FileReader();
    
                   reader.onload = function (e) {
                       $('#'+id)
    		.attr('src', e.target.result)
    		;
                   }
    
                   reader.readAsDataURL(input.files[0]);
               }
           }
</script>

<?php /* Botões que fazem aparecer a linha */ ?>

<script>
function btn_tipo_telefone_2() {
	document.getElementById("tr_tipo_telefone_2").style.display="table-row";
	document.getElementById("btn_tipo_telefone_2").style.display="none";
}
</script>
	
<script>
function btn_tipo_telefone_3() {
	document.getElementById("tr_tipo_telefone_3").style.display="table-row";
	document.getElementById("btn_tipo_telefone_3").style.display="none";
}
</script>	

<script>
function btn_dependente_2() {
	document.getElementById("tr_dependente_2").style.display="table-row";
	document.getElementById("btn_dependente_2").style.display="none";
}
</script>

<script>
function btn_dependente_3() {
	document.getElementById("tr_dependente_3").style.display="table-row";
	document.getElementById("btn_dependente_3").style.display="none";
}
</script>

<script>
function btn_escolaridade_2() {
	document.getElementById("tr_escolaridade_2").style.display="table-row";
	document.getElementById("btn_escolaridade_2").style.display="none";
}
</script>

<script>
function btn_escolaridade_3() {
	document.getElementById("tr_escolaridade_3").style.display="table-row";
	document.getElementById("btn_escolaridade_3").style.display="none";
}
</script>
	
<script>
function btn_cartão_2() {
	document.getElementById("tr_cartão_2").style.display="table-row";
	document.getElementById("btn_cartão_2").style.display="none";
}
</script>

<script>
function btn_cartão_3() {
	document.getElementById("tr_cartão_3").style.display="table-row";
	document.getElementById("btn_cartão_3").style.display="none";
}
</script>