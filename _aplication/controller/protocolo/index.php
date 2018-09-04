<?php

 include("$_SERVER[DOCUMENT_ROOT]/vdlap/_aplication/view/include/include.php");
 


try {
    $connold = new PDO('sqlsrv:Server=smartnew\sqlnewserver;Database=Vdlap', 'sa', '@fgh55qdy');
	$connold->exec("SET CHARACTER SET utf8");
    $connold->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>

<html lang="pt-br">
    <head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
</body>
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Protocolos
            </div>
            <div class="panel-body">
                <form action="./exibir/imprimir.php"  method="post" name="formProtocolo">
                
                    <div class="form-group">
                        </label for="unidade">Unidade</label class="form-control">
                        <select name="unidade" class="form-control">
                            <option value="60">Sino</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dtInicio" class="form-control">Data Inicio</label>
                        <input class="form-control" type="date" name="dtInicio">
                    </div>

                    <div class="form-group">
                        <label for="dtFim" class="form-control">Data Final</label>
                        <input class="form-control" type="date" name="dtFim">
                    </div>

                    <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Exibir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>