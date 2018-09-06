<?php
require ("../../../_dados/bd/conn.php"); 

$nomeusuario = $_POST['usuario'];
$senhadousuario = $_POST['senha'];


$consulta = $conn->query("SELECT login, senha,foto FROM usuarios WHERE login = '$nomeusuario'"); 
$valor = $consulta->fetch(PDO::FETCH_ASSOC);

session_start(); 

$nome = $valor['login'] ;
$senha = $valor['senha'];
$foto = $valor['foto'];

echo $nome . $senha;


if($nome == $nomeusuario and $senha == $senhadousuario){

$_SESSION['usuario'] = $nome; 
$_SESSION['foto'] = $foto; 
$_SESSION['logado'] = true;

$usuariologado = $_SESSION['usuario']; 
echo $_SESSION['usuario'];

$redirect = "/vdlap/";
header("location:$redirect");

}else{

    echo "usuario errado";
$redirect = "../../../_aplication/controller/login/login.php";
header("location:$redirect");

}

