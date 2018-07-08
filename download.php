<!DOCTYPE html>
<html lang="pt-br">
    <head>        
        <meta charset="utf-8">
        <title>Relatório</title>        
    </head>
    <body>
<?php 
    require './inc/config.inc.php';

    if (isset($_GET['r']))
    	extract($_GET);

    if ($r==1) {
    	$tabela = "     
	    <table border='1'>
	    <tr>
	    	<td colspan='9'>Resgistros de entrada e saída</td>
	    </tr>
	    <tr>
			<td >Ra</td>
			<td >Nome</td>
			<td >Periodo</td>
			<td >Curso</td>
			<td >Email</td>	
			<td >Local</td>
			<td >Dia</td>
			<td >Entrada</td>
			<td >Saída</td>						
	    </tr>";
					

		$consulta = new RelatorioPdo();
		$dados = $consulta->select();

		        foreach($dados as $temp){

			$tabela .= "<tr>
					<td>{$temp['ra']}</td>
					<td>{$temp['nome']}</td>
					<td>{$temp['periodo']}</td>
					<td>{$temp['curso']}</td>
					<td>{$temp['email']}</td>   
					<td>{$temp['local']}</td>
					<td>{$temp['dia']}</td>
					<td>{$temp['entrada']}</td>
					<td>{$temp['saida']}</td> 
		            </tr>";
			}                

		    $tabela .= "</table>";
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"Relatório Entrada e saída.xls\"" );
		header ("Content-Description: PHP Generated Data" );

		echo $tabela;
	}

	if($r==2){
    	$tabela = "     
	    <table>
	    <tr>
	    	<td colspan='8'>Registros de entrada sem saída</td>
	    </tr>
	    <tr>
		<td >Ra</td>
		<td >Nome</td>
		<td >Periodo</td>
		<td >Curso</td>
		<td >Email</td>	
		<td >Local</td>
		<td >Dia</td>
		<td >Entrada</td>					
	    </tr>";
					

		$consulta = new RelatorioPdo();
		$dados = $consulta->selectE();

		        foreach($dados as $temp){

			$tabela .= "<tr>
					<td>{$temp['ra']}</td>
					<td>{$temp['nome']}</td>
					<td>{$temp['periodo']}</td>
					<td>{$temp['curso']}</td>
					<td>{$temp['email']}</td>   
					<td>{$temp['local']}</td>
					<td>{$temp['dia']}</td>
					<td>{$temp['hora']}</td>
		            </tr>";
			}                

		            $tabela .= "</table>";
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"Relatório Entrada e saída.xls\"" );
		header ("Content-Description: PHP Generated Data" );

		echo $tabela;
	}

	if($r==3){
    	$tabela = "     
	    <table>
	    <tr>
	    	<td colspan='8'>Registros de saída sem entrada</td>
	    </tr>
	    <tr>
		<td >Ra</td>
		<td >Nome</td>
		<td >Periodo</td>
		<td >Curso</td>
		<td >Email</td>	
		<td >Local</td>
		<td >Dia</td>
		<td >Saida</td>					
	    </tr>";
					

		$consulta = new RelatorioPdo();
		$dados = $consulta->selectS();

		        foreach($dados as $temp){

			$tabela .= "<tr>
					<td>{$temp['ra']}</td>
					<td>{$temp['nome']}</td>
					<td>{$temp['periodo']}</td>
					<td>{$temp['curso']}</td>
					<td>{$temp['email']}</td>   
					<td>{$temp['local']}</td>
					<td>{$temp['dia']}</td>
					<td>{$temp['hora']}</td>
		            </tr>";
			}                

		            $tabela .= "</table>";
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"Relatório Entrada e saída.xls\"" );
		header ("Content-Description: PHP Generated Data" );

		echo $tabela;
	}

	if($r==4){
    	$tabela = "     
	    <table>
	    <tr>
	    	<td colspan='4'>Faltas</td>
	    </tr>
	    <tr>
		<td >Ra</td>
		<td >Nome</td>
		<td >Periodo</td>
		<td >Curso</td>
		<td >Email</td>					
	    </tr>";
					

		$consulta = new RelatorioPdo();
		$dados = $consulta->selectF();

		        foreach($dados as $temp){

			$tabela .= "<tr>
					<td>{$temp['ra']}</td>
					<td>{$temp['nome']}</td>
					<td>{$temp['periodo']}</td>
					<td>{$temp['curso']}</td>
					<td>{$temp['email']}</td>
		            </tr>";
			}                

		            $tabela .= "</table>";
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"faltas.xls\"" );
		header ("Content-Description: PHP Generated Data" );

		echo $tabela;
	}


	?>
</body>
</html>