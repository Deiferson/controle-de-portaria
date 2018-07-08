<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Contato</title>
	<head>
	<body>
		<?php
		require './inc/config.inc.php';
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'msgcontatos.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="5">Planilha Mensagem de Contatos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>E-mail</b></td>';
		$html .= '<td><b>Assunto</b></td>';
		$html .= '<td><b>Dataéééé</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
		$consulta = new RelatorioPdo();
		$dados = $consulta->selectF();

		    foreach($dados as $temp){
				$html .= '<tr>';
				$html .= '<td>'.$temp["ra"].'</td>';
				$html .= '<td>'.$temp["nome"].'</td>';
				$html .= '<td>'.$temp["periodo"].'</td>';
				$html .= '<td>'.$temp["curso"].'</td>';	
				$html .= '<td>'.$temp["email"].'</td>';						
				$html .= '</tr>';
			;
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>
</html>