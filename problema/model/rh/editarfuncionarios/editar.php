
<style>

.form-control{
	
	width:100%;
	height: 25px! important;
	padding: 0px 12px! important;
}



p.titulo_branco{
	
	margin: -7px 0px! important;
    padding: 0px;
	
}


p{
	
	margin:0px! important;
	
}


label{
    padding: 0;
    margin: 0;
    font-size: 12;
	margin-bottom: 0px! important;
}

.marron{
	
	background-color: #a1a1a1;
	
}

</style>

<?php 
    /*
    Template Name: Atualizar Cadastro
    */

       require "$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/header.php";
require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 
    ?>
	

	
<script type="text/javascript" src="/vdlap/js/jquery-1.12.2.min.js"></script> 
<script type="text/javascript">
    jQuery(document).ready(function(){
    		jQuery('#enviar_form').submit(function(){
    			var dados = jQuery( this ).serialize();
				$("#retorno").html("<img src='loader.gif'>");
    
    			jQuery.ajax({
    				type: "POST",
    				url: "update.php",
    				data: dados,
    				success: function( data )
    				{
						  $("#retorno").html(data);
							window.location.reload()
    				}
    			});
    			return false;
    		});
    	});

</script>

<?php
 
$id = $_POST["id"];
$consulta = $conn->query("SELECT * FROM cmi_cadastro_de_funcionarios WHERE id =".($id));




$linha = $consulta->fetch(PDO::FETCH_ASSOC);



?>


			<?php
/* Atribui a variavel o tipo da linha */
			
			
$estado_civil = "{$linha['estado_civil']}";
$tipo_telefone = "{$linha['tipo_telefone']}";		
$tipo_telefone_2 = "{$linha['tipo_telefone_2']}";	
$tipo_contato_celular	 = "{$linha['tipo_contato_celular']}";	
$cargo_coren = "{$linha['cargo_coren']}";	
$primeira_dose_dupla = "{$linha['primeira_dose_dupla']}";
$segunda_dose_dupla = "{$linha['segunda_dose_dupla']}";
$terceira_dose_dupla = "{$linha['terceira_dose_dupla']}";
$primeira_dose_hepatite = "{$linha['primeira_dose_hepatite']}";
$segunda_dose_hepatite = "{$linha['segunda_dose_hepatite']}";
$terceira_dose_hepatite = "{$linha['terceira_dose_hepatite']}";
$sexo = "{$linha['sexo']}";
$registro_coren = "{$linha['registro_coren']}";
$tipo_concessao = "{$linha['tipo_concessao']}";
$coren_situacao = "{$linha['coren_situacao']}";
$scr_vacinacao = "{$linha['scr_vacinacao']}";
$parentesco_dependente_1 = "{$linha['parentesco_dependente_1']}";
$parentesco_dependente_2 = "{$linha['parentesco_dependente_2']}";
$parentesco_dependente_3 = "{$linha['parentesco_dependente_3']}";
$sexo_dependente_1 = "{$linha['sexo_dependente_1']}";
$sexo_dependente_2 = "{$linha['sexo_dependente_2']}";
$sexo_dependente_3 = "{$linha['sexo_dependente_3']}";
$escolaridade = "{$linha['escolaridade']}";
$escolaridade_2 = "{$linha['escolaridade_2']}";
$escolaridade_3 = "{$linha['escolaridade_3']}";
$andamento_escolaridade = "{$linha['andamento_escolaridade']}";
$tipo_cartao_1 = "{$linha['tipo_cartao_1']}";
$tipo_cartao_2 = "{$linha['tipo_cartao_2']}";
$tipo_cartao_3 = "{$linha['tipo_cartao_3']}";
$situacao = "{$linha['situacao']}";
$cargo = "{$linha['cargo']}";
$nivel_hierarquico = "{$linha['nivel_hierarquico']}";
$funcao = "{$linha['funcao']}";
$unidade = "{$linha['unidade']}";
$carga_horaria = "{$linha['carga_horaria']}";
$tipo_contrato = "{$linha['tipo_contrato']}";
	
				?>

	
<?php  /* Corpo do site */ ?>
<div class="mini-content container">
<p class="titulo_pure_black"> Ficha cadastral dos funcionários</p>
    <table border="1" class="table table-condensed table-bordered">
        <form action="update.php" method="post" class="form-inline" id="enviar_form" enctype="multipart/form-data">
       
