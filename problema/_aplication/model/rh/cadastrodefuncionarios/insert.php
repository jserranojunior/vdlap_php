<?php 



require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 






/******
 * Upload de imagens
 ******/
 
// verifica se foi enviado um arquivo
if ( isset( $_FILES[ 'enviar_foto' ][ 'name' ] ) && $_FILES[ 'enviar_foto' ][ 'error' ] == 0 ) {
    echo 'Você enviou o enviar_foto: <strong>' . $_FILES[ 'enviar_foto' ][ 'name' ] . '</strong><br />';
    echo 'Este enviar_foto é do tipo: <strong > ' . $_FILES[ 'enviar_foto' ][ 'type' ] . ' </strong ><br />';
    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'enviar_foto' ][ 'tmp_name' ] . '</strong><br />';
    echo 'Seu tamanho é: <strong>' . $_FILES[ 'enviar_foto' ][ 'size' ] . '</strong> Bytes<br /><br />';
 
    $arquivo_tmp = $_FILES[ 'enviar_foto' ][ 'tmp_name' ];
    $nome = $_FILES[ 'enviar_foto' ][ 'name' ];
 
    // Pega a extensao
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensao para mimusculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfilero as extesões permitidas e separo por ';'
    // Isso server apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . "." . $extensao; 
		$inicio = $_SERVER[DOCUMENT_ROOT];
        // Concatena a pasta com o nome
        $destino = $inicio . '/vdlap/img/fotos_funcionarios/' . $novoNome;
 
        // tenta mover o arquivo para o destino
        if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {
            echo '<br /> Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" /><br />';
        }
        else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br /><br />';
    }
    else
        echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png*"<br />';
}
else {
    echo 'Você não enviou nenhum arquivo!';

}





