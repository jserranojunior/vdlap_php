    <?php include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>
<?php

$codigo = $_GET["codigo"];
$ano = $_GET['ano'];
$mes = $_GET['mes'];
$unidade_px = $_GET['unidade'];

$unidade_px =  "$unidade_px";

try{
include("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 
                    $hstr = $conn->query("select * from financeiro_consolidado
                        where year(data) = $ano and month(data) = $mes 
                           and unidade = '$unidade_px'
                            ");
                    
                    
                    
                    
}catch(Exception $e){
  echo $e;  
}
$valor = "";
$quantidade = "";

if($mes <= 9){
    $mes = "0$mes";
}
$data = "$ano-$mes-01";
$id = "";
$desconto = "";

foreach($hstr as $func){
    $valor = "{$func['valor']}";
    $quantidade = "{$func['quantidade']}";
    $data = "{$func['data']}";
    $id = "{$func['id']}";
    $desconto = "{$func['porcentagemdesconto']}";
      }
 
    ?>

<div class="col-md-12">
<div class="col-md-06">

<form method="post" action="../../../model/financeiro/faturaconsolidada/update.php">
    <label for="valor"> Valor</label>
    <input type="text" value="<?php echo $valor ?>" class="form-control" name="valor" id="valor">
    
    <input type="hidden" name="id" id="id" value="<?php echo $id?>"/>
      <input type="hidden" name="unidade_px" id="id" value="<?php echo $unidade_px?>"/>
    
    
    <label for="func">Quantidade de Funcionarios</label>
    <input class="form-control" value="<?php echo $quantidade; ?>" name="quantidade" id="quantidade"/>
     
    <label for="data">Data de vencimento</label>
    <input class="form-control" value="<?php echo $data; ?>" type="date" name="data" id="data" />
    
    <label for="desconto">Desconto</label>
    <input type="text" class="form-control" value="<?php echo $desconto; ?>" name="desconto" id="desconto"/>
    <br>
    
    <input class="btn btn-primary" type="submit" value="ATUALIZAR">
</form>

</div>
    </div>
   

  