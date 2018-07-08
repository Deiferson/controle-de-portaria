<?php 
    require './inc/config.inc.php';
    $sessao = new Sessao();
    
    session_start();
    
    if(!isset($_SESSION['logado']))
        $sessao->destroySessao();
    else if($_SESSION['nv']!=2)
      header('Location: home.php');   

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Relatório</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>        
        
        <?php  require './inc/menu_cp.inc.php'; ?>                    
       

        <div class="container">
            <ul class="nav nav-tabs">
              <li role="presentation" ><a href="cp_relatorio.php">Entrada e Saída</a></li>
              <li role="presentation" ><a href="cp_relatorio_E.php">Apenas entraram</a></li>
	      <li role="presentation" class="active"><a href="cp_relatorio_S.php">Apenas Saíram</a></li>
              <li role="presentation"><a href="cp_relatorio_F.php">Faltas</a></li>
            </ul> 

            <br>
            <table class="table table-striped table table-bordered table table-hover " >
                <thead>
                    <tr class="row">
						<th >Ra</th>
						<th >Nome</th>
						<th >Periodo</th>
						<th >Curso</th>
						<th >Email</th>	
						<th >Local</th>
						<th >Dia</th>
						<th >Saída</th>
											
                    </tr>
                </thead>
                <tbody>
				
                    <?php
			$consulta = new RelatorioPdo();
                        $dados = $consulta->selectS();

                        foreach($dados as $temp){
                    ?>
                    <tr class="row">
						<td ><?php echo $temp['ra'] ?></td>
						<td ><?php echo $temp['nome'] ?></td>
						<td ><?php echo $temp['periodo'] ?></td>
						<td ><?php echo $temp['curso'] ?></td>
						<td ><?php echo $temp['email'] ?></td>   
						<td ><?php echo $temp['local'] ?></td>
						<td ><?php echo $temp['dia'] ?></td>
						<td ><?php echo $temp['hora'] ?></td>						
                    </tr>
                    <?php }?>
                </tbody>
            </table>

        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
