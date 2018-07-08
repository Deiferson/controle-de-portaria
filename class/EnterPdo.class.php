<?php

class EnterPdo extends Conn
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
    
    private function checkLog($enter)
    {
        try {
            $this->Select = $this->Conn->prepare("SELECT * FROM entrada WHERE  aluno_entrada = '{$enter->getRa()}' AND dia_entrada = curdate()  AND local_entrada = {$enter->getIdLocal()} AND turno_entrada = {$enter->getTurno()}");
            
            $this->Select->execute();
            if ($this->Select->rowCount() == 1) {
                $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }

        } catch (PDOException $e) {
            showMessage("Erro ao consultar. {$e->getMessage()}", WS_ERROR);
        }
    } 

    public function Insert($enter)
    {
        try {
            if ($this->checkLog($enter)==true) {
               showMessage("Este aluno já registrou entrada!", WS_INFOR);

            } else {
                $this->Create = $this->Conn->prepare("INSERT INTO entrada VALUES('{$enter->getRa()}',now(),now(),'{$enter->getIdLocal()}','{$enter->getTurno()}')");
                $this->Create->execute();
                
                if ($this->Create->rowCount() == 1) {
                    $this->Result = $this->Conn->LastInsertId();
                    showMessage("Entrada registrada com sucesso!", WS_ACCEPT);                    
                }
               
            }

        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao registrar entrada.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);

        }
    }    
         

}