/* Array com as colunas da tabela */ 
$colunas_tabela = array(
"matricula"			            =>"matricula",
"nome"			                =>"nome",
"sexo "			                =>"sexo",
"endereco"			            =>"endereco",
"numero"			            =>"numero",
"complemento"			        =>"complemento",
"bairro"			            =>"bairro",
"cep"			                =>"cep",
"cidade"			            =>"cidade",
"uf"			                =>"uf",
"datanascimento"			    =>"datanascimento",
"nacionalidade"			        =>"nacionalidade",
"naturalidade"			        =>"naturalidade",
"estado_civil"			        =>"estado_civil",
"nome_conjuge"			        =>"nome_conjuge",
"data_nascimento_conjuge"		=>"data_nascimento_conjuge",
"nome_mae"			            =>"nome_mae",
"nome_pai"			            =>"nome_pai",
"tipo_telefone"			        =>"tipo_telefone",
"ddd_telefone"			        =>"ddd_telefone",
"telefone"						=>"telefone", 				
"obs_contato"			        =>"obs_contato",
"tipo_telefone_2"				=>"tipo_telefone_2",
"ddd_telefone_2"				=>"ddd_telefone_2",	
"telefone_2"					=>"telefone_2",	
"obs_contato_2"					=>"obs_contato_2",
"tipo_contato_celular"			=>"tipo_contato_celular",
"ddd_celular"			        =>"ddd_celular",	
"celular"			            =>"celular",
"operadora"			            =>"operadora",
"email"			                =>"email",
"pis"			                =>"pis",
"carteira_profissional"			=>"carteira_profissional",
"serie"			                =>"serie",
"rg"			                =>"rg",
"data_emissao"			        =>"data_emissao",
"orgao_expedidor"			    =>"orgao_expedidor",
"cpf"			                =>"cpf",
"titulo_eleitor"			    =>"titulo_eleitor",
"zona_eleitoral"			    =>"zona_eleitoral",
"secao_eleitoral"			    =>"secao_eleitoral",
"reservista"			        =>"reservista",
"categoria_reservista"			=>"categoria_reservista",
"registro_coren"			    =>"registro_coren",
"numero_coren"			        =>"numero_coren",
"cargo_coren"			        =>"cargo_coren",
"tipo_concessao"			    =>"tipo_concessao",
"coren_situacao"			    =>"coren_situacao",
"incricao_coren"			    =>"incricao_coren",
"coren_data_pagamento"			=>"coren_data_pagamento",
"coren_validade" 				=>"coren_validade",
"primeira_dose_hepatite"   		=>"primeira_dose_hepatite",
"segunda_dose_hepatite"			=>"segunda_dose_hepatite",
"terceira_dose_hepatite"		=>"terceira_dose_hepatite",
"primeira_dose_dupla" 			=>"primeira_dose_dupla",
"segunda_dose_dupla" 			=>"segunda_dose_dupla",
"terceira_dose_dupla" 			=>"terceira_dose_dupla",
"validade_vacinacao"			=>"validade_vacinacao",
"scr_vacinacao"			        =>"scr_vacinacao",
"data_exame_medico"			    =>"data_exame_medico",
"nome_dependente_1"			    =>"nome_dependente_1",
"parentesco_dependente_1"		=>"parentesco_dependente_1",
"sexo_dependente_1"			    =>"sexo_dependente_1",
"data_nascimento_dependente_1"	=>"data_nascimento_dependente_1",
"nome_dependente_2"			    =>"nome_dependente_2",
"parentesco_dependente_2"		=>"parentesco_dependente_2",
"sexo_dependente_2"			    =>"sexo_dependente_2",
"data_nascimento_dependente_2"	=>"data_nascimento_dependente_2",
"nome_dependente_3"			    =>"nome_dependente_3",
"parentesco_dependente_3"		=>"parentesco_dependente_3",
"sexo_dependente_3"			    =>"sexo_dependente_3",
"data_nascimento_dependente_3"	=>"data_nascimento_dependente_3",
"escolaridade"			        =>"escolaridade",
"curso"			                =>"curso",
"instituicao"			        =>"instituicao",
"termino_escolaridade"			=>"termino_escolaridade",
"escolaridade_2"             	=>"escolaridade_2",
"curso_2"						=>"curso_2"	,			
"instituicao_2"					=>"instituicao_2",
"termino_escolaridade_2"		=>"termino_escolaridade_2",
"escolaridade_3"				=>"escolaridade_3",
"curso_3"						=>"curso_3",
"instituicao_3"					=>"instituicao_3",
"termino_escolaridade_3"		=>"termino_escolaridade_3",
"andamento_escolaridade"		=>"andamento_escolaridade",
"empresa_anterior"			    =>"empresa_anterior",
"cargo_anterior"			    =>"cargo_anterior",
"hora_entrada_anterior"			=>"hora_entrada_anterior",
"hora_saida_anterior"			=>"hora_saida_anterior",
"empresa_anterior_2"     		=>"empresa_anterior_2",
"cargo_anterior_2"				=>"cargo_anterior_2",
"hora_entrada_anterior_2"		=>"hora_entrada_anterior_2",
"hora_saida_anterior_2"			=>"hora_saida_anterior_2",
"tipo_cartao_1"			        =>"tipo_cartao_1",
"numero_bilhete_1"			    =>"numero_bilhete_1",
"valor_transporte_1"			=>"valor_transporte_1",
"tipo_cartao_2"			        =>"tipo_cartao_2",
"numero_bilhete_2"			    =>"numero_bilhete_2",
"valor_transporte_2"		    =>"valor_transporte_2",
"tipo_cartao_3"					=>"tipo_cartao_3",
"numero_bilhete_3"				=>"numero_bilhete_3",
"valor_transporte_3"			=>"valor_transporte_3",
"tipo_banco"			        =>"tipo_banco",
"agencia"			            =>"agencia",
"conta"			                =>"conta",
"vale_refeicao"					=>"vale_refeicao",
"assistencia_medica"		    =>"assistencia_medica",
"numero_convenio"			    =>"numero_convenio",
"periodo_aquisitivo"			=>"periodo_aquisitivo",
"periodo_gozo"					=>"periodo_gozo",
"valor_ferias"					=>"valor_ferias",
"tipo_contrato"			        =>"tipo_contrato",
"data_admissao"			        =>"data_admissao",
"data_demissao"			        =>"data_demissao",
"situacao"			            =>"situacao",
"cargo"			                =>"cargo",
"nivel_hierarquico"			    =>"nivel_hierarquico",
"funcao"			            =>"funcao",
"unidade"			            =>"unidade",
"salario"			            =>"salario",
"horas_trabalhadas"			    =>"horas_trabalhadas",
"salario_hora"			        =>"salario_hora",
"horario_entrada"			    =>"horario_entrada",
"horario_saida"			        =>"horario_saida",
"carga_horaria"			       	=>"carga_horaria"	
);  

/* Converte o Array em String e adiciona uma virgula */
$colunas_tabela = implode(',', $colunas_tabela );

