<?php 
   session_start();
   if(isset($_SESSION['logado']) == false){
   $redirect = "/vdlap/_aplication/controller/login/login.php";
   header("location:$redirect");
   }else{
        $usuariologado = $_SESSION['usuario'];
        $usuarioimagem = $_SESSION['foto'];
   }
   
   ?>



<!DOCTYPE html>
<html>
   <head>
      <title>VDLAP</title>
      <?php include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php"); ?>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>


        <div class="col-md-12 col-xs-12" id="menu-topo">
    <div class="col-md-2 col-xs-2 logovdlap">
    
         <div>
            <img class=" logo center-block" src="/vdlap/_aplication/view/img/header/logovdlap.png">
  
    </div>
     </div>
 
            <div class="btn btn-info btn-sm" id="ocultar"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" ></span></div>
            <div class="btn btn-info btn-sm"  id="mostrar"> <span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true" ></span></div>

               <a href="http://192.168.0.100:89/home.asp"><button class="btn btn-warning btn-sm float-right">Sistema Anterior</button></a>
            
         </div>
   
      </div>
     








      <div class="col-md-2 col-xs-4"  id="menu-lateral">
         <div class="profile-sidebar ">
            <!-- SIDEBAR USERPIC -->
            <div class="profile-userpic ">
               <img src="<?php echo $usuarioimagem; ?>" class="img-responsive center-block" alt="">
            </div>
            <!-- END SIDEBAR USERPIC -->
            <!-- SIDEBAR USER TITLE -->
            <div class="profile-usertitle text-center">
               <div class="profile-usertitle-name">
                  <?php echo $usuariologado; ?>
               </div>
               <div class="profile-usertitle-job">
                  Conectado - <a href="/vdlap/_aplication/model/login/sair.php">Sair </a>
               </div>
            </div>
            <div class="drop-menu navbar-collapse profile-usermenu">
               <ul>
                  <li id="menu-item-6" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-6">
                     <a class="glyphicon glyphicon-home dropdown-submenu" href="/vdlap">              Início </a>
                  </li>
                  <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11">
                     <a href="#" class="glyphicon glyphicon-user">            RH</a>
                     <ul class="sub-menu">
                        <li id="menu-item-8" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-8">
                           <a href="/vdlap/_aplication/controller/rh/cadastrodefuncionarios/cadastrodefuncionarios">Cadastro de funcionários</a>
                        </li>
                        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
                           <a href="/vdlap/_aplication/controller/rh/listagemdefuncionarios/listagemdefuncionarios">Listagem de funcionarios</a>
                        </li>
                     </ul>
                  </li>
                  <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11">
                     <a href="#" class="glyphicon glyphicon-wrench">            Manutenção</a>
                     <ul class="sub-menu">
                        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
                           <a href="/vdlap/_aplication/controller/manutencao/dataentregaos/busca">Data de entrega da OS</a>
                        </li>
                        <li id="menu-item-23" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23">
                           <a href="/vdlap/_aplication/controller/manutencao/listagemdeos/datadeentrega">Listagem de entrega da OS</a>
                        </li>
                     </ul>
                     <?php
                        if($usuariologado !== "thiago"){
                        	?>
                  <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11">
                     <a href="#" class="glyphicon glyphicon-piggy-bank">	            Financeiro</a>
                     <ul class="sub-menu">
                        <a href="/vdlap/_aplication/controller/financeiro/contasapagar">Contas a Pagar</a>
                     </ul>
                  </li>
                  <?php
                     }?>
                  <li id="menu-item-11" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-11">
                     <a href="#" class="glyphicon glyphicon-time">	            WIKI</a>
                     <ul class="sub-menu">
                        <a href="/vdlap/_aplication/controller/wiki/index">COISAS A FAZER</a>
                     </ul>
                  </li>
               </ul>






            </div>
         </div>
 </div>
      <!-- FIM BARRA LATERAL -->



 <div class="col-md-10 col-xs-8 col-xs-offset-4 col-md-offset-2" id="conteudo">