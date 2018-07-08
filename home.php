<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySessao();
    else
        $sessao->checkTime();  

    if ($sessao->getNv()!=1)
        header('Location: cp.php'); 

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        
        <?php require './inc/menu.inc.php'; ?> 

        <div class="container">
        
            <a href="entrada.php"> <button class="bt bt-entrada" type="button" >REGISTRAR ENTRADA</button></a>          
            <a href="saida.php"><button class="bt bt-saida" type="button"  href="#">REGISTRAR SAÍDA</button></a>       
            
        </div>

        
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
