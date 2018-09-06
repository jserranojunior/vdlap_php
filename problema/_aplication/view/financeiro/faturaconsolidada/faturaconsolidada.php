<?php 


function css(){
    echo '<style>
   td {
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.25);
        background-color: #fff;
       
}

.table-fora{
    text-align: center;
            background-color: #ffffff;
      
}

.table-dentro {
    margin-left: 0px;
    width: 300px! important;
    box-shadow: 0px 0px 0px 2px rgba(23, 78, 232, 0.18);
    text-align: center;
    border: 1px solid #fff! important;
}

.table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
    vertical-align: middle! important;
}
td#table-fora{
    border: 1px solid #fff! important;
    }

td.td_unidade {
        width: 69px! important;
}

.table{
text-align:center;
    margin-bottom: -5px! important;
    
    }
    
.td-totais{
width: 88px! important;
}

td{
    padding: 2px! important;
    }
    
table.table.table-hover.td_transparente.table-responsive > tbody > tr > td {
    vertical-align: middle! important;
}
    
h4.mes_td {
    margin-top: 0px;
    color: black;
    margin-bottom: 0px;
    background-color: rgb(217, 238, 247);
}

#table-dentro > tbody >tr {
    border-top: 2px solid rgb(232, 232, 232)! important;
    margin: 0px;
    padding: 0px;
}

</style>
<form action="#" method="post">
';
}

function javascript(){
    echo '<script type="text/javascript">
        jQuery(window).load(function() {
            jQuery("#loader").delay(2000).fadeOut("slow");
        });
    </script>
    <div id="loader"></div>'
    ;
}



function criarTabelaDentro(){
  echo  '<td><table class="table table-dentro table-responsive" id="table-dentro">
<tr>    
';
}





