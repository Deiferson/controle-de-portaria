<?php
class RelatorioPdo extends Conn
{
	private $Result = null;
	private $Create;
	private $Conn;
	private $Select;

	public function __construct()
	{
	$this->Conn = parent::getConn();
	}

	public function __destruct()
	{        
	}
    
	public function select()
	{
		try {
		    $this->Select = $this->Conn->prepare("SELECT * FROM relatorio");
		    $this->Select->execute();
		    $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
		    return $dados;
	
		} catch (PDOException $e) {
		    exibeMensagens("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
		}
	}

	public function selectE()
    	{
		try {
		    $this->Select = $this->Conn->prepare("SELECT * FROM relatorio_entrada");
		    $this->Select->execute();
		    $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
		    return $dados;
			
		} catch (PDOException $e) {
		    exibeMensagens("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
		}
    	}

	public function selectS()
    	{
		try {
		    $this->Select = $this->Conn->prepare("SELECT * FROM relatorio_saida");
		    $this->Select->execute();
		    $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
		    return $dados;
			
		} catch (PDOException $e) {
		    exibeMensagens("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
		}
    	}
	public function selectF()
    	{
		try {
		    $this->Select = $this->Conn->prepare("SELECT * FROM falta");
		    $this->Select->execute();
		    $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
		    return $dados;
			
		} catch (PDOException $e) {
		    exibeMensagens("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
		}
    	}
}
