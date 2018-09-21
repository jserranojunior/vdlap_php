<?php

 include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php");
 




 include("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php");
?>

<html lang="pt-br">
    <head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<style>
@media print {
    .table { 
        page-break-after: always; 
    }

contents {
    display: block;
    page: table-of-contents;
    counter-reset: page 1
}
@page {
  @bottom-right {
    content: counter(page) " of " counter(pages);
  }
}
}


</style>

</head>
</body>





<div class="container">
    <div class="row">
     


<?php


$num_hospital= $_POST['unidade'];
$dataInicio = $_POST['dtInicio'];
$dataFim = $_POST['dtFim'];


$count = 0;
$countPage = 0;
$array_rack = array();

$select_hack = ("SELECT DISTINCT A056_desrac as num_rack FROM VIEW_protocolo_lista AS A 
WHERE (cd_co <> '1') AND (A002_datpro BETWEEN '$dataInicio' AND '$dataFim') AND (A053_codung = '$num_hospital') AND (cd_cancelado IS NULL)");
$consulta_hack = $connold->prepare("$select_hack");
$consulta_hack->execute();





$sql = ("select distinct A.cd_protocolo as cd_protocolo, A.A002_datpro as data, A.A002_pacreg as numeroregistro, A.cd_protocolo as cd_protocolo, A.A002_numpro as contagem,  A.A002_pacnom as nomepaciente,
    A.Expr2 nomeseguro, A.A055_desmed nomemedico,  D.A056_desrac as rack
FROM VIEW_protocolo_lista as A 
LEFT JOIN TBL_Rack as D ON D.a056_codrac = A.A056_codrac 
where A.A002_datpro BETWEEN '$dataInicio' and '$dataFim' 
and A.a053_codung = '$num_hospital' AND cd_co <> '1' AND A.cd_cancelado is null


 ");


$num_hacker = 'VDLAP';

$consulta = $connold->prepare("$sql order by data asc");
$consulta->execute();
$countPage = $countPage + 1;


$dataAtual= date('d/m/Y');
?>

<STYLE>	
thead { display: table-header-group; }
tfoot { display: table-footer-group; } 
.logo-tabela {
    width: 80px;
}
     </STYLE>



<table class="table table-condensed table-striped table-bordered table-hover">
                <thead>
                <tr>
                    	 
                    <td colspan="2" rowspan="3">
                        <img class="img-responsive logo-tabela" src="..\..\..\view\img\header\logocmi.png"> 
                    <td colspan="5"> 
                  
                     
                        <p class="text-center">CMI Cirúrgica LTDA</p>
                          <p  class="text-center">Data de emissão <?php echo "$dataAtual"; ?></p>
                    </td>
                   
                </tr>
                <tr>
                    <td colspan="5" class="text-center">
                    RELATÓRIO DE PROCEDIMENTOS MÉDICOS 
                        Hospital Sino Brasileiro
                        de  <?php echo date('d/m/Y', strtotime($dataInicio)); ?> até <?php echo date('d/m/Y', strtotime($dataFim)); ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="5" class="text-center">
                        Procedimentos Médicos Realizados com Rack da CMI 
                    </td>
                </tr>

                 <tr class="text-primary">
                        <td>N°</td>
                        <td>Data</td>
                        <td>Paciente</td>
                        <td>Reg</td>
                        <td>Cirurgia</td>
                        <td>Convênio</td>
                        <td>Equipe Médica</td>
                        
                    </tr>
                </thead>
                   
                <tbody>

 <?php

    
 $procedimento_soma = 0;

 
  while($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
             
             $procedimento_soma = $procedimento_soma + 1;
             
            
            $data_consulta = "{$linha['data']}";
            $data_consulta = date('d/m/y', strtotime($data_consulta));
            
            $cd_protocolo = "{$linha['cd_protocolo']}";




$select_procedimento = (" select top 1 B.A058_codpro,
(select top 1 C.nm_procedimento from TBL_Procedimento as C where cd_codigo = B.A058_codpro)[nomeprocedimento]
 from TBL_Protocolo_Procedimento as B where B.cd_protocolo = $cd_protocolo
");

$select_procedimento = $connold->prepare("$select_procedimento");
$select_procedimento->execute();
            
        $procedimentos = $select_procedimento->fetch(PDO::FETCH_ASSOC);
            
            $nome_procedimento = substr("{$procedimentos['nomeprocedimento']}", 0,36);
            

            $count = $count + 1;
            ?>

               


                <tr>
                    <td>
                        <?php echo $count ?> 
                    </td>
                    <td>
                            <?php echo $data_consulta ?>
                    </td>        
                    <td>
                            <?php echo "{$linha['nomepaciente']}" ?>
                    </td> 
                    <td>
                            <?php echo "{$linha['numeroregistro']}" ?>
                    </td>        
                    <td>
                             <?php echo $nome_procedimento; ?>
                    </td>         
                    <td>  
                           <?php echo "{$linha['nomeseguro']}" ?>
                    </td>       
                    <td>   
                         <?php echo "{$linha['nomemedico']}" ?>
                    </td>
                    
                </tr>

                

  <?php }
           
           $procedimento = $procedimento_soma;
           
           
           array_push($array_rack, array('num_rack' => $num_hacker, 'soma_rack' => $procedimento_soma));
           
           ?>
            </tbody>
            <tfoot>   
            <tr> 
            <td>
            </td>
            </tr>
                <tr> 	 
                <td colspan="7" class=" text-primary">
                <b>Procedimentos realizados com Rack <?php echo "CMI - TOTAL: $procedimento_soma"; ?></b>
                </td> 
                </tr>
            </tfoot> 

          
                
        </table>
          <?php
         
       
                

                
               
                
                
                ?>



                

    </div>
</div>

<?php

/*
 "&rack_cirurgiao&"  
 Group by dt_ano, dt_mes,a053_codung, nm_sigla,nm_sigla ORDER BY dt_ano, dt_mes"
		*/

        ?>