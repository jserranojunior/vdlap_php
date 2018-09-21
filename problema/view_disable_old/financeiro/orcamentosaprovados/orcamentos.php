
<html>
   <head>
      <title>VDLAP</title>
      <?php
      require("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); 
      require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");
      ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
       
       
<table class="table table-bordered table-hover">
    <tr>
                <td>
N° Orçamento: 
            </td>
        <td>
Fornecedor: 
            </td>
            <td>
Data Entrega:
                </td>
                <td>
Valor: 
                    </td>
  
     <td>
Qtd Parcelas: 
                    </td>
    </tr>
<?php 



$data_atual = $_GET['data_atual'];

$mes_atual = substr($data_atual, 5);
$ano_atual = substr($data_atual, 0, -3);

$consulta = $connold->query("SELECT
    

   (SELECT top 1 C.nm_fornecedor from [TBL_fornecedor] AS C WHERE C.cd_codigo =  N.cd_fornecedor)[cd_fornecedor],
   [dt_entrega]
 ,[nm_valor],
 [nr_orcamento]
      ,[nr_parcela]
	 
 FROM [TBL_manutencao_orcamento] AS N

    where cd_status = '0' and dt_entrega > '' and inserido IS NULL
           
           ;");
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

    $dt_aprov_orc = "{$linha['dt_entrega']}";
    $dt_aprov_orc = substr($dt_aprov_orc, 0, -12);
    $nm_valor = "{$linha['nm_valor']}";
    $nr_parcela = "{$linha['nr_parcela']}";
    $cd_fornecedor = "{$linha['cd_fornecedor']}";
     $cd_codigo = "{$linha['nr_orcamento']}";
   ?>
    <tr>
          <td>
           <?php echo $cd_codigo . "<br>"; ?>
        </td>
        <td>
            <?php echo $cd_fornecedor . "<br>"; ?> 
         
        </td>
        <td>
            <?php echo $dt_aprov_orc . "<br>"; ?>   
         
            </td>
            <td>


                  <?php
                  
                   $nm_valor = str_ireplace(".", "", $nm_valor);
    $nm_valor= str_ireplace(",", ".", $nm_valor);
              

                   $nm_valor = number_format($nm_valor, 2, ',', '.'); 
                   echo $nm_valor;
                   
                   ?>
        
                </td>
                <td>
                   <?php echo $nr_parcela . "<br>"; ?>     
                    </td>
                    <td>
                        <form action="cadastrar.php" method="post" name="<?php echo $cd_codigo; ?>">
                            <input type="hidden" name="codigo" value="<?php echo $cd_codigo; ?>" class="form-control">
                            <input type="hidden"  name="fornecedor" value="<?php echo $cd_fornecedor; ?>" class="form-control">
                            <input type="hidden"  name="data_orcamento" value="<?php echo $dt_aprov_orc; ?>" class="form-control"> 
                            <input type="hidden"  name="valor" value="<?php echo $nm_valor; ?>" class="form-control"> 
                            <input type="hidden"  name="parcela" value="<?php echo $nr_parcela; ?>" class="form-control"> 
                        <input type="submit" value="Enviar" class="btn btn-primary btn-sm">
                        
                        </form>
                        </td>
    </tr>


 
            <?php
    
}
?>

    </table>