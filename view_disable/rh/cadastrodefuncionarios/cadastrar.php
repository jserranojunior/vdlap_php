

<?php 
    /*
    Template Name: Cadastro de funcionarios
    */
        include "$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/header.php";
		include ("js.php");  
    ?>
<a href="/vdlap/header.php"></a>

	
<?php  /* Corpo do site */ ?>

<p class="titulo_pure_black"> Ficha cadastral dos funcionários</p>
    <table border="1" class="table table-condensed table-bordered">
        <form action="../../../../_aplication/model/rh/cadastrodefuncionarios/insert.php" method="post" class="form-inline" id="enviar_form" enctype="multipart/form-data">
       
        
		
		
		<td rowspan=6 id="menor">
                <span class="foto_funcionario">
                <label for="enviar_foto">
                <img id="mini_foto_new" class="mini_foto" src="../../../../_dados/img/fotos_funcionarios/icone_cadastro_funcionario.png" />
                </label>
                <input id="enviar_foto" class="form-control" name="enviar_foto" type="file" onchange="readURL(this,'mini_foto_new');"  />
                </span>
            </td> 
		
		
         
        
		
			<tr>
			
			<td colspan="1"> 
                <label for="matricula">Matrícula</label>
                <input type="text" name="matricula" class="form-control" id="matricula"></input>
            </td>
            <td colspan="2">
                <label for="nome">Nome Completo</label>
                <input type="text" name="nome" class="form-control" id="nome"></input>
            </td>
           </tr>
         
			<tr>
			<td>
                <label for="datanascimento">Data de Nascimento</label><br/>
                <input type="date" name="datanascimento" class="form-control" id="datanascimento"></input>
            </td>
			 <td>
                <label for="sexo">Sexo</label><br/>
                <select name="sexo" class="form-control" id="sexo" >
                    <option></option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                </select>
            </td>
			<td>
                <label for="estado_civil">Estado Civil</label><br/>
                <select name="estado_civil" class="form-control" id="estado_civil">
                    <option></option>
                    <option>Solteiro</option>
                    <option>Casado</option>
                    <option>Separado</option>
                    <option>Divorciado</option>
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
                <input type="text" name="cep" value="" class="form-control" id="cep"></input>
            </td>
            <td>
                <label for="bairro">Bairro</label><br/>
                <input type="text" name="bairro" class="form-control" id="bairro"></input>
            </td>
            
            <td>
                <label for="cidade">Cidade</label><br/>
                <input type="text" name="cidade" value="" class="form-control" id="cidade"></input>
            </td>
            
        </tr>
		 <tr>
            <td colspan="2">
                <label for="endereco">Endereço</label><br/>
                <input type="text" value="" name="endereco" class="form-control" id="endereco"></input>
            </td>
            <td>
                <label for="numero">N°</label><br/>
                <input type="number" name="numero" class="form-control" id="numero"></input>
            
        </tr>
        <tr>
            
            <td>
                <label for="nacionalidade">Nacionalidade</label><br/>
                <input type="text" name="nacionalidade" class="form-control" id="nacionalidade"></input>
            </td>
            <td>
                <label for="naturalidade">Naturalidade (Cidade)</label><br/>
                <input type="text" name="naturalidade" class="form-control" id="naturalidade"></input>
            </td>
			<td>
                <label for="uf">UF</label><br/>
                <input type="text" name="uf" class="form-control" id="uf"></input>
            </td>
            <td>
                <label for="complemento">Complemento</label><br/>
                <input type="text" name="complemento" class="form-control" id="complemento"></input>
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
                <input type="text" name="nome_conjuge" class="form-control" id="nome_conjuge"></input>
            </td>
            <td>
                <label for="data_nascimento_conjuge">Data de Nascimento Cônjuge</label>
                <input type="date" name="data_nascimento_conjuge" class="form-control" id="data_nascimento_conjuge"></input>
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
                <input type="text" name="nome_mae" class="form-control" id="nome_mae"></input>
            </td>
            <td  colspan="2">
                <label for="nome_pai">Nome do pai</label>
                <input type="text" name="nome_pai" class="form-control" id="nome_pai"></input>
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
                    <option></option>
                    <option>Telefone</option>
                    <option>Celular</option>
                    <option>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_telefone">DDD</label><br/>
                <input type="text" name="ddd_telefone" size="2" class="form-control" id="ddd_telefone"></input>
            </td>
            <td>
                <label for="telefone">Telefone</label><br/>
                <input type="tel" name="telefone" class="form-control" id="telefone"></input>
            </td>
            <td>
                <label for="obs_contato">Observações</label><br/>
                <input type="text" name="obs_contato" class="form-control input_left" id="obs_contato"></input>
				<div id="btn_tipo_telefone_2" onclick="btn_tipo_telefone_2();"><button type="button" class="btn"> + </button></div>
            </td>
        </tr>
		<tr style="display:none" id="tr_tipo_telefone_2">
            <td>
                <label for="tipo_telefone_2">Tipo de contato</label><br/>
                <select name="tipo_telefone_2" class="form-control" id="tipo_telefone_2">
                    <option></option>
                    <option>Telefone</option>
                    <option>Celular</option>
                    <option>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_telefone_2">DDD</label><br/>
                <input type="text" name="ddd_telefone_2" size="2" class="form-control" id="ddd_telefone_2"></input>
            </td>
            <td>
                <label for="telefone_2">Telefone</label><br/>
                <input type="tel" name="telefone_2" class="form-control" id="telefone_2"></input>
            </td>
            <td>
                <label for="obs_contato_2">Observações</label><br/>
                <input type="text" name="obs_contato_2" class="form-control input_left" id="obs_contato_2"></input>
				<div id="btn_tipo_telefone_3" onclick="btn_tipo_telefone_3();"><button type="button" class="btn"> + </button></div>
 
            </td>
        </tr>
        <tr style="display:none" id="tr_tipo_telefone_3" >
            <td>
                <label for="tipo_contato_celular">Tipo de contato</label><br/>
                <select name="tipo_contato_celular" class="form-control" id="tipo_contato_celular">
                    <option></option>
                    <option>Celular</option>
                    <option>Telefone</option>
                    <option>Urgencia</option>
                </select>
            </td>
            <td>
                <label for="ddd_celular">DDD</label><br/>
                <input type="text" name="ddd_celular" size="2" class="form-control" id="ddd_celular"></input>
            </td>
            <td>
                <label for="celular">Telefone</label><br/>
                <input type="tel" name="celular" class="form-control" id="celular"></input>
            </td>
            <td>
                <label for="operadora">Operadora</label><br/>
                <input type="text" name="operadora" class="form-control" id="operadora"></input>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <label for="email">E-mail</label><br/>
                <input type="email" name="email" class="form-control" id="email"></input>
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
                <input type="number" name="pis" class="form-control" id="pis"></input>
            </td>
            <td>
                <label for="carteira_profissional">Carteira Profissional</label><br/>
                <input type="number" name="carteira_profissional" class="form-control" id="carteira_profissional"></input>
            </td>
            <td>
                <label for="serie">Série</label><br/>
                <input type="number" name="serie" class="form-control" id="serie"></input>
            </td>
        </tr>
        <tr>
            <td>	
                <label for="rg">RG</label><br/>
                <input type="number" name="rg" class="form-control" id="rg"></input>
            </td>
            <td>
                <label for="data_emissao">Data da Emissão</label><br/>
                <input type="date" name="data_emissao" class="form-control" id="data_emissao"></input>
            </td>
            <td>
                <label for="orgao_expedidor">Orgão Expedidor</label><br/>
                <input type="number" name="orgao_expedidor" class="form-control" id="orgao_expedidor"></input>
            </td>
            <td></td>
        <tr>
            <td>
                <label for="cpf">CPF</label><br/>
                <input type="number" name="cpf" class="form-control" id="cpf"></input>
            </td>
            <td>
                <label for="titulo_eleitor">Titulo de eleitor</label><br/>
                <input type="number" name="titulo_eleitor" class="form-control" id="titulo_eleitor"></input>
            </td>
            <td>
                <label for="zona_eleitoral">Zona Eleitoral</label><br/>
                <input type="number" name="zona_eleitoral" class="form-control" id="zona_eleitoral"></input>
            </td>
            <td>
                <label for="secao_eleitoral">Secão</label><br/>
                <input type="text" name="secao_eleitoral" class="form-control" id="secao_eleitoral"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="reservista">Reservista</label><br/>
                <input type="text" name="reservista" class="form-control" id="reservista"></input>
            </td>
            <td colspan="2">
                <label for="categoria_reservista">Categoria</label><br/>
                <input type="text" name="categoria_reservista" class="form-control" id="categoria_reservista"></input>
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
                <option></option>
                <option>Não Possui</option>
                <option>Coren</option>
            </select>
        </td>
        <td>
            <label for="numero_coren">Número do Coren</label>
            <input type="number" name="numero_coren" class="form-control" id="numero_coren"></input>
        </td>
        <td>
            <label for="cargo_coren">Cargo</label>
            <select name="cargo_coren" class="form-control" id="cargo_coren">
                <option selected></option>
                <option>Auxiliar</option>
                <option>Técnico</option>
                <option>Enfermeiro</option>
            </select>
        </td>
        <td>
            <label for="tipo_concessao">Tipo de Concessão</label>
            <select name="tipo_concessao" class="form-control" id="tipo_concessao">
                <option selected></option>
                <option>Definitivo</option>
                <option>Provisório</option>
            </select>
        </td>
        <tr>
            <td>
                <label for="coren_situacao">Situação</label>
                <select name="coren_situacao" class="form-control" id="coren_situacao">
                    <option selected></option>
                    <option>Ativo</option>
                    <option>Inativo</option>
                </select>
            </td>
            <td>
                <label for="incricao_coren">Data da Inscrição</label>
                <input type="date" name="incricao_coren" class="form-control" id="incricao_coren"></input>
            </td>
			<td>
			<label for="coren_data_pagamento">Data de Pagamento</label>
			<input type="date" name="coren_data_pagamento" class="form-control" id="coren_data_pagamento"></input>
			</td>
			<td>
			<label for="coren_validade">Validade do Coren</label>
			<input type="date" name="coren_validade" class="form-control" id="coren_validade"></input>
			</td>
        </tr>
        </tr>
        <tr class="marron">
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
                <input type="checkbox" value="1º Dose hepatite" name="primeira_dose_hepatite" class="checkbox-inline" id="primeira_dose_hepatite"><label for="primeira_dose_hepatite"> 1° Dose</label></input> 
                <input type="checkbox" value="2º Dose hepatite" name="segunda_dose_hepatite" class="checkbox-inline" id="segunda_dose_hepatite"><label for="segunda_dose_hepatite"> 2° Dose</label></input>
                <input type="checkbox" value="3º Dose hepatite" name="terceira_dose_hepatite" class="checkbox-inline" id="terceira_dose_hepatite"><label for="terceira_dose_hepatite"> 3° Dose</label></input>
            </td>
            <td><label for="validade_vacinacao">Validade</label></td>
        </tr>
        <tr>
            <td>
                <label>Dupla Adulto</label>
            </td>
            <td>
                <input type="checkbox" value="1º Dose Dupla" name="primeira_dose_dupla" class="checkbox-inline" id="primeira_dose_dupla"><label for="primeira_dose_dupla"> 1° Dose</label></input> 
                <input type="checkbox" value="2º Dose Dupla" name="segunda_dose_dupla" class="checkbox-inline" id="segunda_dose_dupla"><label for="segunda_dose_dupla"> 2° Dose</label></input>
                <input type="checkbox" value="3º Dose Dupla" name="terceira_dose_dupla" class="checkbox-inline" id="terceira_dose_dupla"><label for="terceira_dose_dupla"> 3° Dose</label></input>
            </td>
            <td>
                <input type="date" name="validade_vacinacao" class="form-control" id="validade_vacinacao"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="scr_vacinacao">SCR (Sarampo, Caxumba, Rubeóla)</label>
            </td>
            <td>
                <select name="scr_vacinacao" class="form-control" id="scr_vacinacao">
                    <option></option>
                    <option>Sim</option>
                    <option>Não</option>
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
                <input type="date" name="data_exame_medico" class="form-control" id="data_exame_medico"></input>
            </td>
        </tr>
        <tr class="marron">
            <td colspan="4">
                <p class="titulo_branco">Dependentes</p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="nome_dependente_1">Nome</label>
                <input type="text" name="nome_dependente_1" class="form-control" id="nome_dependente_1"></input>
            </td>
            <td>
                <label for="parentesco_dependente_1">Parentesco</label>
                <select name="parentesco_dependente_1" class="form-control" id="parentesco_dependente_1">
                    <option></option>
                    <option>Filho</option>
                    <option>Mãe</option>
                    <option>Pai</option>
                    <option>Esposa</option>
                    <option>Marido</option>
                    <option>Avó</option>
                    <option>Avô</option>
                    <option>Irmão</option>
                    <option>Primo</option>
                    <option>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_1">Sexo</label>
                <select name="sexo_dependente_1" class="form-control" id="sexo_dependente_1">
                    <option></option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_1">Data de Nascimento</label>
                <input type="date" name="data_nascimento_dependente_1" class="form-control input_left" id="data_nascimento_dependente_1"></input>
            <div id="btn_dependente_2" onclick="btn_dependente_2();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
        <tr style="display:none" id="tr_dependente_2" >
            <td>
                <label for="nome_dependente_2">Nome</label>
                <input type="text" name="nome_dependente_2" class="form-control" id="nome_dependente_2"></input>
            </td>
            <td>
                <label for="parentesco_dependente_2">Parentesco</label>
                <select name="parentesco_dependente_2" class="form-control" id="parentesco_dependente_2">
                    <option></option>
                    <option>Filho</option>
                    <option>Mãe</option>
                    <option>Pai</option>
                    <option>Esposa</option>
                    <option>Marido</option>
                    <option>Avó</option>
                    <option>Avô</option>
                    <option>Irmão</option>
                    <option>Primo</option>
                    <option>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_2">Sexo</label>
                <select name="sexo_dependente_2" class="form-control" id="sexo_dependente_2">
                    <option></option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_2">Data de Nascimento</label>
                <input type="date" name="data_nascimento_dependente_2" class="form-control input_left" id="data_nascimento_dependente_2"></input>
            <div id="btn_dependente_3" onclick="btn_dependente_3();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
        <tr style="display:none" id="tr_dependente_3">
            <td>
                <label for="nome_dependente_3">Nome</label>
                <input type="text" name="nome_dependente_3" class="form-control" id="nome_dependente_3"></input>
            </td>
            <td>
                <label for="parentesco_dependente_3">Parentesco</label>
                <select name="parentesco_dependente_3" class="form-control" id="parentesco_dependente_3">
                    <option></option>
                    <option>Filho</option>
                    <option>Mãe</option>
                    <option>Pai</option>
                    <option>Esposa</option>
                    <option>Marido</option>
                    <option>Avó</option>
                    <option>Avô</option>
                    <option>Irmão</option>
                    <option>Primo</option>
                    <option>Tio</option>
                </select>
            </td>
            <td>
                <label for="sexo_dependente_3">Sexo</label>
                <select name="sexo_dependente_3" class="form-control" id="sexo_dependente_3">
                    <option></option>
                    <option>Feminino</option>
                    <option>Masculino</option>
                </select>
            </td>
            <td>
                <label for="data_nascimento_dependente_3">Data de Nascimento</label>
                <input type="date" name="data_nascimento_dependente_3" class="form-control" id="data_nascimento_dependente_3"></input>
            </td>
        </tr>
        <tr class="marron">
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
                    <option></option>
                    <option>Fundamental</option>
                    <option>Médio</option>
                    <option>Técnico</option>
                    <option>Superior</option>
                    <option>Pós-Graduação</option>
                    <option>Mestrado</option>
                    <option>Doutorado</option>
                </select>
            
            <td>
                <label for="curso">Curso</label>
                <input type="text" name="curso" class="form-control" id="curso"></input>
            </td>
            <td>
                <label for="instituicao">Instituição</label>
                <input type="text" name="instituicao" class="form-control" id="instituicao"></input>
            </td>
            <td>
                <label for="termino_escolaridade">Término do Curso</label>
                <input type="date" name="termino_escolaridade" class="form-control input_left" id="termino_escolaridade"></input>
            <div id="btn_escolaridade_2" onclick="btn_escolaridade_2();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
		<tr  style="display:none" id="tr_escolaridade_2">
            <td>
                <label for="escolaridade_2">Escolaridade</label>
                <select name="escolaridade_2" class="form-control" id="escolaridade_2">
                    <option></option>
                    <option>Fundamental</option>
                    <option>Médio</option>
                    <option>Técnico</option>
                    <option>Superior</option>
                    <option>Pós-Graduação</option>
                    <option>Mestrado</option>
                    <option>Doutorado</option>
                </select>
            
            <td>
                <label for="curso_2">Curso</label>
                <input type="text" name="curso_2" class="form-control" id="curso_2"></input>
            </td>
            <td>
                <label for="instituicao_2">Instituição</label>
                <input type="text" name="instituicao_2" class="form-control" id="instituicao_2"></input>
            </td>
            <td>
                <label for="termino_escolaridade_2">Término do Curso</label>
                <input type="date" name="termino_escolaridade_2" class="form-control input_left" id="termino_escolaridade_2"></input>
            <div id="btn_escolaridade_3" onclick="btn_escolaridade_3();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
		<tr style="display:none" id="tr_escolaridade_3" >
            <td>
                <label for="escolaridade_3">Escolaridade</label>
                <select name="escolaridade_3" class="form-control" id="escolaridade_3">
                    <option></option>
                    <option>Fundamental</option>
                    <option>Médio</option>
                    <option>Técnico</option>
                    <option>Superior</option>
                    <option>Pós-Graduação</option>
                    <option>Mestrado</option>
                    <option>Doutorado</option>
                </select>
            
            <td>
                <label for="curso_3">Curso</label>
                <input type="text" name="curso_3" class="form-control" id="curso_3"></input>
            </td>
            <td>
                <label for="instituicao_3">Instituição</label>
                <input type="text" name="instituicao_3" class="form-control" id="instituicao_3"></input>
            </td>
            <td>
                <label for="termino_escolaridade_3">Término do Curso</label>
                <input type="date" name="termino_escolaridade_3" class="form-control" id="termino_escolaridade_3"></input>
            
			</td>
        </tr>
		<tr>
		<td>
		    <label for="andamento_escolaridade">Andamento</label>
                <select name="andamento_escolaridade" class="form-control" id="andamento_escolaridade">
                    <option></option>
                    <option>Cursando</option>
                    <option>Completo</option>
                    <option>Incompleto</option>
                </select>
				</td>
            </td>
		</tr>
        <tr class="marron">
            <td colspan="4">
                <p class="titulo_branco">
                    Experiencia Profissional
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <label for="empresa_anterior">Empresa Anterior</label>
                <input type="text" name="empresa_anterior" class="form-control" id="empresa_anterior"></input>
            </td>
            <td><label for="cargo_anterior">Cargo</label>
                <input type="text" name="cargo_anterior" class="form-control" id="cargo_anterior"></input>
            </td>
            <td>
                <label for="hora_entrada_anterior">Horario de entrada</label>
                <input type="time" name="hora_entrada_anterior" class="form-control" id="hora_entrada_anterior">
                </input>
            </td>
            <td>
                <label for="hora_saida_anterior">Horario de Saída</label>
                <input type="time" name="hora_saida_anterior" class="form-control" id="hora_saida_anterior">
                </input>
            </td>
        </tr>
		<tr>
            <td>
                <label for="empresa_anterior_2">Empresa Anterior</label>
                <input type="text" name="empresa_anterior_2" class="form-control" id="empresa_anterior_2"></input>
            </td>
            <td><label for="cargo_anterior_2">Cargo</label>
                <input type="text" name="cargo_anterior_2" class="form-control" id="cargo_anterior_2"></input>
            </td>
            <td>
                <label for="hora_entrada_anterior_2">Horario de entrada</label>
                <input type="time" name="hora_entrada_anterior_2" class="form-control" id="hora_entrada_anterior_2">
                </input>
            </td>
            <td>
                <label for="hora_saida_anterior_2">Horario de Saída</label>
                <input type="time" name="hora_saida_anterior_2" class="form-control" id="hora_saida_anterior_2">
                </input>
            </td>
        </tr>
        <tr class="marron">
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
                    <option></option>
                    <option>Bilhete Único</option>
                    <option>BOM</option>
					<option>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_1">Número do cartão</label>
                <input type="number" name="numero_bilhete_1" class="form-control" id="numero_bilhete_1"></input>
            </td>
            <td>
                <label for="valor_transporte_1">Valor do Transporte</label>
                <input type="number" name="valor_transporte_1" class="form-control input_left" id="valor_transporte_1"></input>		
				<div id="btn_cartão_2" onclick="btn_cartão_2();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
		
        <tr style="display:none" id="tr_cartão_2" >
            <td>
                <label for="tipo_cartao_2">Tipo do cartão</label>
                <select name="tipo_cartao_2"class="form-control" id="tipo_cartao_2">
                    <option></option>
                    <option>Bilhete Único</option>
                    <option>BOM</option>
					<option>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_2">Número do cartão</label>
                <input type="number" name="numero_bilhete_2" class="form-control" id="numero_bilhete_2"></input>
            </td>
            <td>
                <label for="valor_transporte_2">Valor do Transporte</label>
                <input type="number" name="valor_transporte_2" class="form-control input_left" id="valor_transporte_2"></input>		
				<div id="btn_cartão_3" onclick="btn_cartão_3();"><button type="button" class="btn"> + </button></div>
 
			</td>
        </tr>
		<tr style="display:none" id="tr_cartão_3">
            <td>
                <label for="tipo_cartao_3">Tipo do cartão</label>
                <select name="tipo_cartao_3"class="form-control" id="tipo_cartao_3">
                    <option></option>
                    <option>Bilhete Único</option>
                    <option>BOM</option>
					<option>BEM</option> 
                </select>
            </td>
            <td>
                <label for="numero_bilhete_3">Número do cartão</label>
                <input type="number" name="numero_bilhete_3" class="form-control" id="numero_bilhete_3"></input>
            </td>
            <td>
                <label for="valor_transporte_3">Valor do Transporte</label>
                <input type="number" name="valor_transporte_3" class="form-control" id="valor_transporte_3"></input>		
            </td>
        </tr>
        <tr>
            <td>
                <label for="tipo_banco">Banco</label>
                <input type="text" name="tipo_banco" class="form-control" id="tipo_banco">
                </input>
            </td>
            <td>
                <label for="agencia">Agencia</label>
                <input type="text" name="agencia" class="form-control" id="agencia"></label>
            </td>
            <td>
                <label for="conta">Conta</label>
                <input type="text" name="conta" class="form-control" id="conta"></input>
            </td>
        <tr>
            <td> <label for="vale_refeicao">Vale Refeição</label>
                <input type="number" name="vale_refeicao" class="form-control" id="vale_refeicao"></input>
            </td>
            <td>
                <label for="assistencia_medica">Assistência Médica</label>
                <input type="text" name="assistencia_medica" class="form-control" id="assistencia_medica" ></input></input>
            </td>
            <td>
                <label for="numero_convenio">Número do Convênio</label>
                <input type="number" name="numero_convenio" class="form-control" id="numero_convenio"></input></input>
            </td>
        </tr>
        </tr>
        </tr>
		
		<tr class="marron">
            <td colspan="4">
                <p class="titulo_branco">
                    Férias
                </p>
            </td>
        </tr>
		<tr>
		<td>
		<label for="periodo_aquisitivo">Periodo Aquisitivo</label>
		<input type="date" name="periodo_aquisitivo" class="form-control" id="periodo_aquisitivo"></input>
		</td>
		<td>
		<label for="periodo_gozo">Periodo de Gozo</label>
		<input type="date" name="periodo_gozo" class="form-control" id="periodo_gozo"></input>
		</td>
		<td>
		<label for="valor_ferias">Valor Férias</label>
		<input type="number" name="valor_ferias" class="form-control" id="valor_ferias"></input>
		</td>
		</tr>
		
		
		
		
        <tr class="marron">
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
                    <option></option>
                    <option>CMI</option>
                    <option>VDLAP</option>
                    <option>BSCARI</option>
                    <option>Cooperativa</option>
                    <option>Temporário</option>
                    <option>Prestador de Serviços</option>
                    <option>Estágio</option>
                </select>
            </td>
            <td>
                <label for="data_admissao">Data de Admissão</label>
                <input type="date" name="data_admissao" class="form-control" id="data_admissao"></input>
            </td>
            <td>
                <label for="data_demissao">Data de Demissão</label>
                <input type="date" name="data_demissao" class="form-control" id="data_demissao"></input>
            </td>
            <td>
                <label for="situacao">Situação</label>
                <select name="situacao" class="form-control" id="situacao">
                    <option></option>
                    <option>Ativo</option>
                    <option>Inativo</option>
					<option>Licença</option>
					<option>Folguista</option>
					<option>Férias</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="cargo">Cargo</label>
                <select name="cargo" class="form-control" id="cargo">
                    <option></option>
                    <option>Auxiliar Enfermagem</option>
                    <option>Técnico de Enfermagem</option>
                    <option>Líder</option>
                    <option>Enfermeira</option>
                    <option>Administrador de Rede</option>
                    <option>Motorista</option>
                    <option>Encarregado Manutenção</option>
                    <option>Auxiliar de Serviços Gerais</option>
                    <option>Assistente de Departamento Pessoal</option>
                    <option>Trainne</option>
                    <option>Mecânico de Manutenção</option>
                    <option>Auxiliar Técnico de Manutenção</option>
                    <option>Auxiliar Administrativo</option>
                    <option>Encarregado</option>
                    <option>Técnico de Informática</option>
                </select>
            </td>
            <td>
                <label for="nivel_hierarquico">Nível Hierárquico</label>
                <select name="nivel_hierarquico" class="form-control" id="nivel_hierarquico">
                    <option></option>
                    <option>I</option>
                    <option>II</option>
                    <option>III</option>
                </select>
            </td>
            <td>
                <label for="funcao">Função</label>
                <select name="funcao" class="form-control" id="funcao">
                    <option></option>
                    <option>Técnico de Video Cirurgia</option>
                    <option>Administrativo</option>
                </select>
            </td>
            <td>
                <label for="unidade">Unidade</label>
                <select name="unidade" class="form-control" id="unidade">
                    <option></option>
                    <option>Hospital São Luiz Itaim</option>
                    <option>Hospital São Luiz Morumbi</option>
                    <option>Hospital São Luiz Anália Franco</option>
                    <option>Hospital São Luiz Jabaquara</option>
                    <option>Hospital Santa Paula</option>
                    <option>Hospital Santa Paula</option>
                    <option>Hospital São Luiz Anália Franco</option>
                    <option>Hospital Edmundo Vasconcelos</option>
                    <option>Administração</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="salario">Salário</label>
                <input type="number" name="salario" class="form-control" id="salario"></input>
            </td>
            <td>
                <label for="horas_trabalhadas">Horas Trabalhadas</label>
                <input type="number" name="horas_trabalhadas" class="form-control" id="horas_trabalhadas"></input>
            </td>
            <td>
                <label for="salario_hora">Salário por Hora</label>
                <input type="number" name="salario_hora" class="form-control" id="salario_hora"></input>
            </td>
        </tr>
        <tr>
            <td>
                <label for="horario_entrada">Horario de Entrada</label>
                <input type="time" name="horario_entrada" class="form-control" id="horario_entrada"></input>
            </td>
            <td>
                <label for="horario_saida">Horario de Saida</label>
                <input type="time" name="horario_saida" class="form-control" id="horario_saida"></input>
            </td>
            <td>
                <label for="carga_horaria">Carga Horaria</label>
                <select name="carga_horaria" class="form-control" id="carga_horaria">
                    <option></option>
                    <option>6</option>
                    <option>8</option>
                    <option>12/36</option>
            </td>
            </select>
        <tr>
            <td></td>
        </tr>
        </tr>
        <tr>
            <td>
                <input type="submit" class="form-control submit" value="Enviar"></input>
            </td>
            <td>
            </td>
        </tr>
    </table>
</div>
</div>
<div id="retorno"></div>