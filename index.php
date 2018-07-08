<!DOCTYPE html>

<html>
	<head>
		<title>Log-In</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>
	<body>
				<div class="loginmodal-container">
					<h1>Login</h1><br>
					  <form method="POST" action="#">
						<input type="text" name="usuario" placeholder="Usuário" required>
						<input type="password" name="senha" placeholder="Senha" required>
						<select  name="idLocal" required> 
							<option value="">Selecionar local</option>
							<?php
								require './inc/config.inc.php';				   
		                    	$consulta = new LocalPdo();
		                    	$dados = $consulta->select();
		                        foreach ($dados as $temp) {
		                            
		                            echo "<option value ='{$temp['id_local']}'>{$temp['desc_local']}</option>";
		                            
		                        }
	                   		?>
	                 	</select>
						<input type="submit" name="login" class="login loginmodal-submit" value="Login">
					  </form>


					<?php

		                if (isset($_POST['login'])) {

		                	if (checkEmpty($_POST)) {
			                    extract($_POST);			                    					
								$localPdo = new LocalPdo();
			                    $local = $localPdo->selectId($idLocal);			                    
			                    $user = new User($usuario, $senha);
			                    $userPdo = new UserPdo();
			                    $dados = $userPdo->checkData($user);

			                    								
			                    $session = new Sessao();
			                    $session->loadSession($dados, $local);

			                }
		                }
		            
		            ?>				  
				  
				</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
