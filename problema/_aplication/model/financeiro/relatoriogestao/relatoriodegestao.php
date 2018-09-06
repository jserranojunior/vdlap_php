<?php
include("../../../vdlap/bd/conn.php");
include("../../../vdlap/header.php");
include("classes/dataAtual.class");

if (isset($_POST['data_inicio'])) {
    $data_inicio = $_POST['data_inicio'];
} else {
    $data_inicio = date('Y-m-d');
}

if (isset($_POST['data_fim'])) {
    $data_fim = $_POST['data_fim'];
} else {
    $data_fim = date('Y-m-d');
}

$data_atual = new dataAtual($data_inicio);
$data_final = new dataAtual($data_fim);

$consulta_fixo = $conn->query("SELECT * FROM fornecedor_contas_a_pagar order by fornecedor asc");
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel painelfixo panel-info">

            <div class="panel-body">
                <form action="#" method="POST">

                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <tr>
                            <td>
                                <label for="datainicio">Data para procurar</label>
                            </td>
                            <td>
                                <input type="date" value="<?php echo $data_inicio; ?>" name="data_inicio" class="form-control">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="data_fim">Data para procurar</label>
                            </td>
                            <td>
                                <input type="date" value="<?php echo $data_fim; ?>" name="data_fim" class="form-control">
                            </td>
                        </tr>
                        
                        
                        
                        <tr>
                            <td>
                                <label for="area">Área</label>
                            </td>
                            <td>
                                <select name="area" class="form-control">
                                    <option value="Todos" class="form-control" >Todos</option>
                                    <option value="Vd Lap" class="form-control" >Vd Lap</option>
                                    <option value="CMI" class="form-control" name="">CMI</option>
                                    <option value="Geops" class="form-control" name="">Geops</option>
                                    <option value="LS Star" class="form-control" name="">LS Star</option> 
                                </select>
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <label for="ccustos">Centro de Custo</label>
                            </td>
                            <td>
                                <select name="ccustos" class="form-control">
                                    <option value="Todos" class="form-control" >Todos</option>
                                    <option value="Administrativo" class="form-control" >Administrativo</option>
                                    <option value="Comunicação" class="form-control" name="">Comunicação</option>
                                    <option value="Caixa" class="form-control" name="">Caixa</option>
                                    <option value="Financeiro" class="form-control" name="">Financeiro</option> 
                                    <option value="Fornecedor" class="form-control" name="">Fornecedor</option>
                                    <option value="Imposto" class="form-control" name="">Imposto</option>
                                    <option value="Logística" class="form-control" name="">Logística</option>
                                    <option value="Salário" class="form-control" name="">Salário</option>
                                </select>
                            </td>

                        </tr>

                        <tr>
                            <td>
                                <label for="Conta">Conta</label>
                            </td>
                            <td>
                                <select name="conta" class="form-control">

                                    <option value="Todos" class="form-control">Todos</option>
                                    <option value="Benefícios" class="form-control">Benefícios</option>
                                    <option value="Encargos" class="form-control">Encargos</option>
                                    <option value="Férias" class="form-control">Férias</option>
                                    <option value="Folha<" class="form-control">Folha</option>
                                    <option value="Geops Encargos" class="form-control">Geops Encargos</option>
                                    <option value="Geops-Folha" class="form-control">Geops-Folha</option>
                                    <option value="Impostos" class="form-control">Impostos</option>
                                    <option value="PF - CMI" class="form-control">PF - CMI</option>
                                    <option value="9Recisão" class="form-control">Recisão</option>
                                    <option value="Manutenção" class="form-control">Manutenção</option>
                                    <option value="Reposição" class="form-control">Reposição</option>
                                    <option value="Investimento" class="form-control">Investimento</option>
                                    <option value="Administrativo" class="form-control">Administrativo</option>
                                </select>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <label for="unidade" >Unidade</label>
                            </td>
                            <td>
                                <select name="unidade" class="form-control">
                                    <option value="Todos" class="form-control">Todos</option>
                                    <option value="Hospital São Luiz Itaim">Hospital São Luiz Itaim</option>
                                    <option value="Hospital São Luiz Morumbi">Hospital São Luiz Morumbi</option>
                                    <option value="Hospital Beneficência Portuguesa">Hospital Beneficência Portuguesa</option>
                                    <option value="Hospital Sta. Paula">Hospital Sta. Paula</option>
                                    <option value="Hospital São Luiz Anália Franco">Hospital São Luiz Anália Franco</option>
                                    <option value="Hospital Villa Lobos">Hospital Villa Lobos</option>
                                    <option value="Hospital Edmundo Vasconcelos">Hospital Edmundo Vasconcelos</option>
                                    <option value="Hospital Leforte">Hospital Leforte</option>
                                    <option value="Manutenção - Vd Lap">Manutenção - Vd Lap</option>
                                    <option value="Administração">Administração</option>
                                    <option value="Sala de Estoque">Sala de Estoque</option>
                                    <option value="SLM / SLI">SLM / SLI</option>
                                    <option value="HSLM / HSLI">HSLM / HSLI</option>
                                    <option value="Sala de Descarte">Sala de Descarte</option>
                                    <option value="Folguista">Folguista</option>
                                    <option value="Hospital São Luiz Jabaquara">Hospital São Luiz Jabaquara</option>
                                    <option value="Licença">Licença</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="favorecido" >Favorecido</label>
                            </td>
                            <td>
                                <select name="favorecido"  id="favorecido" class="form-control input_menor">
                                    <option value="Todos">Todos</option>
                                    <?php
                                    while ($fornecedor = $consulta_fixo->fetch(PDO::FETCH_ASSOC)) {
                                        $fornecedor_bd = "{$fornecedor['fornecedor']}";
                                        ?>
                                        <option value="<?php echo $fornecedor_bd; ?>"><?php echo $fornecedor_bd; ?></option>
                                        <?php
                                    }
                                    ?>		   
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pagamento" >Pagamento</label>
                            </td>
                            <td>
                                <select name="pagamento" class="form-control">
                                    <option value="Todos" class="form-control">Todos</option>
                                    <option value="Cheque" class="form-control">Cheque</option>
                                    <option value="Trânsferência" class="form-control">Trânsferência</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="nm_pagamento" >Número Pagamento</label>
                            <td>
                                <input type="number" name="nm_pagamento" class="form-control">
                            </td>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="submit" name="" value="Enviar" class="float-right btn btn-primary">
                            </td>
                        </tr>
                </form>
            </div>
        </div>
    </div>

