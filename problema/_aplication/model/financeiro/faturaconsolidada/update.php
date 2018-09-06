<?php
 include("$_SERVER[DOCUMENT_ROOT]/vdlap/_dados/bd/conn.php"); 


$id = $_POST['id'];
$valor = $_POST['valor'];
$quantidade = $_POST['quantidade'];
$data = $_POST['data'];
$unidade = $_POST['unidade_px'];
$desconto = $_POST['desconto'];

    echo "$desconto<br>";
echo "meu id: $id";
if($id == ""){
    
   try{
                    $hstr = $conn->query("INSERT INTO financeiro_consolidado 
                        (valor, quantidade, data, unidade, porcentagemdesconto) 
                        VALUES ('$valor','$quantidade','$data','$unidade','$desconto')");
                    $hstr->execute();
                     echo "CADASTRADO COM SUECESSO";  
   }catch( PDOException $Exception){
       echo $Exception;
   }

}else{
     try{
    $update = $conn->query("UPDATE financeiro_consolidado SET valor='$valor', quantidade='$quantidade',data='$data', unidade='$unidade', porcentagemdesconto='$desconto' where id='$id' ");
    $update->execute();
    

    echo "ATUALIZADO COM SUECESSO";  
          }catch( PDOException $Exception){
       echo $Exception;
   }
}
?>


<script>
opener.location.reload();
window.close();

</script>