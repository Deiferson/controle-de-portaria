<?php

class OutPdo extends Conn
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
    
    private function checkLog($out)
    {
        try {            
            $this->Select = $this->Conn->prepare("SELECT * FROM saida where  aluno_saida = '{$out->getRa()}' AND dia_saida = curdate() AND local_saida = '{$out->getIdLocal()}' AND turno_saida = '{$out->getTurno()}'");
            $this->Select->execute();

            if ($this->Select->rowCount() == 1) {
                $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }
        } catch (PDOException $e) {
            showMessage("Erro ao consultar. {$e->getMessage()}", WS_ERROR);
        }
    }

    public function Insert($out)
    {
        try {
            if ($this->checkLog($out)==true) {
                showMessage("Este aluno já registrou saída!", WS_INFOR);
            } else {                
                $this->Create = $this->Conn->prepare("INSERT INTO saida VALUES('{$out->getRa()}',now(),now(),'{$out->getIdLocal()}','{$out->getTurno()}')");
                $this->Create->execute();
                
                if ($this->Create->rowCount() == 1) {
                    $this->Result = $this->Conn->LastInsertId();
                    showMessage("Saída registrada com sucesso!", WS_ACCEPT);                    
                }
               
            }

        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao registrar Saída.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);

        }
    } 
}
