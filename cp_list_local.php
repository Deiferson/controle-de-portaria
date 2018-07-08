<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySessao();
    else
        $sessao->checkTime();  

    if ($sessao->getNv()!=2)
        header('Location: home.php'); 

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Locais</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>        
        
        <?php  require './inc/menu_cp.inc.php'; ?> 

        <div class="container">
            <table class="table table-striped table table-bordered table table-hover " >
                <thead>
                    <tr class="row">
                        <th class="col-xs-2">Id</th>
                        <th class="col-xs-5">Descrição</th>
                        <th class="col-xs-5"> Opções</th>                      
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $consulta = new LocalPdo();
                        $dados = $consulta->select();

                        foreach($dados as $temp){
                            
                    ?>
                    <tr class="row">
                        <td ><?php echo $temp['id_local'] ?></td>
                        <td ><?php echo $temp['desc_local'] ?></td>

                        
                            <form method="POST" action="cp_update_local.php">
                                <input type="hidden" name="idUpdate" value="<?php echo $temp['id_local'] ?>">
                                <input type="hidden" name="desc" value="<?php echo $temp['desc_local'] ?>">
                                <td ><button class="btn btn-primary" name="update" value="update"> <span class="glyphicon glyphicon-pencil"></span> <b>Atualizar Descrição</b></button></td>
                            </form>
                    </tr>
                    <?php
                            
                        }
                    
                    ?>

                </tbody>
            </table>


        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
