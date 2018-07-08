<?php

class AlunoPdo extends Conn
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
    
    public function select($ra)
    {
        try {
            $this->Select = $this->Conn->prepare("SELECT * FROM aluno where ra_aluno like '%{$ra}'");
            $this->Select->execute();
            $dados = $this->Select->fetch(PDO::FETCH_ASSOC);
            return $dados;
            
        } catch (PDOException $e) {
            exibeMensagens("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
        }
    }    
    
}
