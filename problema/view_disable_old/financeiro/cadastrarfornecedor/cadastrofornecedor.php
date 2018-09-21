<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <?php require("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?> 
        
       <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <script type="text/javascript">
		
		
		    !
    function (a, b, c) {
        function d(a) {
            var c, d = b.createElement("canvas"),
                e = d.getContext && d.getContext("2d"),
                f = String.fromCharCode;
            return e && e.fillText ? (e.textBaseline = "top", e.font = "600 32px Arial", "flag" === a ? (e.fillText(f(55356, 56806, 55356, 56826), 0, 0), d.toDataURL().length > 3e3) : "diversity" === a ? (e.fillText(f(55356, 57221), 0, 0), c = e.getImageData(16, 16, 1, 1).data.toString(), e.fillText(f(55356, 57221, 55356, 57343), 0, 0), c !== e.getImageData(16, 16, 1, 1).data.toString()) : ("simple" === a ? e.fillText(f(55357, 56835), 0, 0) : e.fillText(f(55356, 57135), 0, 0), 0 !== e.getImageData(16, 16, 1, 1).data[0])) : !1
        }
        function e(a) {
            var c = b.createElement("script");
            c.src = a, c.type = "text/javascript", b.getElementsByTagName("head")[0].appendChild(c)
	}};
        
		
		
        </script>	
		


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
    
    
    
	
		</head>
		
<body onunload="window.opener.location.reload();">	

<div class="container">
    <form action="../../../model/financeiro/cadastrarfornecedor/insert_fornecedor.php" method="POST">
        <table class="table">
            <tr>
                <td colspan="4"><label for="fornecedor">Fornecedor</label><input type="text" class="form-control" id="forncedor" name="fornecedor"></td>
            </tr>
            <tr>
          
                
                <td  colspan="2"><label for="cep">CEP</label><input type="number" class="form-control" id="cep" name="cep"></td>
                    <td colspan="2"><label for="cidade">Cidade</label><input type="text" class="form-control" id="cidade" name="cidade"></td>
            
            </tr>
            <tr>
             <td colspan="4"><label for="endereco">Endereço</label><input type="text" class="form-control" id="endereco" name="endereco"></td>
            
                
                  
                
            </tr>
            <tr>
                <td colspan="2"><label for="bairro">Bairro</label><input type="text" class="form-control" id="bairro" name="bairro"></td>
                 
                <td colspan="2"><label for="uf">UF</label><input type="text" class="form-control" id="uf" name="uf"></td>
             </tr>
             <tr>
                 <td colspan="2"><label for="complemento">Complemento</label><input type="text" class="form-control" id="complemento" name="complemento"></td>
            
                 <td colspan="2"><label for="numero">Nº</label><input type="number" size="2" class="form-control" id="numero" name="numero"></td>
             
             
             </tr>
            <tr>
               
                  <td colspan="3"><label for="cnpj">CNPJ</label><input type="text" class="form-control" id="cnpj" name="cnpj"></td>
                   <td colspan=""><label for="ie">IE</label><input type="text" class="form-control" id="ie" name="ie"></td>
                
            </tr>
            <tr>
         
         <td><input type="submit" value="Enviar" class="btn btn-info"></td>
            </tr>
            
        </table>
    </form>
</div>