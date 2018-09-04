
<div class="parte-cima">    
<div class="row">
    <div class="col-md-4">
        <div class="panel painelfixo panel-info">
            <div class="panel-heading">
                <p class="center bold"> Páginas</p>
            </div>
            <div class="panel-body">
                <tr>
                <span>
                    <td>
                       <span class="glyphicon glyphicon-piggy-bank text-success"></span><a href="" onclick="window.open('../../controller/financeiro/chequesemitidos/chequesemitidos.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=0, LEFT=10, WIDTH=800, HEIGHT=750');"> Cheques emitidos</a><br>                          
                      <span class="glyphicon glyphicon-piggy-bank text-success"></span><a href="" onclick="window.open('../../controller/financeiro/transferenciasemitidas/transferenciasemitidas.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=0, LEFT=10, WIDTH=800, HEIGHT=750');"> Transferência</a><br>
                         
                       
                       
                       
                         <span class="glyphicon glyphicon-list-alt text-warning"></span><a href="" onclick="window.open('../../controller/financeiro/faturaconsolidada/faturaconsolidada.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=0, LEFT=0, WIDTH=1200, HEIGHT=790');"> Fatura Consolidado</a><br>
                         
                        <span class="glyphicon glyphicon-list-alt text-warning"></span><a href="" onclick="window.open('http://192.168.0.100:89/financeiro/fatura3.asp', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=50, LEFT=10, WIDTH=850, HEIGHT=700');"> Emissão de faturas</a><br>
                        <span class="glyphicon glyphicon-wrench text-primary"></span><a href="" onclick="window.open('http://192.168.0.100:89/manutencao_2/cad_orc_aprov.asp?tipo=financ', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=50, LEFT=10, WIDTH=850, HEIGHT=700');"> Orçamentos aprovados</a><br>
                           <span class="glyphicon glyphicon-wrench text-primary"></span>
                           
                           <a href="" onclick="window.open('http://192.168.0.100:89/manutencao_2/rel_orc_aprov_2.asp?tipo=financ&mes_sel=<?php echo"$mes_atual"; ?>&ano_sel=<?php echo "$ano"; ?>&mais_um_mes=                        ', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=0, LEFT=10, WIDTH=850, HEIGHT=790');"> Relatório manut. Reposi.</a><br>
                    
                    
                   </td>
                </span>
                </tr>
            </div>
        </div>
    </div>
    <!-- PANEL 1 -->

    <div class="col-md-4 ">
        <div class="panel painelfixo panel-info">
            <div class="panel-heading">
                <form method="post" action="#">
                      <p class="center bold"> Diário de <?php echo "$mes_escrito"; ?> de  <?php echo "$ano"; ?>  </p>
            </div>
            <div class="panel-body">
                <div class="col-md-6">
                    <label for="option_mes">Mês</label>
                    <ul class="nav nav-tabs">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <a  href="#"><?php echo"$mes_escrito"; ?>
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="../financeiro/contasapagar.php?mes_atual=01&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Janeiro</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=02&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Fevereiro</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=03&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Março</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=04&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Abril</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=05&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Maio</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=06&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Junho</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=07&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Julho</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=08&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Agosto</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=09&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Setembro</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=10&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Outubro</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=11&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Novembro</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=12&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>">Dezembro</a></li>

                            </ul>
                        </div>



                    </ul>
                </div>
                <div class="col-md-6">            
                    <label for="ano">Ano</label>


                    <ul class="nav nav-tabs">



                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle widcem" type="button" id="dropdownMenu1" data-toggle="dropdown" >
                                <a  href="#"><?php echo"$ano"; ?>
                                    <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php
                                $ano = 2011;
                                $ano_maior = $ano + 10;

                                while ($ano < $ano_maior) {
                                    ?>
                                    <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo $ano; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>"><?php echo $ano; ?></a></li>
                                    <?php
                                    $ano = $ano + 1;
                                }
                                if (isset($_GET['ano'])) {
                                    $ano = $_GET['ano'];
                                } else {
                                    $ano = date('Y');
                                }
                                $ano_certo = $ano;
                                $ano_proximo = $ano;

                                if ($mes_atual == '01') {
                                    $ano_certo = $ano_anterior;
                                }
                                if ($mes_atual == '12') {
                                    $ano_proximo = $ano + 1;
                                }
                                ?>
                            </ul>
                        </div>



                    </ul>
                </div>
                </form>

                <div class="col-md-12 text-center pager">  

                    <a class="btn btn-default btn-xs" href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_anterior"; ?>&ano=<?php echo"$ano_certo"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>"
                       >

                        <p class="glyphicon glyphicon-menu-left"></p> Anterior </a>

                    <a class="btn btn-default btn-xs"  href="../financeiro/contasapagar.php">Atual</a> 

                    <a class="btn btn-default btn-xs"  href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_posterior"; ?>&ano=<?php echo"$ano_proximo"; ?>&area=<?php echo"$area"; ?>&ordem=<?php echo"$ordem"; ?>"
                       >
                        Próximo<p class="glyphicon glyphicon-menu-right"></p>
                    </a>
                </div>


                <div class="col-md-12"> 

                    <a class="esquerda btn btn-primary btn-sm"   href="#" onclick="window.open('../../../_aplication/view/financeiro/cadastrarconta/cadastrodenovaconta.php?data_atual=<?php echo $data_atual; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=150, LEFT=200, WIDTH=450, HEIGHT=620');" >
                        (+)  Incluir </a>
                    
                    
                    <?php
                    
              