<?php echo "<input type='hidden' name='id' value='{$linha['id']}' />" ; ?>
		 
		
		<td rowspan=6 id="menor">
                <span class="foto_funcionario">
                <label for="enviar_foto">
                <img id="mini_foto_new" class="mini_foto" src="/vdlap/img/fotos_funcionarios/icone_cadastro_funcionario.png" />
                </label>
                <input id="enviar_foto" class="form-control" name="enviar_foto" type="file" onchange="readURL(this,'mini_foto_new');"  />
                </span>
            </td> 
		<tr>
			
			<td colspan="1"> 
                <label for="matricula">Matrícula</label>
                <input type="text" value="<?php echo "{$linha['matricula']}" ;?>" name="matricula" class="form-control" id="matricula"></input>
            </td>
            <td colspan="2">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" value="<?php echo "{$linha['nome']}"; ?>" class="form-control" id="nome"></input>
            </td>
           </tr>
         
			<tr>
			<td>
                <label for="datanascimento">Data de Nascimento</label><br/>
                <input type="date" value="<?php echo "{$linha['datanascimento']}"; ?>" name="datanascimento" class="form-control" id="datanascimento"></input>
            </td>
			 <td>
                <label for="sexo">Sexo</label><br/>
                <select placeholder="<?php echo "{$linha['sexo']}"; ?>" name="sexo" class="form-control" id="sexo" >
                    <option <?=($sexo == '')?'selected':''?>></option>
                    <option <?=($sexo == 'Feminino')?'selected':''?>>Feminino</option>
                    <option <?=($sexo == 'Masculino')?'selected':''?>>Masculino</option>
                </select>
            </td>

					<td>
                <label for='estado_civil'>Estado Civil</label><br/>
                <select name='estado_civil' class='form-control' id='estado_civil'>
                    <option <?=($estado_civil == '')?'selected':''?>></option>
                    <option <?=($estado_civil == 'Solteiro')?'selected':''?>>Solteiro</option>
                    <option <?=($estado_civil == 'Casado')?'selected':''?>>Casado</option>
                    <option  <?=($estado_civil == 'Separado')?'selected':''?> >Separado</option>
                    <option <?=($estado_civil == 'Divorciado')?'selected':''?>>Divorciado</option>
                    <option>Viúvo</option>
                </select>
            </td>
			</tr>
       
		
		<tr class="black">
          <td colspan="4">
                <p class="titulo_branco">
                    Endereço
                </p>
            </td>  
        </tr>
		
		
       
        <tr>
			<td>
                <label for="cep">CEP</label><br/>
                <input type="text" name="cep" value="<?php echo "{$linha['cep']}"; ?>" class="form-control" id="cep"></input>
            </td>
            <td>
                <label  for="bairro">Bairro</label><br/>
                <input  value="<?php echo "{$linha['bairro']}"; ?>" type="text" name="bairro" class="form-control" id="bairro"></input>
            </td>
            
            <td>
                <label for="cidade">Cidade</label><br/>
                <input type="text" name="cidade" value="<?php echo "{$linha['cidade']}"; ?>" class="form-control" id="cidade"></input>
            </td>
            
        </tr>
		 <tr>
            <td colspan="2">
                <label for="endereco">Endereço</label><br/>
                <input type="text" value="<?php echo "{$linha['endereco']}"; ?>" name="endereco" class="form-control" id="endereco"></input>
            </td>
            <td>
                <label for="numero">N°</label><br/>
                <input type="number" value="<?php echo "{$linha['numero']}"; ?>" name="numero" class="form-control" id="numero"></input>
            
        </tr>
        <tr>
            
            <td>
                <label for="nacionalidade">Nacionalidade</label><br/>
                <input type="text" value="<?php echo "{$linha['nacionalidade']}"; ?>" name="nacionalidade" class="form-control" id="nacionalidade"></input>
            </td>
            <td>
                <label for="naturalidade">Naturalidade (Cidade)</label><br/>
                <input type="text" name="naturalidade" value="<?php echo "{$linha['naturalidade']}"; ?>" class="form-control" id="naturalidade"></input>
            </td>
			<td>
                <label for="uf">UF</label><br/>
                <input type="text" name="uf" class="form-control" value="<?php echo "{$linha['uf']}"; ?>" id="uf"></input>
            </td>
            <td>
                <label for="complemento">Complemento</label><br/>
                <input type="text" name="complemento" value="<?php echo "{$linha['complemento']}"; ?>" class="form-control" id="complemento"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Informações do Cônjuge
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <label for="nome_conjuge">Nome do Cônjuge</label>
                <input type="text" name="nome_conjuge" value="<?php echo "{$linha['nome_conjuge']}"; ?>" class="form-control" id="nome_conjuge"></input>
            </td>
            <td>
                <label for="data_nascimento_conjuge">Data de Nascimento Cônjuge</label>
                <input type="date" name="data_nascimento_conjuge" value="<?php echo "{$linha['data_nascimento_conjuge']}"; ?>" class="form-control" id="data_nascimento_conjuge"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                Filiação
                </p">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="nome_mae">Nome da mãe</label>
                <input type="text" name="nome_mae" value="<?php echo "{$linha['nome_mae']}"; ?>" class="form-control" id="nome_mae"></input>
            </td>
            <td  colspan="2">
                <label for="nome_pai">Nome do pai</label>
                <input type="text" name="nome_pai" class="form-control" value="<?php echo "{$linha['nome_pai']}"; ?>" id="nome_pai"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Contatos
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tipo_telefone">Tipo de contato</label><br/>
                <select name="tipo_telefone" class="form-control" id="tipo_telefone">
                    <option <?=($tipo_telefone == '')?'selected':''?>></option>
                    <option <?=($tipo_telefone == 'Telefone')?'selected':''?>>Telefone</option>
                    <option <?=($tipo_telefone == 'Celular')?'selected':''?>>Celular</option>
                    <option <?=($tipo_telefone == 'Urgencia')?'selected':''?>>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_telefone">DDD</label><br/>
                <input type="text" name="ddd_telefone" size="2" value="<?php echo "{$linha['ddd_telefone']}"; ?>" class="form-control" id="ddd_telefone"></input>
            </td>
            <td>
                <label for="telefone">Telefone</label><br/>
                <input type="tel" name="telefone" class="form-control" value="<?php echo "{$linha['telefone']}"; ?>" id="telefone"></input>
            </td>
            <td>
                <label for="obs_contato">Observações</label><br/>
                <input type="text" name="obs_contato" value="<?php echo "{$linha['obs_contato']}"; ?>" class="form-control input_left" id="obs_contato"></input>
				
            </td>
        </tr>
		<tr  id="tr_tipo_telefone_2">
            <td>
                <label for="tipo_telefone_2">Tipo de contato</label><br/>
                <select name="tipo_telefone_2" class="form-control" id="tipo_telefone_2">
					<option <?=($tipo_telefone_2 == '')?'selected':''?>></option>
                    <option <?=($tipo_telefone_2 == 'Telefone')?'selected':''?>>Telefone</option>
                    <option <?=($tipo_telefone_2 == 'Celular')?'selected':''?>>Celular</option>
                    <option <?=($tipo_telefone_2 == 'Urgencia')?'selected':''?>>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_telefone_2">DDD</label><br/>
                <input type="text" name="ddd_telefone_2" size="2" value="<?php echo "{$linha['ddd_telefone_2']}"; ?>" class="form-control" id="ddd_telefone_2"></input>
            </td>
            <td>
                <label for="telefone_2">Telefone</label><br/>
                <input type="tel" name="telefone_2" class="form-control" value="<?php echo "{$linha['telefone_2']}"; ?>" id="telefone_2"></input>
            </td>
            <td>
                <label for="obs_contato_2">Observações</label><br/>
                <input type="text" name="obs_contato_2" value="<?php echo "{$linha['obs_contato_2']}"; ?>" class="form-control input_left" id="obs_contato_2"></input>
				
            </td>
        </tr>
        <tr  id="tr_tipo_telefone_3" >
            <td>
                <label for="tipo_contato_celular">Tipo de contato</label><br/>
                <select name="tipo_contato_celular" class="form-control" id="tipo_contato_celular">
                <option <?=($tipo_contato_celular == '')?'selected':''?>></option>
                    <option <?=($tipo_contato_celular == 'Telefone')?'selected':''?>>Telefone</option>
                    <option <?=($tipo_contato_celular == 'Celular')?'selected':''?>>Celular</option>
                    <option <?=($tipo_contato_celular == 'Urgencia')?'selected':''?>>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_celular">DDD</label><br/>
                <input type="text" name="ddd_celular" size="2" value="<?php echo "{$linha['ddd_celular']}"; ?>" class="form-control" id="ddd_celular"></input>
            </td>
            <td>
                <label for="celular">Telefone</label><br/>
                <input type="tel" name="celular" class="form-control" value="<?php echo "{$linha['celular']}"; ?>" id="celular"></input>
            </td>
            <td>
                <label for="operadora">Operadora</label><br/>
                <input type="text" name="operadora" class="form-control" value="<?php echo "{$linha['operadora']}"; ?>" id="operadora"></input>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <label for="email">E-mail</label><br/>
                <input type="email" name="email" class="form-control" value="<?php echo "{$linha['email']}"; ?>" id="email"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                Documentação
                </p
            </td>
        </tr>
        <tr>
            <td>
                <label for="pis">PIS</label><br/>
                <input type="text" name="pis" value="<?php echo "{$linha['pis']}"; ?>" class="form-control" id="pis"></input>
            </td>
            <td>
                <label for="carteira_profissional">Carteira Profissional</label><br/>
                <input type="number" name="carteira_profissional" value="<?php echo "{$linha['carteira_profissional']}"; ?>" class="form-control" id="carteira_profissional"></input>
            </td>
            <td>
                <label for="serie">Série</label><br/>
                <input type="number" name="serie" class="form-control" value="<?php echo "{$linha['serie']}"; ?>" id="serie"></input>
            </td>
        </tr>
        <tr>
            <td>	
                <label for="rg">RG</label><br/>
                <input type="text" name="rg" value="<?php echo "{$linha['rg']}"; ?>" class="form-control" id="rg"></input>
            </td>
            <td>
                <label for="data_emissao">Data da Emissão</label><br/>
                <input type="date" name="data_emissao" value="<?php echo "{$linha['data_emissao']}"; ?>" class="form-control" id="data_emissao"></input>
            </td>
            <td>
                <label for="orgao_expedidor">Orgão Expedidor</label><br/>
                <input type="number" name="orgao_expedidor" class="form-control" value="<?php echo "{$linha['orgao_expedidor']}"; ?>" id="orgao_expedidor"></input>
            </td>
            <td></td>
        <tr>
            <td>
                <label for="cpf">CPF</label><br/>
                <input type="text" name="cpf" class="form-control" value="<?php echo "{$linha['cpf']}"; ?>" id="cpf"></input>
            </td>
            <td>
                <label for="titulo_eleitor">Titulo de eleitor</label><br/>
                <input type="number" name="titulo_eleitor" class="form-control" value="<?php echo "{$linha['titulo_eleitor']}"; ?>" id="titulo_eleitor"></input>
            </td>
            <td>
                <label for="zona_eleitoral">Zona Eleitoral</label><br/>
                <input type="number" name="zona_eleitoral" class="form-control" value="<?php echo "{$linha['zona_eleitoral']}"; ?>" id="zona_eleitoral"></input>
            </td>
            <td>
                <label for="secao_eleitoral">Secão</label><br/>
                <input type="text" name="secao_eleitoral" value="<?php echo "{$linha['secao_eleitoral']}"; ?>" class="form-control" id="secao_eleitoral"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservista">Reservista</label><br/>
                <input type="text" name="reservista" value="<?php echo "{$linha['reservista']}"; ?>" class="form-control" id="reservista"></input>
            </td>
            <td colspan="2">
                <label for="categoria_reservista">Categoria</label><br/>
                <input type="text" name="categoria_reservista" value="<?php echo "{$linha['categoria_reservista']}"; ?>" class="form-control" id="categoria_reservista"></input>
            </td>
        </tr>
        <tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Dados do Coren
                </p>
            </td>
        </tr>
        <td>
            <label for="registro_coren">Registro Profissional</label><br/>
            <select name="registro_coren" class="form-control" id="registro_coren">
                <option <?=($registro_coren == '')?'selected':''?>></option>
                <option <?=($registro_coren == 'Não Possui')?'selected':''?>>Não Possui</option>
                <option <?=($registro_coren == 'Coren')?'selected':''?>>Coren</option>
            </select>
        </td>
        <td>
            <label for="numero_coren">Número do Coren</label>
            <input type="text" name="numero_coren" value="<?php echo "{$linha['numero_coren']}"; ?>" class="form-control" id="numero_coren"></input>
        </td>
        <td>
            <label for="cargo_coren">Cargo</label>
            <select name="cargo_coren" class="form-control" id="cargo_coren">
                <option <?=($cargo_coren == '')?'selected':''?>></option>
                <option <?=($cargo_coren == 'Auxiliar')?'selected':''?>>Auxiliar</option>
                <option <?=($cargo_coren == 'Técnico')?'selected':''?>>Técnico</option>
                <option <?=($cargo_coren == 'Enfermeiro')?'selected':''?>>Enfermeiro</option>
            </select>
        </td>
        <td>
            <label for="tipo_concessao">Tipo de Concessão</label>
            <select name="tipo_concessao" class="form-control" id="tipo_concessao">
                <option <?=($tipo_concessao == '')?'selected':''?>></option>
                <option <?=($tipo_concessao == 'Definitivo')?'selected':''?>>Definitivo</option>
                <option <?=($tipo_concessao == 'Provisório')?'selected':''?>>Provisório</option>
            </select>
        </td>
        <tr>
            <td>
                <label for="coren_situacao">Situação</label>
                <select name="coren_situacao" class="form-control" id="coren_situacao">
                    <option <?=($coren_situacao == '')?'selected':''?>></option>
                    <option <?=($coren_situacao == 'Ativo')?'selected':''?>>Ativo</option>
                    <option <?=($coren_situacao == 'Inativo')?'selected':''?>>Inativo</option>
                </select>
            </td>
            <td>
                <label for="incricao_coren">Data da Inscrição</label>
                <input type="date" name="incricao_coren"  value="<?php echo "{$linha['incricao_coren']}"; ?>" class="form-control" id="incricao_coren"></input>
            </td>
			<td>
			<label for="coren_data_pagamento">Data de Pagamento</label>
			<input type="date" name="coren_data_pagamento" value="<?php echo "{$linha['coren_data_pagamento']}"; ?>" class="form-control" id="coren_data_pagamento"></input>
			</td>
			<td>
			<label for="coren_validade">Validade do Coren</label>
			<input type="date" name="coren_validade" class="form-control" value="<?php echo "{$linha['coren_validade']}"; ?>" id="coren_validade"></input>
			</td>
        </tr>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Carteira de Vacinação
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label>Hepatite B</label>
            </td>
            <td>
                <input type="checkbox" <?=($primeira_dose_hepatite == '1º Dose hepatite')?'checked':''?>  value="1º Dose hepatite" name="primeira_dose_hepatite" class="checkbox-inline" id="primeira_dose_hepatite"><label for="primeira_dose_hepatite"> 1° Dose</label></input> 
                <input type="checkbox" <?=($segunda_dose_hepatite == '2º Dose hepatite')?'checked':''?> value="2º Dose hepatite" name="segunda_dose_hepatite" class="checkbox-inline" id="segunda_dose_hepatite"><label for="segunda_dose_hepatite"> 2° Dose</label></input>
                <input type="checkbox" <?=($terceira_dose_hepatite == '3º Dose hepatite')?'checked':''?> value="3º Dose hepatite" name="terceira_dose_hepatite" class="checkbox-inline" id="terceira_dose_hepatite"><label for="terceira_dose_hepatite"> 3° Dose</label></input>
            </td>
            <td><label for="validade_vacinacao">Validade</label></td>
        </tr>
        <tr>
            <td>
                <label>Dupla Adulto</label>
            </td>
            <td>
                <input type="checkbox" <?=($primeira_dose_dupla == '1º Dose Dupla')?'checked':''?> value="1º Dose Dupla" name="primeira_dose_dupla" class="checkbox-inline" id="primeira_dose_dupla"><label for="primeira_dose_dupla"> 1° Dose</label></input> 
                <input type="checkbox" <?=($segunda_dose_dupla == '2º Dose Dupla')?'checked':''?> value="2º Dose Dupla" name="segunda_dose_dupla" class="checkbox-inline" id="segunda_dose_dupla"><label for="segunda_dose_dupla"> 2° Dose</label></input>
                <input type="checkbox" <?=($terceira_dose_dupla == '3º Dose Dupla')?'checked':''?> value="3º Dose Dupla" name="terceira_dose_dupla" class="checkbox-inline" id="terceira_dose_dupla"><label for="terceira_dose_dupla"> 3° Dose</label></input>
            </td>
            <td>
                <input type="date" name="validade_vacinacao" value="<?php echo "{$linha['validade_vacinacao']}"; ?>" class="form-control" id="validade_vacinacao"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="scr_vacinacao">SCR (Sarampo, Caxumba, Rubeóla)</label>
            </td>
            <td>
                <select name="scr_vacinacao" class="form-control" id="scr_vacinacao">
                    <option <?=($scr_vacinacao == '')?'selected':''?>></option>
                    <option <?=($scr_vacinacao == 'Sim')?'selected':''?>>Sim</option>
                    <option <?=($scr_vacinacao == 'Não')?'selected':''?>>Não</option>
                </select>
            </td>
            <td>
            </td>
        </tr>
        <tr>
            <td>
                <label>Exame Médico</label>
            </td>
            <td>
                <label for="data_exame_medico">Realizado na Data</label>
                <input type="date" name="data_exame_medico" value="<?php echo "{$linha['data_exame_medico']}"; ?>" class="form-control" id="data_exame_medico"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">Dependentes</p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="nome_dependente_1">Nome</label>
                <input type="text" value="<?php echo "{$linha['nome_dependente_1']}"; ?>" name="nome_dependente_1" class="form-control" id="nome_dependente_1"></input>
            </td>
            <td>
                <label for="parentesco_dependente_1">Parentesco</label>
                <select name="parentesco_dependente_1" class="form-control" id="parentesco_dependente_1">
                    <option <?=($parentesco_dependente_1 == '')?'selected':''?>></option>
                    <option <?=($parentesco_dependente_1 == 'Filho')?'selected':''?>>Filho</option>
                    <option <?=($parentesco_dependente_1 == 'Mãe')?'selected':''?>>Mãe</option>
                    <option <?=($parentesco_dependente_1 == 'Pai')?'selected':''?>>Pai</option>
                    <option <?=($parentesco_dependente_1 == 'Esposa')?'selected':''?>>Esposa</option>
                    <option <?=($parentesco_dependente_1 == 'Marido')?'selected':''?>>Marido</option>
                    <option <?=($parentesco_dependente_1 == 'Avó')?'selected':''?>>Avó</option>
                    <option <?=($parentesco_dependente_1 == 'Avô')?'selected':''?>>Avô</option>
                    <option <?=($parentesco_dependente_1 == 'Irmão')?'selected':''?>>Irmão</option>
                    <option <?=($parentesco_dependente_1 == 'Primo')?'selected':''?>>Primo</option>
                    <option <?=($parentesco_dependente_1 == 'Tio')?'selected':''?>>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_1">Sexo</label>
                <select name="sexo_dependente_1" class="form-control" id="sexo_dependente_1">
                    <option <?=($sexo_dependente_1 == '')?'selected':''?>></option>
                    <option  <?=($sexo_dependente_1 == 'Feminino')?'selected':''?>>Feminino</option>
                    <option <?=($sexo_dependente_1 == 'Masculino')?'selected':''?>>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_1">Data de Nascimento</label>
                <input type="date" value="<?php echo "{$linha['data_nascimento_dependente_1']}"; ?>"  name="data_nascimento_dependente_1" class="form-control input_left" id="data_nascimento_dependente_1"></input>
            
			</td>
        </tr>
        <tr  id="tr_dependente_2" >
            <td>
                <label for="nome_dependente_2">Nome</label>
                <input type="text" value="<?php echo "{$linha['data_nascimento_dependente_2']}"; ?>" name="nome_dependente_2" class="form-control" id="nome_dependente_2"></input>
            </td>
            <td>
                <label for="parentesco_dependente_2">Parentesco</label>
                <select name="parentesco_dependente_2" class="form-control" id="parentesco_dependente_2">
                    <option <?=($parentesco_dependente_2 == '')?'selected':''?>></option>
                    <option <?=($parentesco_dependente_2 == 'Filho')?'selected':''?>>Filho</option>
                    <option <?=($parentesco_dependente_2 == 'Mãe')?'selected':''?>>Mãe</option>
                    <option <?=($parentesco_dependente_2 == 'Pai')?'selected':''?>>Pai</option>
                    <option <?=($parentesco_dependente_2 == 'Esposa')?'selected':''?>>Esposa</option>
                    <option <?=($parentesco_dependente_2 == 'Marido')?'selected':''?>>Marido</option>
                    <option <?=($parentesco_dependente_2 == 'Avó')?'selected':''?>>Avó</option>
                    <option <?=($parentesco_dependente_2 == 'Avô')?'selected':''?>>Avô</option>
                    <option <?=($parentesco_dependente_2 == 'Irmão')?'selected':''?>>Irmão</option>
                    <option <?=($parentesco_dependente_2 == 'Primo')?'selected':''?>>Primo</option>
                    <option <?=($parentesco_dependente_2 == 'Tio')?'selected':''?>>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_2">Sexo</label>
                <select name="sexo_dependente_2" class="form-control" id="sexo_dependente_2">
                    <option <?=($sexo_dependente_2 == '')?'selected':''?>></option>
                    <option  <?=($sexo_dependente_2 == 'Feminino')?'selected':''?>>Feminino</option>
                    <option <?=($sexo_dependente_2 == 'Masculino')?'selected':''?>>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_2">Data de Nascimento</label>
                <input type="date" value="<?php echo "{$linha['data_nascimento_dependente_2']}"; ?>" name="data_nascimento_dependente_2" class="form-control input_left" id="data_nascimento_dependente_2"></input>
            
			</td>
        </tr>
        <tr  id="tr_dependente_3">
            <td>
                <label for="nome_dependente_3">Nome</label>
                <input type="text" value="<?php echo "{$linha['nome_dependente_3']}"; ?>" name="nome_dependente_3" class="form-control" id="nome_dependente_3"></input>
            </td>
            <td>
                <label for="parentesco_dependente_3">Parentesco</label>
                <select name="parentesco_dependente_3" class="form-control" id="parentesco_dependente_3">
					<option <?=($parentesco_dependente_3 == '')?'selected':''?>></option>
                    <option <?=($parentesco_dependente_3 == 'Filho')?'selected':''?>>Filho</option>
                    <option <?=($parentesco_dependente_3 == 'Mãe')?'selected':''?>>Mãe</option>
                    <option <?=($parentesco_dependente_3 == 'Pai')?'selected':''?>>Pai</option>
                    <option <?=($parentesco_dependente_3 == 'Esposa')?'selected':''?>>Esposa</option>
                    <option <?=($parentesco_dependente_3 == 'Marido')?'selected':''?>>Marido</option>
                    <option <?=($parentesco_dependente_3 == 'Avó')?'selected':''?>>Avó</option>
                    <option <?=($parentesco_dependente_3 == 'Avô')?'selected':''?>>Avô</option>
                    <option <?=($parentesco_dependente_3 == 'Irmão')?'selected':''?>>Irmão</option>
                    <option <?=($parentesco_dependente_3 == 'Primo')?'selected':''?>>Primo</option>
                    <option <?=($parentesco_dependente_3 == 'Tio')?'selected':''?>>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_3">Sexo</label>
                <select name="sexo_dependente_3" class="form-control" id="sexo_dependente_3">
                    <option <?=($sexo_dependente_3 == '')?'selected':''?>></option>
                    <option  <?=($sexo_dependente_3 == 'Feminino')?'selected':''?>>Feminino</option>
                    <option <?=($sexo_dependente_3 == 'Masculino')?'selected':''?>>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_3">Data de Nascimento</label>
                <input type="date" value="<?php echo "{$linha['data_nascimento_dependente_3']}"; ?>" name="data_nascimento_dependente_3" class="form-control" id="data_nascimento_dependente_3"></input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Escolaridade / Formação
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="escolaridade">Escolaridade</label>
                <select name="escolaridade" class="form-control" id="escolaridade">
                    <option <?=($escolaridade == '')?'selected':''?>></option>
                    <option <?=($escolaridade == 'Fundamental')?'selected':''?>>Fundamental</option>
                    <option <?=($escolaridade == 'Médio')?'selected':''?>>Médio</option>
                    <option <?=($escolaridade == 'Técnico')?'selected':''?>>Técnico</option>
                    <option <?=($escolaridade == 'Superior')?'selected':''?>>Superior</option>
                    <option <?=($escolaridade == 'Pós-Graduação')?'selected':''?>>Pós-Graduação</option>
                    <option <?=($escolaridade == 'Mestrado')?'selected':''?>>Mestrado</option>
                    <option <?=($escolaridade == 'Doutorado')?'selected':''?>>Doutorado</option>
                </select>
            
            <td>
                <label for="curso">Curso</label>
                <input type="text" value="<?php echo "{$linha['curso']}"; ?>" name="curso" class="form-control" id="curso"></input>
            </td>
            <td>
                <label for="instituicao">Instituição</label>
                <input type="text" value="<?php echo "{$linha['instituicao']}"; ?>" name="instituicao" class="form-control" id="instituicao"></input>
            </td>
            <td>
                <label for="termino_escolaridade">Término do Curso</label>
                <input type="date" value="<?php echo "{$linha['termino_escolaridade']}"; ?>" name="termino_escolaridade" class="form-control input_left" id="termino_escolaridade"></input>
            
			</td>
        </tr>
		<tr   id="tr_escolaridade_2">
            <td>
                <label for="escolaridade_2">Escolaridade</label>
                <select name="escolaridade_2" class="form-control" id="escolaridade_2">
                    <option <?=($escolaridade_2 == '')?'selected':''?>></option>
                    <option <?=($escolaridade_2 == 'Fundamental')?'selected':''?>>Fundamental</option>
                    <option <?=($escolaridade_2 == 'Médio')?'selected':''?>>Médio</option>
                    <option <?=($escolaridade_2 == 'Técnico')?'selected':''?>>Técnico</option>
                    <option <?=($escolaridade_2 == 'Superior')?'selected':''?>>Superior</option>
                    <option <?=($escolaridade_2 == 'Pós-Graduação')?'selected':''?>>Pós-Graduação</option>
                    <option <?=($escolaridade_2 == 'Mestrado')?'selected':''?>>Mestrado</option>
                    <option <?=($escolaridade_2 == 'Doutorado')?'selected':''?>>Doutorado</option>
                </select>
            
            <td>
                <label for="curso_2">Curso</label>
                <input type="text" value="<?php echo "{$linha['curso_2']}"; ?>" name="curso_2" class="form-control" id="curso_2"></input>
            </td>
            <td>
                <label for="instituicao_2">Instituição</label>
                <input type="text" value="<?php echo "{$linha['instituicao_2']}"; ?>" name="instituicao_2" class="form-control" id="instituicao_2"></input>
            </td>
            <td>
                <label for="termino_escolaridade_2">Término do Curso</label>
                <input type="date" value="<?php echo "{$linha['termino_escolaridade_2']}"; ?>" name="termino_escolaridade_2" class="form-control input_left" id="termino_escolaridade_2"></input>
            
			</td>
        </tr>
		<tr  id="tr_escolaridade_3" >
            <td>
                <label for="escolaridade_3">Escolaridade</label>
                <select name="escolaridade_3" class="form-control" id="escolaridade_3">
                    <option <?=($escolaridade_3 == '')?'selected':''?>></option>
                    <option <?=($escolaridade_3 == 'Fundamental')?'selected':''?>>Fundamental</option>
                    <option <?=($escolaridade_3 == 'Médio')?'selected':''?>>Médio</option>
                    <option <?=($escolaridade_3 == 'Técnico')?'selected':''?>>Técnico</option>
                    <option <?=($escolaridade_3 == 'Superior')?'selected':''?>>Superior</option>
                    <option <?=($escolaridade_3 == 'Pós-Graduação')?'selected':''?>>Pós-Graduação</option>
                    <option <?=($escolaridade_3 == 'Mestrado')?'selected':''?>>Mestrado</option>
                    <option <?=($escolaridade_3 == 'Doutorado')?'selected':''?>>Doutorado</option>
                </select>
            
            <td>
                <label for="curso_3">Curso</label>
                <input type="text" value="<?php echo "{$linha['curso_3']}"; ?>" name="curso_3" class="form-control" id="curso_3"></input>
            </td>
            <td>
                <label for="instituicao_3">Instituição</label>
                <input type="text" value="<?php echo "{$linha['instituicao_3']}"; ?>" name="instituicao_3" class="form-control" id="instituicao_3"></input>
            </td>
            <td>
                <label for="termino_escolaridade_3">Término do Curso</label>
                <input type="date" value="<?php echo "{$linha['termino_escolaridade_3']}"; ?>" name="termino_escolaridade_3" class="form-control" id="termino_escolaridade_3"></input>
            
			</td>
        </tr>
		<tr>
		<td>
		    <label for="andamento_escolaridade">Andamento</label>
                <select name="andamento_escolaridade" class="form-control" id="andamento_escolaridade">
                    <option <?=($andamento_escolaridade == '')?'selected':''?>></option>
                    <option <?=($andamento_escolaridade == 'Cursando')?'selected':''?>>Cursando</option>
                    <option <?=($andamento_escolaridade == 'Completo')?'selected':''?>>Completo</option>
                    <option<?=($andamento_escolaridade == 'Incompleto')?'selected':''?>>Incompleto</option>
                </select>
				</td>
            </td>
		</tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Experiencia Profissional
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="empresa_anterior">Empresa Anterior</label>
                <input type="text" value="<?php echo "{$linha['empresa_anterior']}"; ?>" name="empresa_anterior" class="form-control" id="empresa_anterior"></input>
            </td>
            <td><label for="cargo_anterior">Cargo</label>
                <input type="text" value="<?php echo "{$linha['cargo']}"; ?>" name="cargo_anterior" class="form-control" id="cargo_anterior"></input>
            </td>
            <td>
                <label for="hora_entrada_anterior">Horario de entrada</label>
                <input type="time" value="<?php echo "{$linha['hora_entrada_anterior']}"; ?>" name="hora_entrada_anterior" class="form-control" id="hora_entrada_anterior">
                </input>
            </td>
            <td>
                <label for="hora_saida_anterior">Horario de Saída</label>
                <input type="time" value="<?php echo "{$linha['hora_saida_anterior']}"; ?>" name="hora_saida_anterior" class="form-control" id="hora_saida_anterior">
                </input>
            </td>
        </tr>
		<tr>
            <td>
                <label for="empresa_anterior_2">Empresa Anterior</label>
                <input type="text" value="<?php echo "{$linha['empresa_anterior_2']}"; ?>"  name="empresa_anterior_2" class="form-control" id="empresa_anterior_2"></input>
            </td>
            <td><label for="cargo_anterior_2">Cargo</label>
                <input type="text" value="<?php echo "{$linha['cargo_anterior_2']}"; ?>" name="cargo_anterior_2" class="form-control" id="cargo_anterior_2"></input>
            </td>
            <td>
                <label for="hora_entrada_anterior_2">Horario de entrada</label>
                <input type="time" value="<?php echo "{$linha['hora_entrada_anterior_2']}"; ?>" name="hora_entrada_anterior_2" class="form-control" id="hora_entrada_anterior_2">
                </input>
            </td>
            <td>
                <label for="hora_saida_anterior_2">Horario de Saída</label>
                <input type="time" value="<?php echo "{$linha['hora_saida_anterior_2']}"; ?>" name="hora_saida_anterior_2" class="form-control" id="hora_saida_anterior_2">
                </input>
            </td>
        </tr>
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Benefícios 
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tipo_cartao_1">Tipo do cartão</label>
                <select name="tipo_cartao_1"class="form-control" id="tipo_cartao_1">
                    <option <?=($tipo_cartao_1 == '')?'selected':''?>></option>
                    <option <?=($tipo_cartao_1 == 'Bilhete Único')?'selected':''?>>Bilhete Único</option>
                    <option <?=($tipo_cartao_1 == 'BOM')?'selected':''?>>BOM</option>
					<option <?=($tipo_cartao_1 == 'BEM')?'selected':''?>>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_1">Número do cartão</label>
                <input type="number" value="<?php echo "{$linha['numero_bilhete_1']}"; ?>" name="numero_bilhete_1" class="form-control" id="numero_bilhete_1"></input>
            </td>
            <td>
                <label for="valor_transporte_1">Valor do Transporte</label>
                <input type="number" value="<?php echo "{$linha['valor_transporte_1']}"; ?>" name="valor_transporte_1" class="form-control input_left" id="valor_transporte_1"></input>		
				
			</td>
        </tr>
		
        <tr  id="tr_cartão_2" >
            <td>
                <label for="tipo_cartao_2">Tipo do cartão</label>
                <select name="tipo_cartao_2"class="form-control" id="tipo_cartao_2">
                    <option <?=($tipo_cartao_2 == '')?'selected':''?>></option>
                    <option <?=($tipo_cartao_2 == 'Bilhete Único')?'selected':''?>>Bilhete Único</option>
                    <option <?=($tipo_cartao_2 == 'BOM')?'selected':''?>>BOM</option>
					<option <?=($tipo_cartao_2 == 'BEM')?'selected':''?>>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_2">Número do cartão</label>
                <input type="number" value="<?php echo "{$linha['numero_bilhete_2']}"; ?>" name="numero_bilhete_2" class="form-control" id="numero_bilhete_2"></input>
            </td>
            <td>
                <label for="valor_transporte_2">Valor do Transporte</label>
                <input type="number" value="<?php echo "{$linha['valor_transporte_2']}"; ?>" name="valor_transporte_2" class="form-control input_left" id="valor_transporte_2"></input>		
				
			</td>
        </tr>
		<tr  id="tr_cartão_3">
            <td>
                <label for="tipo_cartao_3">Tipo do cartão</label>
                <select name="tipo_cartao_3"class="form-control" id="tipo_cartao_3">
                    <option <?=($tipo_cartao_3 == '')?'selected':''?>></option>
                    <option <?=($tipo_cartao_3 == 'Bilhete Único')?'selected':''?>>Bilhete Único</option>
                    <option <?=($tipo_cartao_3 == 'BOM')?'selected':''?>>BOM</option>
					<option <?=($tipo_cartao_3 == 'BEM')?'selected':''?>>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_3">Número do cartão</label>
                <input type="number" value="<?php echo "{$linha['numero_bilhete_3']}"; ?>" name="numero_bilhete_3" class="form-control" id="numero_bilhete_3"></input>
            </td>
            <td>
                <label for="valor_transporte_3">Valor do Transporte</label>
                <input type="number" value="<?php echo "{$linha['valor_transporte_3']}"; ?>" name="valor_transporte_3" class="form-control" id="valor_transporte_3"></input>		
            </td>
        </tr>
        <tr>
            <td>
                <label for="tipo_banco">Banco</label>
                <input type="text" value="<?php echo "{$linha['tipo_banco']}"; ?>" name="tipo_banco" class="form-control" id="tipo_banco">
                </input>
            </td>
            <td>
                <label for="agencia">Agencia</label>
                <input type="text" value="<?php echo "{$linha['agencia']}"; ?>" name="agencia" class="form-control" id="agencia"></label>
            </td>
            <td>
                <label for="conta">Conta</label>
                <input type="text" name="conta" value="<?php echo "{$linha['conta']}"; ?>" class="form-control" id="conta"></input>
            </td>
        <tr>
            <td> <label for="vale_refeicao">Vale Refeição</label>
                <input type="number" value="<?php echo "{$linha['vale_refeicao']}"; ?>" name="vale_refeicao" class="form-control" id="vale_refeicao"></input>
            </td>
            <td>
                <label for="assistencia_medica">Assistência Médica</label>
                <input type="text" value="<?php echo "{$linha['assistencia_medica']}"; ?>" name="assistencia_medica" class="form-control" id="assistencia_medica" ></input></input>
            </td>
            <td>
                <label for="numero_convenio">Número do Convênio</label>
                <input type="number" value="<?php echo "{$linha['numero_convenio']}"; ?>" name="numero_convenio" class="form-control" id="numero_convenio"></input></input>
            </td>
        </tr>
        </tr>
        </tr>
		
		<tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Férias
                </p>
            </td>
        </tr>
		<tr>
		<td>
		<label for="periodo_aquisitivo">Periodo Aquisitivo</label>
		<input type="date" value="<?php echo "{$linha['periodo_aquisitivo']}"; ?>" name="periodo_aquisitivo" class="form-control" id="periodo_aquisitivo"></input>
		</td>
		<td>
		<label for="periodo_gozo">Periodo de Gozo</label>
		<input type="date" value="<?php echo "{$linha['periodo_gozo']}"; ?>" name="periodo_gozo" class="form-control" id="periodo_gozo"></input>
		</td>
		<td>
		<label for="valor_ferias">Valor Férias</label>
		<input type="number" value="<?php echo "{$linha['valor_ferias']}"; ?>" name="valor_ferias"  class="form-control" id="valor_ferias"></input>
		</td>
		</tr>
		
		
		
		
        <tr class="black">
            <td colspan="4">
                <p class="titulo_branco">
                    Contrato
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tipo_contrato">Tipo de Contrato</label>
                <select name="tipo_contrato" class="form-control" id="tipo_contrato">
                    <option <?=($tipo_contrato == '')?'selected':''?>></option>
                    <option <?=($tipo_contrato == 'CMI')?'selected':''?>>CMI</option>
                    <option <?=($tipo_contrato == 'VDLAP')?'selected':''?>>VDLAP</option>
                    <option <?=($tipo_contrato == 'BSCARI')?'selected':''?>>BSCARI</option>
                    <option <?=($tipo_contrato == 'Cooperativa')?'selected':''?>>Cooperativa</option>
                    <option <?=($tipo_contrato == 'Temporário')?'selected':''?>>Temporário</option>
                    <option <?=($tipo_contrato == 'Prestador de Serviços')?'selected':''?>>Prestador de Serviços</option>
                    <option <?=($tipo_contrato == 'Estágio')?'selected':''?>>Estágio</option>
                </select>
            </td>
            <td>
                <label for="data_admissao">Data de Admissão</label>
                <input type="date" value="<?php echo "{$linha['data_admissao']}"; ?>" name="data_admissao" class="form-control" id="data_admissao"></input>
            </td>
            <td>
                <label for="data_demissao">Data de Demissão</label>
                <input type="date"  value="<?php echo "{$linha['data_demissao']}"; ?>" name="data_demissao" class="form-control" id="data_demissao"></input>
            </td>
            <td>
                <label for="situacao">Situação</label>
                <select name="situacao" class="form-control" id="situacao">
                    <option <?=($situacao == '')?'selected':''?>></option>
                    <option <?=($situacao == 'Ativo')?'selected':''?>>Ativo</option>
                    <option <?=($situacao == 'Inativo')?'selected':''?>>Inativo</option>
					<option <?=($situacao == 'Licença')?'selected':''?>>Licença</option>
					<option <?=($situacao == 'Folguista')?'selected':''?>>Folguista</option>
					<option <?=($situacao == 'Férias')?'selected':''?>>Férias</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="cargo">Cargo</label>
                <select name="cargo" class="form-control" id="cargo">
                    <option <?=($cargo == '')?'selected':''?>></option>
                    <option <?=($cargo == 'Auxiliar Enfermagem')?'selected':''?>>Auxiliar Enfermagem</option>
                    <option <?=($cargo == 'Técnico de Enfermagem')?'selected':''?>>Técnico de Enfermagem</option>
                    <option <?=($cargo == 'Líder')?'selected':''?>>Líder</option>
                    <option <?=($cargo == 'Enfermeira')?'selected':''?>>Enfermeira</option>
                    <option <?=($cargo == 'Administrador de Rede')?'selected':''?>>Administrador de Rede</option>
                    <option <?=($cargo == 'Motorista')?'selected':''?>>Motorista</option>
                    <option <?=($cargo == 'Encarregado Manutenção')?'selected':''?>>Encarregado Manutenção</option>
                    <option <?=($cargo == 'Auxiliar de Serviços Gerais')?'selected':''?>>Auxiliar de Serviços Gerais</option>
                    <option <?=($cargo == 'Assistente de Departamento Pessoal')?'selected':''?>>Assistente de Departamento Pessoal</option>
                    <option <?=($cargo == 'Trainne')?'selected':''?>>Trainne</option>
                    <option <?=($cargo == 'Mecânico de Manutenção')?'selected':''?>>Mecânico de Manutenção</option>
                    <option <?=($cargo == 'Auxiliar Técnico de Manutenção')?'selected':''?>>Auxiliar Técnico de Manutenção</option>
                    <option <?=($cargo == 'Auxiliar Administrativo')?'selected':''?>>Auxiliar Administrativo</option>
                    <option <?=($cargo == 'Encarregado')?'selected':''?>>Encarregado</option>
                    <option <?=($cargo == 'Técnico de Informática')?'selected':''?>>Técnico de Informática</option>
                </select>
            </td>
            <td>
                <label for="nivel_hierarquico">Nível Hierárquico</label>
                <select name="nivel_hierarquico" class="form-control" id="nivel_hierarquico">
                    <option <?=($nivel_hierarquico == '')?'selected':''?>></option>
                    <option <?=($nivel_hierarquico == 'I')?'selected':''?>>I</option>
                    <option <?=($nivel_hierarquico == 'II')?'selected':''?>>II</option>
                    <option <?=($nivel_hierarquico == 'III')?'selected':''?>>III</option>
                </select>
            </td>
            <td>
                <label for="funcao">Função</label>
                <select name="funcao" class="form-control" id="funcao">
                    <option <?=($funcao == '')?'selected':''?>></option>
                    <option <?=($funcao == 'Técnico de Video Cirurgia')?'selected':''?>>Técnico de Video Cirurgia</option>
                    <option <?=($funcao == 'Administrativo')?'selected':''?>>Administrativo</option>
                </select>
            </td>
            <td>
                <label for="unidade">Unidade</label>
                <select name="unidade" class="form-control" id="unidade">
                    <option <?=($unidade == '')?'selected':''?> ></option>
                    <option <?=($unidade == 'Hospital São Luiz Itaim')?'selected':''?>>Hospital São Luiz Itaim</option>
                    <option <?=($unidade == 'Hospital São Luiz Morumbi')?'selected':''?>>Hospital São Luiz Morumbi</option>
                    <option <?=($unidade == 'Hospital São Luiz Anália Franco')?'selected':''?>>Hospital São Luiz Anália Franco</option>
                    <option <?=($unidade == 'Hospital São Luiz Jabaquara')?'selected':''?>>Hospital São Luiz Jabaquara</option>
                    <option <?=($unidade == 'Hospital Santa Paula')?'selected':''?>>Hospital Santa Paula</option>
                    <option <?=($unidade == 'Hospital Santa Paula')?'selected':''?>>Hospital Santa Paula</option>
                    <option <?=($unidade == 'Hospital São Luiz Anália Franco')?'selected':''?>>Hospital São Luiz Anália Franco</option>
                    <option <?=($unidade == 'Hospital Edmundo Vasconcelos')?'selected':''?>>Hospital Edmundo Vasconcelos</option>
                    <option <?=($unidade == 'Administração')?'selected':''?>>Administração</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="salario">Salário</label>
                <input type="number" value="<?php echo "{$linha['salario']}"; ?>" name="salario" class="form-control" id="salario"></input>
            </td>
            <td>
                <label for="horas_trabalhadas">Horas Trabalhadas</label>
                <input type="number" value="<?php echo "{$linha['horas_trabalhadas']}"; ?>" name="horas_trabalhadas" class="form-control" id="horas_trabalhadas"></input>
            </td>
            <td>
                <label for="salario_hora">Salário por Hora</label>
                <input type="number" value="<?php echo "{$linha['salario_hora']}"; ?>" name="salario_hora" class="form-control" id="salario_hora"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="horario_entrada">Horario de Entrada</label>
                <input type="time" value="<?php echo "{$linha['horario_entrada']}"; ?>" name="horario_entrada" class="form-control" id="horario_entrada"></input>
            </td>
            <td>
                <label for="horario_saida">Horario de Saida</label>
                <input type="time" value="<?php echo "{$linha['horario_saida']}"; ?>" name="horario_saida" class="form-control" id="horario_saida"></input>
            </td>
            <td>
                <label for="carga_horaria">Carga Horaria</label>
                <select name="carga_horaria" class="form-control" id="carga_horaria">
                    <option <?=($carga_horaria == '')?'selected':''?>></option>
                    <option <?=($carga_horaria == '6')?'selected':''?>>6</option>
                    <option <?=($carga_horaria == '8')?'selected':''?>>8</option>
                    <option <?=($carga_horaria == '12/36')?'selected':''?>>12/36</option>
            </td>
            </select>
        <tr>
            <td></td>
        </tr>
        </tr>
        <tr>
            <td>
                <input type="submit" class="form-control submit" value="Atualizar"></input>
            </td>
            <td>
            </td>
        </tr>
    </table>
</div>
</div>
