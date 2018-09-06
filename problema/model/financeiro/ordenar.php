 <?php 
   if(isset($_GET['area'])){
       $area = $_GET['area'];
   }else{
   $area = "";
   };   
   
   if($area == ""){
   $area_select = "";
               }else{
   $area_select = "AND (area = '$area')";
               }


   if(isset($_GET['ordem'])){
       $ordem = $_GET['ordem'];
   $select_ordem = $ordem;
   
   if($select_ordem == "Alfabética"){
   $select_ordem = "ORDER BY (favorecido) asc";
   $ordem_name = "Alfabética";
   }
   
   if($select_ordem == "Tipo"){
   $select_ordem = "ORDER BY (tipo) asc";
   $ordem_name = "Tipo";
   }
   
   if($select_ordem == "Cronológica"){
   $select_ordem = "ORDER BY (dia_mes) asc";
   $ordem_name = "Cronológica";
   }
   
   
   }else{
   $select_ordem = "ORDER BY (favorecido) asc";
   $ordem = "Alfabética";
   $ordem_name = "Alfabética";
   };
   
   
   if(isset($_GET['mes_atual'])){
       $mes_atual = $_GET['mes_atual'];
   }else{
   $mes_atual = date('m');
   };
   
  if(isset($_GET['ano'])){
       $ano = $_GET['ano'];
   }else{
   $ano = date('Y');
   
   };
   
   $data_atual = "$ano-$mes_atual";
   switch ($mes_atual){
             case 01:
               $mes_anterior = "12";
               $mes_segundo_anterior = "11";
               $mes_escrito = "Janeiro";
               $mes_posterior = "02";
               break;
             case 02:
                 $mes_anterior = "01";
                 $mes_segundo_anterior = "12";
                 $mes_escrito = "Fevereiro";
                 $mes_posterior = "03";
               break;
             case 03:
                 $mes_anterior = "02";
                 $mes_segundo_anterior = "01";
                 $mes_escrito = "Março";
                 $mes_posterior = "04";
               break;
             case 04:
                 $mes_anterior = "03";
                 $mes_segundo_anterior = "02";
                 $mes_escrito = "Abril";
                 $mes_posterior = "05";
               break;
             case 05:
                 $mes_anterior = "04";
                 $mes_segundo_anterior = "03";
                 $mes_escrito = "Maio";
                 $mes_posterior = "06";
               break;
         	  case 06:
                 $mes_anterior = "05";
                      $mes_segundo_anterior = "04";
                 $mes_escrito = "Junho";
                 $mes_posterior = "07";
               break;
         	  case 07:
                 $mes_anterior = "06";
                      $mes_segundo_anterior = "05";
                 $mes_escrito = "Julho";
                 $mes_posterior = "08";
               break;
   
   
               
             case 09:
                 $mes_anterior = "08";
                 $mes_segundo_anterior = "07";
                 $mes_escrito = "Setembro";
                 $mes_posterior = "10";
               break;
   
         	  case 10:
                 $mes_anterior = "09";
                      $mes_segundo_anterior = "08";
                 $mes_escrito = "Outubro";
                 $mes_posterior = "11";
               break;
         	  case 11:
                 $mes_anterior = "10";
                      $mes_segundo_anterior = "09";
                 $mes_escrito = "Novembro";
                 $mes_posterior = "12";
               break;
         	  case 12:
                 $mes_anterior = "11";
                      $mes_segundo_anterior = "10";
                 $mes_escrito = "Dezembro";
                 $mes_posterior = "01";
               break;
           }
        if($mes_atual == "08"){
                 $mes_anterior = "07";
                 $mes_segundo_anterior = "06";
                   $mes_escrito = "Agosto";
                   $mes_posterior = "09";
                 }
   
     if($mes_atual == "09"){
                 $mes_anterior = "08";
                 $mes_segundo_anterior = "07";
                      $mes_escrito = "Setembro";
                      $mes_posterior = "10";
                 }
   
       $ano_anterior = $ano;
       $ano_segundo_anterior = $ano;
       
      if ($mes_atual == "01"){
         
         $ano_anterior = $ano - 1;
         }
     if ($mes_anterior == "01"){
         $ano_segundo_anterior = $ano - 1;
     }
     if ($mes_anterior == "12"){
         $ano_segundo_anterior = $ano - 1;
     }   
     
     
   
         $data_anterior = "$ano_anterior-$mes_anterior";
         $data_atual = "$ano-$mes_atual";
         $data_segundo_anterior = "$ano_segundo_anterior-$mes_segundo_anterior"; 
         $data_atual_dia = "$ano-$mes_atual-10";
         $soma_mes_anterior = 0;
          
 
   $data = date("Y-m-d"); 