/* Array de cada input do formulario */

$campos_tabela = array(
$matricula	 					= $_POST['matricula'],
$nome		 					= $_POST['nome'],
$sexo 		 					= $_POST['sexo'],
$endereco	 					= $_POST['endereco'],
$numero		 					= $_POST['numero'],
$complemento	 				= $_POST['complemento'],
$bairro		 					= $_POST['bairro'],
$cep		 					= $_POST['cep'],
$cidade		 					= $_POST['cidade'],
$uf		 						= $_POST['uf'],
$datanascimento  				= $_POST['datanascimento'],
$nacionalidade	 				= $_POST['nacionalidade'],  //feito
$naturalidade					= $_POST['naturalidade'],
$estado_civil	 				= $_POST['estado_civil'],
$nome_conjuge					= $_POST['nome_conjuge'],
$data_nascimento_conjuge		= $_POST['data_nascimento_conjuge'],
$nome_mae						= $_POST['nome_mae'],
$nome_pai						= $_POST['nome_pai'],
$tipo_telefone					= $_POST['tipo_telefone'],
$ddd_telefone					= $_POST['ddd_telefone'],
$telefone						= $_POST['telefone'],
$obs_contato					= $_POST['obs_contato'],
$tipo_telefone_2				= $_POST['tipo_telefone_2'],
$ddd_telefone_2					= $_POST['ddd_telefone_2'],
$telefone_2						= $_POST['telefone_2'],
$obs_contato_2					= $_POST['obs_contato_2'],
$tipo_contato_celular			= $_POST['tipo_contato_celular'],
$ddd_celular					= $_POST['ddd_celular'],	
$celular						= $_POST['celular'],
$operadora						= $_POST['operadora'],
$email							= $_POST['email'],
$pis							= $_POST['pis'],
$carteira_profissional			= $_POST['carteira_profissional'],
$serie							= $_POST['serie'],
$rg								= $_POST['rg'],
$data_emissao					= $_POST['data_emissao'],
$orgao_expedidor				= $_POST['orgao_expedidor'],
$cpf							= $_POST['cpf'],
$titulo_eleitor					= $_POST['titulo_eleitor'],
$zona_eleitoral					= $_POST['zona_eleitoral'],
$secao_eleitoral				= $_POST['secao_eleitoral'],
$reservista						= $_POST['reservista'],
$categoria_reservista			= $_POST['categoria_reservista'],
$registro_coren					= $_POST['registro_coren'],
$numero_coren					= $_POST['numero_coren'],
$cargo_coren					= $_POST['cargo_coren'],
$tipo_concessao					= $_POST['tipo_concessao'],
$coren_situacao					= $_POST['coren_situacao'],
$incricao_coren					= $_POST['incricao_coren'],
$coren_data_pagamento			= $_POST['coren_data_pagamento'],
$coren_validade					= $_POST['coren_validade'],
$primeira_dose_hepatite     	= $_POST['primeira_dose_hepatite'],
$segunda_dose_hepatite			= $_POST['segunda_dose_hepatite'],
$terceira_dose_hepatite  		= $_POST['terceira_dose_hepatite'],
$primeira_dose_dupla			= $_POST['primeira_dose_dupla'],
$segunda_dose_dupla				= $_POST['segunda_dose_dupla'],
$terceira_dose_dupla			= $_POST['terceira_dose_dupla'],
$validade_vacinacao				= $_POST['validade_vacinacao'],
$scr_vacinacao					= $_POST['scr_vacinacao'],
$data_exame_medico				= $_POST['data_exame_medico'],
$nome_dependente_1				= $_POST['nome_dependente_1'],
$parentesco_dependente_1		= $_POST['parentesco_dependente_1'],
$sexo_dependente_1				= $_POST['sexo_dependente_1'],
$data_nascimento_dependente_1   = $_POST['data_nascimento_dependente_1'],
$nome_dependente_2				= $_POST['nome_dependente_2'],
$parentesco_dependente_2		= $_POST['parentesco_dependente_2'],
$sexo_dependente_2				= $_POST['sexo_dependente_2'],
$data_nascimento_dependente_2   = $_POST['data_nascimento_dependente_2'],
$nome_dependente_3				= $_POST['nome_dependente_3'],
$parentesco_dependente_3		= $_POST['parentesco_dependente_3'],
$sexo_dependente_3				= $_POST['sexo_dependente_3'],
$data_nascimento_dependente_3   = $_POST['data_nascimento_dependente_3'],
$escolaridade					= $_POST['escolaridade'],
$curso							= $_POST['curso'],
$instituicao					= $_POST['instituicao'],
$termino_escolaridade			= $_POST['termino_escolaridade'],
$escolaridade_2					= $_POST['escolaridade_2'],
$curso_2						= $_POST['curso_2'],
$instituicao_2					= $_POST['instituicao_2'],
$termino_escolaridade_2			= $_POST['termino_escolaridade_2'],
$escolaridade_3					= $_POST['escolaridade_3'],
$curso_3						= $_POST['curso_3'],
$instituicao_3					= $_POST['instituicao_3'],
$termino_escolaridade_3			= $_POST['termino_escolaridade_3'],
$andamento_escolaridade			= $_POST['andamento_escolaridade'],
$empresa_anterior				= $_POST['empresa_anterior'],
$cargo_anterior					= $_POST['cargo_anterior'],
$hora_entrada_anterior			= $_POST['hora_entrada_anterior'],
$hora_saida_anterior			= $_POST['hora_saida_anterior'],
$empresa_anterior_2      		= $_POST['empresa_anterior_2'],
$cargo_anterior_2				= $_POST['cargo_anterior_2'],
$hora_entrada_anterior_2		= $_POST['hora_entrada_anterior_2'],
$hora_saida_anterior_2			= $_POST['hora_saida_anterior_2'],
$tipo_cartao_1					= $_POST['tipo_cartao_1'],
$numero_bilhete_1				= $_POST['numero_bilhete_1'],
$valor_transporte_1				= $_POST['valor_transporte_1'],
$tipo_cartao_2					= $_POST['tipo_cartao_2'],
$numero_bilhete_2				= $_POST['numero_bilhete_2'],
$valor_transporte_2				= $_POST['valor_transporte_2'],
$tipo_cartao_3					= $_POST['tipo_cartao_3'],
$numero_bilhete_3				= $_POST['numero_bilhete_3'],	
$valor_transporte_3				= $_POST['valor_transporte_3'],
$tipo_banco						= $_POST['tipo_banco'],
$agencia						= $_POST['agencia'],
$conta							= $_POST['conta'],
$vale_refeicao					= $_POST['vale_refeicao'],
$assistencia_medica				= $_POST['assistencia_medica'],
$numero_convenio				= $_POST['numero_convenio'],
$periodo_aquisitivo				= $_POST['periodo_aquisitivo'],
$periodo_gozo					= $_POST['periodo_gozo'],
$valor_ferias					= $_POST['valor_ferias'],
$tipo_contrato					= $_POST['tipo_contrato'],
$data_admissao					= $_POST['data_admissao'],
$data_demissao					= $_POST['data_demissao'],
$situacao						= $_POST['situacao'],
$cargo							= $_POST['cargo'],
$nivel_hierarquico				= $_POST['nivel_hierarquico'],
$funcao							= $_POST['funcao'],
$unidade						= $_POST['unidade'],
$salario						= $_POST['salario'],
$horas_trabalhadas				= $_POST['horas_trabalhadas'],
$salario_hora					= $_POST['salario_hora'],
$horario_entrada				= $_POST['horario_entrada'],
$horario_saida					= $_POST['horario_saida'],
$carga_horaria					= $_POST['carga_horaria']	

);

/* Formata o Array adicionando aspas simples no inicio e fim */
foreach( $campos_tabela as $x => $y ) {
	$campos_tabela[ $x ] = "'" . $y . "'";
}

/* Converte o Array em String e adiciona uma virgula */
$campos_tabela = implode(', ', $campos_tabela );

/* Faz o insert na tabela */


echo $nome;

$insert_banco = $conn->prepare("INSERT INTO cmi_cadastro_de_funcionarios($colunas_tabela) VALUES ($campos_tabela)");

    $insert_banco->execute();
if($insert_banco == true){
	echo "</br><h1>Funcionário cadastrado com sucesso!<h1></br><br />";
	echo "<div class=\"btn btn-info\"><a href=\"http://192.168.0.142/vdlap/cadastro-de-funcionarios/\">Cadastrar Novo Funcionário</a></div>";
}
else{
	 echo("<br/>Não está funcionando:<br/> " . $e->getMessage() . "<br/>Contate o administrador URGENTE! <br/> ");
}





?>	


