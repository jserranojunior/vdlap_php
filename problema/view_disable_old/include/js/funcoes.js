/* MENU HOVER */


/* ADICIONA MASCARA DE REAL NOS VALORES */
$(document).ready(function () {
 $("#valor").maskMoney({symbol:'', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 });
 

 


/* DEIXAR CONTAS A PAGAR TELA CHEIA */
$(document).ready(function(){

    $('#full-screen').click(function(){
    $('.parte-cima').css("display", "none");
    $('#menu-topo').css("display", "none");
    $('#menu-lateral').css("display", "none");
    $('#conteudo').removeClass('col-md-10');
    $('#conteudo').removeClass('col-md-offset-2');
   	$('#conteudo').addClass('col-md-12'); 
        
        
        $('#conteudo').css("margin-top", "1px");
        
     $('#full-screen').css("display", "none");
     $('div#mini-screen').css("display", "block");
    });
});


$(document).ready(function(){

    $('#mini-screen').click(function(){
    $('.parte-cima').css("display", "block");
    $('#menu-topo').css("display", "block");
    $('#menu-lateral').css("display", "block");
    $('#conteudo').addClass('col-md-10');
    $('#conteudo').addClass('col-md-offset-2');
     $('#conteudo').css("margin-top", "40px");
   	$('#conteudo').removeClass('col-md-12');   
    $('#mini-screen').css("display", "none");
    $('div#full-screen').css("display", "block");
    });
});


$(document).ready(function(){

    $('#removect').click(function(){
         $(".excluirct").toggleClass("ocultar");
    });
});





/* OCULTAR O MENU */
$(document).ready(function(){
    $('#ocultar').on('click',function(){


    $('#menu-lateral').fadeOut('fast');

    
    
     $('#conteudo').removeClass('col-md-offset-2');
     $('#conteudo').removeClass('col-md-10');
    $('#conteudo').addClass('col-md-12');
   
         
          $('#ocultar').css("display", "none");
          $('#mostrar').css("display", "block");
    });

    $('#mostrar').click(function(){

        $('#menu-lateral').fadeIn('slow');
         $('#conteudo').addClass('col-md-10');
$('#conteudo').addClass('col-md-offset-2');

         
$('#mostrar').css("display", "none");
         $('#ocultar').css("display", "block");
    });
 });
 



var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]-->   <meta charset="utf-8"></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()

/*SUBMIT DO EMITIR PAGAMENTO*/
$(document).ready(function(){
$('#emitir').click(function(){
window.open('emitirpagamento/emitirpagamento.php','pagemitir','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=500, height=400');
this.target = 'pagemitir';
$( "#emitirpagamento" ).submit();
    });
}); 


$(document).ready(function(){
$('#editar_valor').click(function(){
window.open('/vdlap/financeiro/editar/editar.php','pagemitir','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=650, height=380');
this.target = 'janelaedicao';
$( "#fazeredicao" ).submit();
    });
}); 



$(document).ready(function(){
$('#ver_cheque').click(function(){
window.open('/vdlap/financeiro/exibircheque/exibircheque.php','pagemitir','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=yes, width=650, height=380');
this.target = 'janelaedicao';
$( "#ver_cheque" ).submit();
    });
}); 



