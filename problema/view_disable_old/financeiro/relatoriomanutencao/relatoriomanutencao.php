<?php require ("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); ?>
<?php include ("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>


<?php 

    $select = $connold->query("select distinct * from tbl_manutencao_orcamento "
            . "where year(dt_entrega) = '2016' and month(dt_entrega) > '01' and month(dt_entrega) < '07' and nr_parcela > '1'");
    $select->execute();
    
    $count = 0;
?>



<div class="content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <p>Relatório para provisão de pagamento de orçamentos aprovados</p>
            <p>Mes</p>
            
        </div>
            
    </div>
    
    <table class="table-bordered table-condensed table-hover table-responsive table table-striped">
        <tr><td colspan="7">Compromissos - Pagamentos no "Contas a Pagar" - MES/ANO</td></tr>
        <tr>
            <td>N°</td>
            <td>N° Orç.</td>
            <td>
              Fornecedor  
            </td>
            <td>
               Data Entrega
            </td>
            <td>
                Valor Total
            </td>
            <td>
                QTD Parc.
            </td>
            <td>
                Mes valor
            </td>
        </tr>
        
        <?php foreach($select as $conta){
        
            $count += 1;
            $numero_orcamento = $conta['nr_orcamento'];
            $fornecedor = $conta['cd_fornecedor'];
            $data_entrega = $conta['dt_entrega'];
            $valor_total = $conta['nm_valor'];
            $qtd_parcela = $conta['nr_parcela'];
            $mes_atual = $conta['dt_orcamento'];
            
            ?>
        <tr>
            <td>
                <?php echo $count;?>
            </td>
            <td>
                <?php echo $numero_orcamento;?>
            </td>
            <td>
                <?php echo $fornecedor;?>
            </td>
            <td>
                <?php echo $data_entrega;?>
            </td>
            <td>
                <?php echo $valor_total;?>
            </td>
            <td>
                <?php echo $qtd_parcela;?>
            </td>
            <td>
                <?php echo $mes_atual;?>
            </td>
        </tr>
        
        <?php
         }
        ?>
    </table>
    
    
</div>

