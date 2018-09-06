
<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>


<?php 

$soma_total = 0;

if(isset($_POST['data'])){

$data =  $_POST['data'];
}

if(isset($_POST['data_atual'])){

$data_atual =  $_POST['data_atual'];
}
 
echo $data."<br>";
echo $data_atual;
?>

<?php 



if(!empty($_POST['check_list'])) {
    foreach($_POST['check_list'] as $id) {


$contas = $conn->query("SELECT * FROM contas_a_pagar WHERE (id = '$id')");                  
               $linha = $contas->fetch(PDO::FETCH_ASSOC);

 $segconsulta = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = '$id') AND SUBSTRING(inicio_mes,1,7)= '$data_atual'");                  
               $valor_atual = $segconsulta->fetch(PDO::FETCH_ASSOC);
    

$contas = $conn->query("SELECT * FROM contas_a_pagar WHERE (id = '$id')");                  
               $linha = $contas->fetch(PDO::FETCH_ASSOC);




$tipo = "{$linha['tipo']}";
$valor_atual = "{$valor_atual['valor']}";


if($tipo == "Parcelado" ){

        /* Consulta qual o valor do ultimo mês com pagamento */
        $ult_mes = $conn->query("SELECT top 1 *   FROM valor_contas_a_pagar WHERE (codigo = $id)AND (SUBSTRING(inicio_mes,1,7) < '$data_atual') order by inicio_mes desc");
        $ultimo_mes = $ult_mes->fetch(PDO::FETCH_ASSOC);
        $valor_ultimo_mes = "{$ultimo_mes['valor']}";
        $valor_ultimo_mes = str_ireplace(".", "", $valor_ultimo_mes);
        $valor_ultimo_mes = str_ireplace(",", ".", $valor_ultimo_mes);

        /* Consulta qual o valor do primeiro mês com pagamento */
        $prim_mes = $conn->query("SELECT top 1 *   FROM valor_contas_a_pagar WHERE (codigo = $id) order by inicio_mes asc");
        $primeira_parcela = $prim_mes->fetch(PDO::FETCH_ASSOC);
        $mes_primeira_parcela = "{$primeira_parcela['inicio_mes']}";
        $mes_primeira_parcela = substr($mes_primeira_parcela, 0, 7);


/* Verifica os valores do parcelado */
        if ($valor_atual == "") {
            $valor_atual = $valor_ultimo_mes;
            
        $valor_atual= str_ireplace(",", "", $valor_atual);
        $valor_atual = str_ireplace(".", ",", $valor_atual);
        }

}

$tipo_pagamento = $_POST['tipo_pagamento'];

$numero_cheque = $_POST['numero_cheque'];

if($tipo_pagamento == "Transferência"){
    $numero_cheque = date('dmyHisU'); 

}

$campos_tabela = array(
    
$data_conta = $_POST['data_conta'],
$valor_pago = $valor_atual,
$numero_cheque,
$tipo_pagamento,
$mes_referencia = $_POST['data_atual'],
$conta = $_POST['conta'],


);

/* Formata o Array adicionando aspas simples no inicio e fim */
foreach( $campos_tabela as $x => $y ) {
	$campos_tabela[ $x ] = "'" . $y . "'";
}


/* Converte o Array em String e adiciona uma virgula */
$campos_tabela = implode(', ', $campos_tabela );


$colunas_tabela = array(
"id_conta"			            =>"id_conta",
"data_conta"			                =>"data_conta",
"valor_pago"			                =>"valor_pago",
"numero_cheque"			                =>"numero_cheque",
"tipo_pagamento"			                =>"tipo_pagamento",
"mes_referencia"			                =>"mes_referencia",
"conta"			                =>"conta",
);


/* Converte o Array em String e adiciona uma virgula */
$colunas_tabela = implode(',', $colunas_tabela );

$insert_banco = $conn->prepare("INSERT INTO financeiro_pagamentos_feitos($colunas_tabela) VALUES ('$id', $campos_tabela)");
$insert_banco->execute();

    }
}

    ?>