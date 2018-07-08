<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySession();   

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Atualizar Senha</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>        
        
        <?php
        if($sessao->getNv()==1)
          require './inc/menu.inc.php';
        if($sessao->getNv()==2)
          require './inc/menu_cp.inc.php';

         ?>


        <div class="container">
          <div class="row">
            <form class="col-xs-5" method="POST" action="#">
            	<div class="form-group">
                <label for="exampleInputPassword1">Senha atual :</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="senha_atual">
               </div>
               <div class="form-group">
            		<label for="exampleInputPassword1">Nova senha :</label>
                	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="nova_senha">
                </div>
                <div class="form-group">
                	<label for="exampleInputPassword1">Confirmar senha :</label>
                	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="confirmar_senha">
              	</div>
              
              	<button name="confirmar" value="confirmar" class="btn btn-primary">confirmar</button>
            </form>
            
          	</div>
          	<br>

          	<?php              
                if (isset($_POST['confirmar'])) {
                	
            		if (checkEmpty($_POST)) {
                		extract($_POST);                		

                		$user = new User($sessao->getLogin(), $senha_atual);
	                  	$userPdo = new UserPdo();

	                  	$dados = $userPdo->checkData($user, true);

	                	if (compare($nova_senha, $confirmar_senha)) {
	                		$user = new User($sessao->getLogin(), $nova_senha);
	                  		$userPdo = new UserPdo();
	                  		$dados = $userPdo->updatePass($user);
	                	}		                
              		}
                }
            ?>  




        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
