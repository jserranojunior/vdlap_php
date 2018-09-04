<?php



class fatura {

public $unidade;
public $meses;
public $codigo;
public $procedimento;
public $qtd_procedimento;
public $quantidadeProcedimentos;

public function nomeUnidades() {
 require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");
$unidades = $connold->query("
        SELECT nm_sigla, cd_codigo
        FROM [Vdlap].[dbo].[TBL_unidades]
        WHERE (tipo_und = '1') AND (nm_unidade_nome <> '' and dt_final > '2016-06-01')
        ");

$this->unidade = $unidades;

}

public function nomeMeses() {
        $this->meses = array(
            '01' => array('mes' => 'Janeiro', 'nm_mes' => '01'),
            '02' => array('mes' => 'Fevereiro', 'nm_mes' => '02'),
            '03' => array('mes' => 'Março', 'nm_mes' => '03'),
            '04' => array('mes' => 'Abril', 'nm_mes' => '04'),
            '05' => array('mes' => 'Maio', 'nm_mes' => '05'),
            '06' => array('mes' => 'Junho', 'nm_mes' => '06'),
            '07' => array('mes' => 'Julho', 'nm_mes' => '07'),
            '08' => array('mes' => 'Agosto', 'nm_mes' => '08'),
            '09' => array('mes' => 'Setembro', 'nm_mes' => '09'),
             '10' => array('mes' => 'Outubro', 'nm_mes' => '10'),
             '11' => array('mes' => 'Novembro', 'nm_mes' => '11'),
             '12' => array('mes' => 'Dezembro', 'nm_mes' => '12'),
            
        );
    }

public function consultarProcedimento($codigo,$data,$data_fim, $rack) {
require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");

$this->codigo = $codigo;

$procedimento = $connold->query("
            
SELECT C.cd_procedimento_tipo[tipo_procedimento],

(SELECT TOP 1 G.nr_desconto FROM [Vdlap].[dbo].[TBL_financeiro_fatura_desc] 
AS G WHERE (G.cd_unidade = '$codigo') and (G.dt_data = '$data')
)[desconto],

(SELECT TOP 1 nm_valor FROM [Vdlap].[dbo].[TBL_unidades_valores_procedimentos] 
AS F WHERE (F.cd_unidade = '$codigo') and (F.dt_atualizacao <= '$data') 
and (F.cd_procedimento_tipo = C.cd_procedimento_tipo) order by dt_atualizacao desc
)[valor_procedimento]

FROM [Vdlap].[dbo].[TBL_unidades] as C 
WHERE (tipo_und = '1') and (cd_codigo = '$codigo') AND (dt_final > '$data')

");

$procedimentoQuery = $connold->query("
SELECT a002_pacsex FROM [VdLap].[dbo].[VIEW_protocolo_lista]
 WHERE (a053_codung = '$codigo')
  and A002_datpro BETWEEN '$data' AND '$data_fim' $rack
");


$procedimentoQuery->fetchAll();

$this->procedimento = $procedimento;
$this->quantidadeProcedimentos = $procedimentoQuery->rowCount();    

}
}


 