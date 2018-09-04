<?php

include("../../../model/financeiro/faturaconsolidada/faturaconsolidada.php");
include '../../../view/financeiro/faturaconsolidada/faturaconsolidada.php';
include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php");




$anoatual = date("Y");

if(isset($_POST['ano'])){
    $ano = $_POST['ano'];
}else{
    $ano = date("Y");
}

$fatura = new fatura();

$fatura->nomeMeses();
$fatura->nomeUnidades();


$meses = $fatura->meses;

$unidades = $fatura->unidade;


javascript();
css();

echo '<table class="table table-fora table-responsive  table-bordered" id="table-fora">
    <tr><td colspan="1">
    <div class="col-md-6"><label for="ano">Ano</label></div>
   <div class="col-md-6"> <select type="text" name="ano" class="form-control selectpicker" id="ano"  onchange="this.form.submit()">
    
    
    ';?>

<option value="2016"  <?php if($ano == "2016"){echo "selected";}?>>2016</option>

<option value="2017"  <?php if($ano == "2017"){echo "selected";}?>>2017</option>
<option value="2017"  <?php if($ano == "2018"){echo "selected";}?>>2018</option>

 <?php
            
            echo ' </select></div>
    </td></tr>
    <tr>';

foreach ($meses as $mes) {
$somatotalqtd = 0;
    $total_geral_ganhos = 0;
    $total_geral_proc = 0;

    criarTabelaDentro();

    echo '<td colspan="6" class="text-primary">
        <h4 class="mes_td">' . $mes['mes'] . '</h4>
        </td>
</tr>';

    $count = 0;
    $unidades->execute();

    foreach ($unidades as $unidade_atual) {
         $codigo = "$unidade_atual[cd_codigo]";
         
      
         $mesform = $mes['nm_mes'];
         
         if($codigo == 53){
                    $unidade_px = "HSTR"; 
                }
                if($codigo == 56){
                    $unidade_px = "LAERTE"; 
                }
                
                if($codigo == 57){
                    $unidade_px = "LVC"; 
           }
		   if($codigo == 60){
                    $unidade_px = "HSINO"; 
           }
         
        ?>
         <script type="text/javascript">
             
             
         
             
             
        function enviaForm<?php echo $codigo; ?>($mes){
                        window.open('../../../model/financeiro/faturaconsolidada/editar.php?unidade=<?php echo $unidade_px; ?>&codigo=<?php echo $codigo; ?>&ano=<?php echo $ano?>&mes='+$mes,'<?php echo $codigo; ?>','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=450, height=300');
   }
        </script>
        
        
        <?php
        $count += 1;

       

        $unidade_sigla = "$unidade_atual[nm_sigla]";

            $unidade_sigla = "<p class='text-primary'>$unidade_atual[nm_sigla]</p>";
        if (($codigo == "2") OR ( $codigo == "3")or ( $codigo == "15")or ( $codigo == "38")or ( $codigo == "14")) {
        
            $colspan = 3;
        }

        if (($codigo == "2") OR ( $codigo == "3")or ( $codigo == "15")or ( $codigo == "38")) {
            $i = 1;
        } elseif ($codigo == "20") {
            $i = 0;
            $colspan = 5;
        } else {
            $i = 0;
            $colspan = 4;
        }


       

        echo '<tr><td>
           <table class="table table-hover table-responsive table-bordered">   
    <td  rowspan="' . $colspan . '">' . $count . ' 
    </td>

    <td rowspan="' . $colspan . '" valign="middle" class="td_unidade  bold">';
        
        if(($codigo == "53") or ($codigo == "56") or ($codigo == "57") or ($codigo == "60")){
            echo "<span onclick='enviaForm$codigo($mesform);'>$unidade_sigla</span>";
        }else{
           echo trim($unidade_sigla);
        }
        
echo'
    </td>
    <td class="bold">
        Valor
    </td>
    <td class="bold">';
        
       if(($codigo !== "53")or ($codigo !== "56") or ($codigo !== "57") or ($codigo !== "60")){ echo "Qtd.";
       }else{
           echo "Func.";
       }
    echo '</td>
    <td class="bold">
        Total
    </td>
    <td class="bold">
        Venc.
    </td>

</tr>';


        $total_geral = 0;
        $total_qtd = 0;

    while ($i < 2) {
            
            if(($codigo == "53") or ($codigo == "56") or ($codigo == "57") or ($codigo == "60")){
                
                $mes_hstr = $mes['nm_mes'];
                
                
                    include("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 
                    $hstr = $conn->query("select * from financeiro_consolidado
                        where year(data) = $ano and month(data) =  $mes_hstr
                     and unidade = '$unidade_px'
                    ");
                      
                $i = 1;
               
               
                
            }

            if (($codigo == "2") OR ( $codigo == "3")or ( $codigo == "15")or ( $codigo == "38") or ( $codigo == "14")) {


                $data = $ano . "-" . $mes['nm_mes'] . "-01";
                $data_fim = date('Y-m-d', strtotime('-1 month  -1 day', strtotime($data)));
                $data = date('Y-m-d', strtotime('-2 month', strtotime($data)));
                $data_vencimento = "10/" . $mes['nm_mes'];
                
            }

            if ($codigo == "20") {
                $data = $ano . "-" . $mes['nm_mes'] . "-01";
                $data_fim = date('Y-m-d', strtotime('-1 day', strtotime($data)));
                $data = date('Y-m-d', strtotime('-1 month', strtotime($data)));
                $data_vencimento = "10/" . $mes['nm_mes'];
            }

            if (($codigo == "20")and ( $i == 0)) {
                $rack = "and (a056_codrac = '12')";
                $data_vencimento = "25/" . $mes['nm_mes'];
            } elseif (($codigo == "20")and ( $i == 1)) {
                $rack = "and (a056_codrac = '13')";
                $data_vencimento = "25/" . $mes['nm_mes'];
            } else {
                $rack = " ";
            }



            $i += 1;

            $fatura->consultarProcedimento($codigo, $data, $data_fim, $rack);
            $procedimento = $fatura->procedimento;
            $procedimento->execute();



            foreach ($procedimento as $procedimento_dados) {
                
                if (($codigo == "20")and ( $i == 2)) {
                    $desconto = "$procedimento_dados[desconto]";
                    $vl_procedimento = "430,00";
                }elseif (($codigo == "20")and ( $i == 1)) {
                    $desconto = "$procedimento_dados[desconto]";
                    $vl_procedimento = "300,00";
                }
                else {
                    $vl_procedimento = "$procedimento_dados[valor_procedimento]";
                }

                $qtd_procedimento = "$fatura->quantidadeProcedimentos";
                
                
                
                if($codigo == "14"){
                    $qtd_procedimento = $qtd_procedimento/2;
                    
                     if($data >= "2016-10-01")
               {
                   $vl_procedimento = "$procedimento_dados[valor_procedimento]";
                   
               }
               
                 if($data >= "2017-01-01")
               {
                   $vl_procedimento = "$procedimento_dados[valor_procedimento]";
                   $vl_procedimento = "480,00";
               }
                    
                }else{
                    $qtd_procedimento  = str_ireplace(".", "", $qtd_procedimento );
                    $qtd_procedimento  = str_ireplace(",", ".", $qtd_procedimento );
                    $qtd_procedimento = $qtd_procedimento;
                }
                
                if((($data > "2016-08-01") and ($codigo == "2")) or (($data > "2016-08-01") and ($codigo == "3"))  ){
                    $vl_procedimento = "0";
                   
                }
                if(($codigo == "53")OR ($codigo == "56") OR ($codigo == "57") OR ($codigo == "60")){
                    $desconto = 0;
                    $vl_procedimento = 0;
                     $valor_descontar = 0;
                }
                
                
                 if(($codigo == "53")OR ($codigo == "56") OR ($codigo == "57") OR ($codigo == "60")){
                
                foreach ($hstr as $func){
                $vl_procedimento = "{$func['valor']}";
                $data_hstr = "{$func['data']}";
                $data_vencimento = substr($data_hstr,-2)."/" . $mes['nm_mes'];
                $qtd_procedimento = "{$func['quantidade']}";
                $desconto = "{$func['porcentagemdesconto']}";
                
             $preco = $vl_procedimento;
                                
//                $vl_procedimento = 0;
                }
            }
           
                if(($codigo == "15")and ($data == "2016-10-01")){
                    $qtd_procedimento = 33;
                   
                }elseif(($codigo == "15")and ($data > "2016-10-01")){
                     $vl_procedimento = "0";
                
                }
                
                
                if(($codigo == "38")and ($data == "2016-10-01")){
                    $qtd_procedimento = 37;
                   
                }elseif(($codigo == "38")and ($data > "2016-10-01")){
                     $vl_procedimento = "0";
                
                }
                
                 
              $vl_procedimento  = str_ireplace(".", "",$vl_procedimento );
                $vl_procedimento  = str_ireplace(",", ".", $vl_procedimento );
              
                
               $total = $vl_procedimento * $qtd_procedimento;
                
                $total_geral += $total;
               
                $total_qtd += $qtd_procedimento;



                if (($codigo == "20") and ( $i == 2)) {
                    $valor_descontar = $desconto * $total_geral / 100;
                    $linha_desconto = '<tr><td>Desc.</td><td>10%</td><td>' . number_format($valor_descontar, 2, ',', '.') . '</td><td></td></tr>';
                    $total_geral = $total_geral - $valor_descontar;
                } else {
                    $linha_desconto = "";
                }
                
                if (
                         ($codigo == "53")and ( $i == 2) and ($desconto != "")
                         OR ($codigo == "56") and ( $i == 2) and ($desconto != "")
                         OR ($codigo == "57") and ( $i == 2) and ($desconto != "")
                         OR ($codigo == "60") and ( $i == 2) and ($desconto != "")
                         ){
                     
                    
   $desconto  = str_ireplace(".", "",$desconto );
    $desconto  = str_ireplace(",", ".", $desconto );
   $valor_descontar = $desconto;
    $linha_desconto = '<tr><td>Desc.</td><td></td><td>' . number_format($valor_descontar, 2, ',', '.') . '</td><td></td></tr>';
    $total_geral = $total_geral - $valor_descontar;

    
                }elseif(
                        ($codigo == "53")and ( $i == 2) and ($desconto <= "")
                        OR ($codigo == "56")and ( $i == 2) and ($desconto <= "")
                        OR ($codigo == "57")and ( $i == 2) and ($desconto <= "")
						OR ($codigo == "60")and ( $i == 2) and ($desconto <= "")
                        ){
     $linha_desconto = '<tr><td>Desc.</td><td></td><td>' . number_format($valor_descontar, 2, ',', '.') . '</td><td></td></tr>';

}
            if(($codigo == "20") and ( $i == 2)OR ($codigo == "14")  and ( $i == 2)
                        or ($codigo == "57") and ( $i == 2) 
                        or ($codigo == "56") and ( $i == 2) 
                        or ($codigo == "53") and ( $i == 2)
						or ($codigo == "60") and ( $i == 2)){
                    
                    $total_geral_ganhos += $total_geral;
                    
                }elseif(($codigo == "2") OR ( $codigo == "3") or ( $codigo == "15")or ( $codigo == "38")){
                    $total_geral_ganhos += $total_geral;
                }
                
       
 if($vl_procedimento == ""){
    $vl_procedimento = 0;
                                         
 }

if(($codigo == "2")or ($codigo == "3") or ($codigo == "14") or ($codigo == "15") or ($codigo == "20") or ($codigo == "38")){
       
    
    $vl_procedimento = intval($vl_procedimento);
    $ex_valor = "$vl_procedimento"; 
  
    if($vl_procedimento > ""){
        $ex_valor = number_format($vl_procedimento, 2, ',', '.');
    }
    
 
}

 elseif($vl_procedimento == 0){
       $ex_valor = "0,00";
   }

elseif(($vl_procedimento > 0) and ($codigo == "53") 
        or ($vl_procedimento > 0) and ($codigo == "56")
        or ($vl_procedimento > 0) and ($codigo == "57")
		or ($vl_procedimento > 0) and ($codigo == "60")){

    $ex_valor = number_format($vl_procedimento, 2, ',', '.');
   

}
                echo' 
<tr>
    <td>
      ';
                
                  echo  "$ex_valor";
      
      echo' 
    </td>
    <td>
      ' . "$qtd_procedimento" . '
    </td>
    <td>
        ' . number_format($total, 2, ',', '.') . ' 
    </td>
    <td>
       ' . $data_vencimento . ' 
    </td>
    
</tr>

';
            }
  
        }

     
        
        echo $linha_desconto;
        
        
        $somatotalqtd += $total_qtd;
        
        echo '<tr>
    <td class="bold">
        Total
    </td>
    <td >
    <span class="text-center text-success bold">'.$total_qtd . '</span>
    </td>
    <td>
        <span class="text-center text-primary bold">' . number_format($total_geral, 2, ',', '.') . '</span>
    </td>
   
     <td></td>
</tr>
</td>
</table>';
    }
    echo'
        <tr><td>
<table class="table table-hover td_transparente table-responsive">       
<tr><td colspan="3" class="td-totais bold">
        Total qtd.
        </td>
        <td class="bold text-success">' .  $somatotalqtd . '
        </td>
        <td>
        </td>
        <td>
        </td>
        
        </tr>
        <tr><td colspan="3" class="td-totais  bold">
        A receber
        </td>
        <td>
        </td>
        <td class="text-left bold text-primary">
        ' . number_format($total_geral_ganhos, 2, ',', '.') . '
        </td>
         <td>
        </td>
        
        </tr>
         <tr><td colspan="3" class="td-totais  bold">
        Recebido no mês
        </td>
        <td  colspan="2"><h5 class="bold">R$ ' . number_format($total_geral_ganhos, 2, ',', '.') . '</h5>
        </td>
        <td>
        </td>
        </tr>
        </table>
        </td></tr>
        ';
    echo '</table></td>';
}


echo '</tr></table>';

echo '</form>';