$mes_atual = substr($data_atual, 5);
$ano_atual = substr($data_atual, 0, -3);     
                    
                    
                    $consulta = $connold->query("SELECT *
FROM [VdLap].[dbo].[TBL_manutencao_orcamento]
where cd_status = '0' and dt_entrega > '' and inserido IS NULL
       ;");
                    
                     
       $contador = "";
           foreach($consulta as  $lcount) {
               $contador = $contador + 1;
           }
                  
                 ?>   
                    


                    <a class="direita btn btn-warning btn-sm"   href="#" onclick="window.open('../../controller/financeiro/orcamentosaprovados/orcamentos.php?data_atual=<?php echo $data_atual; ?>', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=NO, TOP=200, LEFT=290, WIDTH=850, HEIGHT=500');" >
                     Aprovados <span class="badge"><?php echo $contador; ?></span></a> 
                </div>
            </div>
        </div>
    </div><!--FECHAMENTO PAINEL 2 -->






    <div class="col-md-4 ">
        <div class="panel panel-info">


            <div class="panel-heading">
                <p class="center bold">Legenda</p>
            </div>

            <div class="panel-body"> 

 <div class="col-md-6 ">
 <img src="/vdlap/_aplication/view/img/contasapagar/chequeemitido.png"> Cheque Emitido<br>
 <img src="/vdlap/_aplication/view/img/contasapagar/maisseteporcento.png"> Maior que 7%<br>
 <img src="/vdlap/_aplication/view/img/contasapagar/transferencia.png"> Transferência<br>
 <img src="/vdlap/_aplication/view/img/contasapagar/selecionado.png"> Selecionado
 </div>
   <div class="col-md-6 ">
     <img src="/vdlap/_aplication/view/img/contasapagar/menosseteporcento.png"> Menor que 7%<br>
      <img src="/vdlap/_aplication/view/img/contasapagar/orcamento.png"> Orçamento<br>
          <img src="/vdlap/_aplication/view/img/contasapagar/naoselecionado.png"> Não selecionado<br>
           <img src="/vdlap/_aplication/view/img/contasapagar/naohavalor.png"> Não há valor
 </div> <div class="col-md-6 ">
  <input class="btn btn-primary emitir btn-sm" type="submit" id="emitir" value="Emitir Pagamento"> 

</div>

</div>

 
        </div>
    </div>




</div>
</div>

       <div class="row">     
                <div class="col-md-4">
                  
                    <ul class="nav nav-tabs">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
<?php
if ($area == "") {

echo "Todos";
} else {
echo"$area";
}
?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=&ordem=<?php echo"$ordem"; ?>&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">Todos</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=Vd Lap&ordem=<?php echo"$ordem"; ?>&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">Vd Lap</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=CMI&ordem=<?php echo"$ordem"; ?>&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">CMI</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=LS Star&ordem=<?php echo"$ordem"; ?>&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">LS Star</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
<?php
if (isset($_GET['ano'])) {

$ano = $_GET['ano'];
} else {
$ano = date('Y');
}
?>

                <div class="col-md-3">
                  
                    <ul class="nav nav-tabs">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo"$ordem_name"; ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=Alfabética&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">Alfabética</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=Cronológica&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">Cronológica</a></li>
                                <li><a href="../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&ordem=Tipo&diaFinal=<?php echo"$diaFinal"; ?>&diaInicial=<?php echo"$diaInicial"; ?>">Tipo</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <div class="col-md-4 col-md-offset-1 ">
                <div class="col-md-3 col-md-offset-1">
                   <input type="number" class="form-control" value="<?php echo"$diaInicial"; ?>" name="diaInicial" id="diaInicial" placeholder="Dia Inicial">
                
                </div>

                <div class="col-md-3">
                    <input type="number" class="form-control"  value="<?php echo"$diaFinal"; ?>" name="diaFinal" id="diaFinal" placeholder="Dia Final">
                </div>
                    
                <script>
                function filtroDia(){
                        diaInicial = $('#diaInicial').val();
                       diaFinal = $('#diaFinal').val();
                       link =  '../financeiro/contasapagar.php?mes_atual=<?php echo"$mes_atual"; ?>&ano=<?php echo"$ano"; ?>&area=<?php echo"$area"; ?>&diaFinal='+diaFinal+'&ordem=<?php echo"$ordem";?>&diaInicial='+diaInicial;
                        window.location.replace(link); 
                    }
                    
                    $(document).ready(function(){
                        $('#diaInicial').val("<?php echo"$diaInicial"; ?>");
                        $('#diaFinal').val("<?php echo"$diaFinal"; ?>");

                       if( $('#diaInicial').val() < 1){
                        $('#diaInicial').val(1);
                       }

                       if( $('#diaFinal').val() < 1){
                        $('#diaFinal').val("<?php echo("$ultimo_dia_mes"); ?>");
                        filtroDia()
                       }
                       
                    });

                    
                
                    $('#diaInicial').change(function() {                            
                       filtroDia();                  
                    });
                    $('#diaFinal').change(function() {                            
                        filtroDia();                     
                    });
                </script>



                <div class="glyphicon glyphicon-remove btn btn-danger btn-sm" id="removect"></div>
                    <div class="glyphicon glyphicon-fullscreen btn btn-info btn-sm" id="full-screen"></div>
                    <div class="glyphicon glyphicon-fullscreen btn btn-info btn-sm " id="mini-screen"></div>
                    <input type="button" class="btn btn-success excel btn-sm" onclick="tableToExcel('tabelaprincipal', 'Contas a pagar')" value="Excel">
                    
                </div>
          </div>
          

          
                <table  class=" table table-condensed table-striped table-bordered table-hover" id="tabelaprincipal">
                    <thead>
                        <tr>
                        
                        <td>
                        </td>
                            <td>
                                <p class="bold"> Área </p>
                            </td>
                            <td>
                                <p class="bold">C.C</p>
                            </td>
                            <td>
                                <p class="bold">Conta</p>
                            </td>
                            <td>
                                <p class="bold">Tipo</p>
                            </td>
                            <td>
                                <p class="bold">Pg</p>
                            </td>
                            <td>
                                <p class="bold">Favorecido</p>
                            </td>
                            <td>
                                <p class="bold">Anterior</p>
                            </td>
                            <td>
                                <p class="bold">Venc</p>
                            </td>
                            <td>
                                <p class="bold">Atual</p>
                            </td>
                            <td>
                                <p class="bold">Extra</p>
                            </td>
                            <td>
                                <p class="bold">7%</p>
                            </td>
                            <td class="excluirct ocultar">
                             <div class="text-center">
<p class="bold glyphicon glyphicon-remove"></p>
</div>
                            </td>
                    </thead>
                    <tbody>
                 
<?php




