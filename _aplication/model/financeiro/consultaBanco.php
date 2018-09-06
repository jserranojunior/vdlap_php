<form method="POST" name="emitirpagamento" id="emitirpagamento" target="pagemitir" action="../../../_aplication/controller/financeiro/emitirpagamento/emitirpagamento.php" ><!-- ARRUMAR -->
<input type="hidden" name="data" value="<?php echo $data; ?>">
<input type="hidden" name="data_atual" value="<?php echo $data_atual; ?>">   
</form>



<?php

/* Zerando variaveis antes de iniciar o laço de repetição */
$soma_atual = 0;
$soma_extra = 0;
$soma_valores_estimados = 0;
$totalpago = 0;
$arr = array();
$soma_mes_atual = 0;
$contador = 0;


/* Faz uma consulta geral no banco de contas e no de valores */
$consulta = $conn->query("
SELECT  *,
(SELECT top 1 V.favorecido from valor_contas_a_pagar AS V WHERE V.codigo = C.id order by favorecido asc)[favorecido],
(SELECT top 1 V.inicio_mes from valor_contas_a_pagar AS V WHERE V.codigo = C.id)[inicio_mes], 

(SELECT top 1 SUBSTRING(V.inicio_mes,9,10) from valor_contas_a_pagar AS V
WHERE (V.codigo = C.id)  AND (SUBSTRING(V.inicio_mes,1,7)  >= '$data_atual') OR (V.codigo = C.id) 
AND (SUBSTRING(V.inicio_mes,1,7) < '$data_atual')ORDER BY (V.inicio_mes) desc)[dia_mes]


FROM contas_a_pagar AS C

WHERE (SUBSTRING(C.inicio_conta,1,7)  <= '$data_atual') 
AND (SUBSTRING(C.fim_conta,1,7)  >= '$data_atual') $area_select

OR (SUBSTRING(C.inicio_conta,1,7) <= '$data_atual')  
AND (SUBSTRING(C.fim_conta,1,7)  = '') $area_select
$select_ordem
");

/* Associa a consulta ao array */
$cons = $consulta->fetchAll();

foreach ($cons AS $key => $linha) {
$dia = "{$linha['dia_mes']}";




if(($dia < $diaInicial) or ($dia > $diaFinal)){        
unset($cons[$key]);
}    
}




/*
echo("<pre>");
var_dump($cons);
echo("</pre>");

/* Verifica se o array tem objetos e executa a listagem */
foreach ($cons AS $linha) {

/* Usa o id para terminar de consultar as tabelas */                                               
$consult = "{$linha['id']}";


/* Atribui os valores dos array as Strings */
$id = "{$linha['id']}";
$tipo = "{$linha['tipo']}";
$linha_mes = "{$linha['inicio_conta']}";
$ano_mes = substr("$linha_mes", 0, -3);
$fim_conta = substr("{$linha['fim_conta']}", 0, -3);
$inicio_conta = substr("{$linha['inicio_conta']}", 0, -3);
$codigo = "{$linha['id']}";
$tipo_parcela = "{$linha['tipo_parcela']}";

$qtdparcela = "{$linha['parcelas']}";
//$dia_pagamento = "{$linha['dia_mes']}";



/* Faz um select na tabela de valores pagos */
$pagconsulta = $conn->query("SELECT * FROM financeiro_pagamentos_feitos
WHERE (id_conta = '$id') 
AND SUBSTRING(data_conta,1,7)= '$data_atual'");
$valor_pago = $pagconsulta->fetch(PDO::FETCH_ASSOC);

/* Faz select na tabela de valor */                                                               ###########  VERIFICAR SE PRECISA REPETIDO #########           
$segconsulta = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = '$id') AND SUBSTRING(inicio_mes,1,7)= '$data_atual'");
$valor_atual = $segconsulta->fetch(PDO::FETCH_ASSOC);

/* Faz select na tabela para saber o valor anterior */                                               ###########  VERIFICAR SE PRECISA #########    
$terconsulta_fixo = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE SUBSTRING(inicio_mes,1,7)= '$data_anterior' AND (codigo = $id)");
$valor_anterior = $terconsulta_fixo->fetch(PDO::FETCH_ASSOC);


/* Faz um select na tabela de valores pagos */                                                       ###########  VERIFICAR SE PRECISA REPETIDO #########  
$pagconsulta = $conn->query("SELECT * FROM financeiro_pagamentos_feitos  WHERE (id_conta = '$id') AND mes_referencia = '$data_atual' order by id desc");
$valor_pago = $pagconsulta->fetch(PDO::FETCH_ASSOC);


/* Atribui os valores dos array as Strings */
$tipo_pagamento = "{$valor_pago['tipo_pagamento']}";
$numero_cheque = "{$valor_pago['numero_cheque']}";
$valor_pago = "{$valor_pago['valor_pago']}";

$suspenso = "{$valor_atual['suspenso']}";


if(     $numero_cheque !== ""
)
{

?>

<script type="text/javascript">
function ver_cheque<?php echo $numero_cheque; ?>(){
window.open('/vdlap/_aplication/model/financeiro/exibircheque/exibircheque.php','<?php echo $id; ?>','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=450, height=500');
document.ver<?php echo $id; ?>.submit();}
</script> 

<form method="POST" name="ver<?php echo $id; ?>"  target="<?php echo $id; ?>" action="/vdlap/_aplication/model/financeiro/exibircheque/exibircheque.php" >

<input type="hidden" value="<?php echo $numero_cheque; ?>" name="numero_cheque"></input>
<input type="hidden" value="11515151" name="test"></input>

</form>



<?php

}
$area = "{$linha['area']}";
$cccustos = "{$valor_atual['ccustos']}";
$observacoes = "{$valor_atual['observacoes']}";
$conta = "{$valor_atual['conta']}";
$item = "{$valor_atual['item']}";
$favorecido = "{$valor_atual['favorecido']}";
$inicio_mes = "{$valor_atual['inicio_mes']}";
$valor_atual = "{$valor_atual['valor']}";
$valor_anterior = "{$valor_anterior['valor']}";

$dia_pagamento = substr($inicio_mes, -2);

/* Remove a virgula e coloca ponto */
$valor_atual = str_ireplace(".", "", $valor_atual);
$valor_atual = str_ireplace(",", ".", $valor_atual);
$valor_anterior = str_ireplace(".", "", $valor_anterior);
$valor_anterior = str_ireplace(",", ".", $valor_anterior);
$valor_pago = str_ireplace(".", "", $valor_pago);
$valor_pago = str_ireplace(",", ".", $valor_pago);



$contador = $contador + 1;

/* Verifica se no mês atual existe as informações da conta, caso não tenha ele pega o da anterior */
if (($area == "") OR ( $cccustos == "") OR ( $conta == "") OR ( $item == "") OR ( $favorecido == "")) {

$qut_consulta_fixo = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE (codigo = $id) order by id desc");
$dados_anterior = $qut_consulta_fixo->fetch(PDO::FETCH_ASSOC);

/* Atribui os valores dos array as Strings */

if($area == ""){
$area = "{$linha['area']}";
}
if($cccustos == ""){
$cccustos = "{$dados_anterior['ccustos']}";
}
if($conta == ""){
$conta = "{$dados_anterior['conta']}";
}
if($item == ""){
$item = "{$dados_anterior['item']}";
}
if($favorecido == "" ){
$favorecido = "{$dados_anterior['favorecido']}";
}
if($observacoes == ""){        
$observacoes = "{$dados_anterior['observacoes']}";
}
//if($dia_pagamento==""){        
$dia_pagamento = substr("{$dados_anterior['inicio_mes']}", -2);
//}
if($inicio_mes == ""){
$inicio_mes = "{$dados_anterior['inicio_mes']}";
$inicio_mes = "$ano-$mes_atual-".substr("$inicio_mes", 8);
}


}


/* Variavel para todos os objetos */                            ###########  VERIFICAR SE PRECISA #########
$nameform = "$id";

if ($valor_atual == "") {
$status = "vazio";
}else{
$status = "";
}



?>
<!-- Cria o objeto de edição -->
<script type="text/javascript">
function enviaForm<?php echo $id; ?>(){
window.open('../../../model/financeiro/editarconta/editar.php','<?php echo $id; ?>','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=450, height=680');
document.editar<?php echo $id; ?>.submit();}
</script>

<?php 


/* Verifica se existe valor anterior */  


if(($valor_anterior == "")AND ($tipo == 'Fixo')){

$terconsulta_fixo = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE SUBSTRING(inicio_mes,1,7)= '$data_segundo_anterior' AND (codigo = $id)");
$valor_segundo_anterior = $terconsulta_fixo->fetch(PDO::FETCH_ASSOC);        

$valor_anterior = "{$valor_segundo_anterior['valor']}";

$valor_anterior = str_ireplace(".", "", $valor_anterior);
$valor_anterior = str_ireplace(",", ".", $valor_anterior);


}





if ($valor_anterior !== "") {
$viewValorAnterior = number_format($valor_anterior, 2, ',', '.');
} else {
$viewValorAnterior = "";
}

if($observacoes !== ""){
$viewObservacoes = '<span class="text-danger glyphicon glyphicon-asterisk" data-toggle="tooltip" data-placement="top" title="'.$observacoes.'">';
}else{	$viewObservacoes = "";}

/* Objeto parcelado */
if ($tipo == "Parcelado") {
/* Variaveis iniciais */
$data_cont = $data_atual;
$p_cont = 1;
$viewValorExtra = "";


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


/* Conta até saber qual é a parcela atual */
while ($mes_primeira_parcela < $data_cont) {
$p_cont = $p_cont + 1;        
$mes_primeira_parcela = date('Y-m', strtotime("+1 months", strtotime($mes_primeira_parcela)));
}
$parcela_atual = $p_cont;


/* Se o valor da parcela for igual a vazio atribui o valor do ultimo mês*/
if (($parcela_atual > 1) && $valor_anterior == "") {
$valor_anterior = $valor_ultimo_mes;
}

/* Verifica os valores do parcelado */
if (($valor_atual == "")  and ($tipo_parcela == "") ){
$valor_atual = $valor_ultimo_mes;

}

if (($valor_atual == "")  and ($tipo_parcela !== "") ){
$valor_atual = "";
}



if($valor_atual !== ""){
$valor_formatado = number_format($valor_atual, 2, ',', '.');
}else{
$valor_formatado = "";
}

/* Cria uma div que abre um popup para editar */
/* Variaveis finais e a soma */
$viewValorAtual = '<a class="cem" onclick="javascript:enviaForm'.$id.'();">'.$valor_formatado 
;


if ($valor_atual == "") {

$viewValorAtual = '<div class="btn-invisible" onclick="javascript:enviaForm'.$id.'();">VAZIO</div>';

}

         
           
              if(($valor_atual == "") AND  ($tipo_parcela == "Especial")){

$terconsulta_fixo = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE SUBSTRING(inicio_mes,1,7)= '$data_anterior' AND (codigo = $id)");
$valor_segundo_anterior = $terconsulta_fixo->fetch(PDO::FETCH_ASSOC);        

$valor_anterior = "{$valor_segundo_anterior['valor']}";

$valor_anterior = str_ireplace(".", "", $valor_anterior);
$valor_anterior = str_ireplace(",", ".", $valor_anterior);

}

if(($valor_anterior == "") AND ($valor_atual == "") AND ($tipo_parcela == "Especial")){


$terconsulta_fixo = $conn->query("SELECT * FROM valor_contas_a_pagar WHERE SUBSTRING(inicio_mes,1,7)= '$data_segundo_anterior' AND (codigo = $id)");
$valor_segundo_anterior = $terconsulta_fixo->fetch(PDO::FETCH_ASSOC);        

$valor_anterior = "{$valor_segundo_anterior['valor']}";

$valor_anterior = str_ireplace(".", "", $valor_anterior);
$valor_anterior = str_ireplace(",", ".", $valor_anterior);
}


      
           

/* EXIBE O VALOR ANTERIOR */
if(($valor_anterior !== "") and ($tipo_parcela == "")) {
$viewValorAnterior = number_format($valor_anterior, 2, ',', '.');

} elseif(($valor_anterior == "") and ($tipo_parcela == "Especial")){
$viewValorAnterior = "";


}elseif(($valor_anterior !== "") and ($tipo_parcela == "Especial")) {
$viewValorAnterior = number_format($valor_anterior, 2, ',', '.');

} 



if (($valor_atual == "")  and ($tipo_parcela == "Especial") and ($viewValorAnterior !== "") ){

$soma_valores_estimados = $soma_valores_estimados + $valor_anterior;

}



/* SOMA O VALOR NO TOTAL DO MES */
$soma_mes_atual = $soma_mes_atual + $valor_atual;




}

if($tipo == "Parcelado"){

$item_exibicao = $item.' (<span class="bold azul">'. $parcela_atual.'/'.$qtdparcela. '</span>)</a>';
}else{

$item_exibicao = $item;
}

/* Objeto Extra */
if ($tipo == "Extra") {
$viewValorAtual = "";
$viewValorExtra = '<a class="cem" onclick="javascript:enviaForm'.$id.'();">'.number_format($valor_atual, 2, ',', '.'). '</a>';
$soma_extra = $soma_extra + $valor_atual;
}


$valor_enviar =  $valor_atual;    



/* VARIAVEIS DO FIXO */
if ($tipo == "Fixo") {

$viewValorExtra = "";

if ($valor_atual !== ""  AND ($suspenso !== "Sim")) {
$viewValorAtual =  '<a class="cem" onclick="javascript:enviaForm'.$id.'();">'.number_format($valor_atual, 2, ',', '.'). '</a>';

}elseif($suspenso == "Sim"){
$viewValorAtual =  '<a class="cem" onclick="javascript:enviaForm'.$id.'();">...</a>';

}

if ($suspenso == "Sim"){


$valor_atual = "0.00";
}









if ($valor_atual == "") {
$soma_valores_estimados = $soma_valores_estimados + $valor_anterior;
$viewValorAtual = '<div class="btn-invisible" onclick="javascript:enviaForm'.$id.'();">VAZIO</div>';

}

/* VERIFICA SE TEVE VALOR 0 EM 3 MESES ANTERIORES */        
if ($valor_atual == "0.00") {
$data_atual_formatada = date('Y-m', strtotime($data_atual));
$data_corrigida = date('Y-m', strtotime("-2 months", strtotime($data_atual_formatada)));
$data_segundo_anterior = "$data_corrigida";
$bloqueio = $conn->query("
SELECT U.codigo, U.inicio_mes, U.valor[valor_um], 
(SELECT top 1 D.valor 
from  [vdlap_novo].[dbo].[valor_contas_a_pagar] AS D
WHERE (D.codigo = U.codigo)  and SUBSTRING(D.inicio_mes,1,7)  = '$data_segundo_anterior'  )[valor_dois],
(SELECT top 1 T.valor 
from  [vdlap_novo].[dbo].[valor_contas_a_pagar] AS T
WHERE (T.codigo = U.codigo)  and SUBSTRING(T.inicio_mes,1,7)  = '$data_anterior'  )[valor_tres]
FROM [vdlap_novo].[dbo].[valor_contas_a_pagar] AS U WHERE (codigo = '$id') AND SUBSTRING(U.inicio_mes,1,7) = '$data_atual'
");
$consultar = $bloqueio->fetchAll();
foreach ($consultar AS $bloque) {
$id_bloq = "{$bloque['codigo']}";
$inicio_bloq = "{$bloque['inicio_mes']}";
$valor_um_bloq = "{$bloque['valor_um']}";
$valor_dois_bloq = "{$bloque['valor_dois']}";
$valor_tres_bloq = "{$bloque['valor_tres']}";
if ($valor_um_bloq == "0,00" AND $valor_dois_bloq == "0,00" AND $valor_tres_bloq == "0,00") {   
$data_trava = $conn->query("UPDATE contas_a_pagar SET fim_conta = '$data_atual'  WHERE id = '$id' ");
}
}
}








/* Soma final dos valores */   
$soma_mes_anterior = $soma_mes_anterior + $valor_anterior;
$soma_mes_atual = $soma_mes_atual + $valor_atual;
}/*FIM OBEJTO FIXO*/

$btn_excluir = '<p class="bold glyphicon glyphicon-remove text-danger" onclick="javascript:excluir'.$id.'();"></p>'

?>

<!-- EXCLUIR -->
<script type="text/javascript">
function excluir<?php echo $id; ?>(){
window.open('/vdlap/financeiro/excluir/excluir.php','<?php echo $id; ?>','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=450, height=140');
document.ex<?php echo $id; ?>.submit();}
</script> 

<form method="POST" name="ex<?php echo $id; ?>"  target="<?php echo $id; ?>" action="../../../_aplication/view/financeiro/excluirconta/excluirconta.php" >
<input type="hidden" value="<?php echo $id; ?>" name="id"></input>
<input type="hidden" value="<?php echo $tipo; ?>" name="tipo"></input>
<input type="hidden" value="<?php echo $parcela_atual; ?>" name="parcela_atual"></input>
<input type="hidden" value="<?php echo $data_anterior; ?>" name="data_anterior"></input>

</form>

<!-- EDITAR-->
<form method="POST" name="editar<?php echo $id; ?>"  target="<?php echo $id; ?>" action="../../../_aplication/view/financeiro/editarconta/editar.php" ><!-- ARRUMAR -->
<input type="hidden" value="<?php echo $id; ?>" name="id">
<input type="hidden" value="<?php echo $area; ?>" name="area">
<input type="hidden" value="<?php echo $cccustos; ?>" name="cccustos">
<input type="hidden" value="<?php echo $conta; ?>" name="conta">
<input type="hidden" value="<?php echo $tipo; ?>" name="tipo">
<input type="hidden" value="<?php echo $favorecido; ?>" name="favorecido">
<input type="hidden" value="<?php echo $item; ?>" name="item">
<input type="hidden" value="<?php echo $data_atual; ?>" name="inicio_conta">
<input type="hidden" value="<?php echo $fim_conta; ?>" name="fim_conta">
<input type="hidden" value="<?php echo $dia_pagamento; ?>" name="dia_pagamento">
<input type="hidden" value="<?php echo $valor_enviar; ?>" name="valor_atual">
<input type="hidden" value="<?php echo $observacoes; ?>" name="observacoes">
<input type="hidden" value="<?php echo $qtdparcela; ?>" name="qtdparcela">
<input type="hidden" value="<?php echo $inicio_mes; ?>" name="inicio_mes">
<input type="hidden" value="<?php echo $status; ?>" name="vazio">
<input type="hidden" value="<?php echo $suspenso; ?>" name="suspenso">
</form>





<?php


/* Verifica se no mês atual o valor é sete porcento maior ou menor que o anterior */   
$valor_sete = $valor_anterior * 7 / 100;
$valor_sete = number_format($valor_sete, 2, ',', '.');
$valor_sete = str_ireplace(".", "", $valor_sete);
$valor_sete = str_ireplace(",", ".", $valor_sete);
$valor_anterior_maior = $valor_anterior + $valor_sete;
$valor_anterior_menor = $valor_anterior - $valor_sete;
if (( $valor_atual <= $valor_anterior_menor ) AND ( $valor_atual !== "") AND ( $valor_atual !== "0.00") AND ( $tipo == "Fixo")) {
$tdcor = "<td  class='td_pequena' style='background-color:blue';>";
}
elseif (($valor_atual >= $valor_anterior_maior) AND ( $valor_atual !== "") AND ( $valor_atual !== "0.00") AND ( $tipo == "Fixo")) {
$tdcor = "<td class='td_pequena' style='background-color:red';>";
} else {
$tdcor = "<td>";
}



/* Verifica o pagamento efetuado e atribui a cor ou objeto */
if ($suspenso == 'Sim') {
$pagamento = '<td class="td_pequena" style="background-color:green;">';
}
elseif (( $tipo_pagamento == "Cheque") AND ( $valor_pago > "")) {
$pagamento = '<td class="td_pequena" style="background-color:#ffa303;" onclick="javascript:ver_cheque'.$numero_cheque.'();"> ';
}
elseif (( $tipo_pagamento == "Transferência") AND ( $valor_pago > "")) {
$pagamento = '<td class="td_pequena" style="background-color:#6f05d1;" onclick="javascript:ver_cheque'.$numero_cheque.'();">';
} elseif ($valor_atual == "") {
$pagamento = " <td> Ø ";
} elseif ($valor_atual > "") {
$pagamento = "<td><input type='checkbox' form='emitirpagamento' name='check_list[]' value='$id'>";
}

/*   if($valor_pago !== $valor_atual){
$exibir = "AQUI";
}else{
$exibir = "";
}
*/   

if(($tipo_pagamento == "Cheque")OR ( $tipo_pagamento == "Transferência")){
$valor_pago = $valor_atual;
}else{
$valor_pago = 0;
}


/* Soma os valores */   
$totalpago = $totalpago + $valor_pago;
$total_mes = $soma_extra + $soma_mes_atual;
$apagar = $total_mes - $totalpago;
$total_estimado = $total_mes + $soma_valores_estimados;
$fluxodecaixa = $total_estimado - $totalpago;

//      $favorecido = substr("$favorecido",0,15);
//   $item_exibicao = substr("$item_exibicao",0,35);


/* Chamando a view da tabela */
include("../../../_aplication/view/financeiro/viewTabela.php");
}

/* Soma os valores com duas casas decimais */
$soma_mes_atual = number_format( $soma_mes_atual,2, ',', '.');
$totalpago = number_format($totalpago,2, ',', '.');
$valor_estimado = number_format($soma_valores_estimados,2, ',', '.');

/* Verifica se existe soma na coluna extra */
if(isset($soma_extra)){
$soma_extra = number_format($soma_extra,2,",",".");
}else{
$soma_extra = "";
}
/* Verifica se existe soma na coluna atual */
if(isset($total_mes)){
$total_mes = number_format($total_mes,2, ',', '.');
}else{
$total_mes = "";
}
/* Verifica se existe valor a pagar */
if(isset($apagar)){
$apagar = number_format($apagar,2, ',', '.');
}else{
$apagar = "";
}
/* Verifica se existe fluxo de caixa*/
if(isset($fluxodecaixa)){
$fluxodecaixa = number_format($fluxodecaixa,2, ',', '.');
}else{
$fluxodecaixa = "";
}

/* Verifica se existe total estimado */
if(isset($total_estimado)){
$total_estimado = number_format($total_estimado,2, ',', '.');
}else{
$total_estimado = "0,00";
}



?>
