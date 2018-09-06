<?php



class portfolio{

    public $view;
    public $itens;
    

    function __construct(){
        
        require('./system/componentes/portfolio/model/portfolio-model.php');
        $objitem = new item();
        
        $itens = $this->itens;
        $item =  $objitem->item;
        $view = $this->view;
        
        $view = file_get_contents('./system/componentes/portfolio/view/portfolio-view.php');
        
        
        foreach ($item as $itens){
       
        $link = "{$itens['link']}";
        $nome = "{$itens['nome']}";
            
        echo str_replace(array("##ITEM##","##NOME##"), array($link,$nome), $view);
     
        }

}

} 
