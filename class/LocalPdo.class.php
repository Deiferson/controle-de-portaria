<?php
class LocalPdo extends Conn
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
            $this->Select = $this->Conn->prepare("SELECT * FROM local");
            $this->Select->execute();
            $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $e) {
            showMessage("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
        }
    }

    public function selectId($id)
    {
        try{
            $this->Select = $this->Conn->prepare("SELECT * FROM local WHERE id_local = '{$id}'");
            $this->Select->execute();            
            $dados = $this->Select->fetch(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $e){
            showMessage("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
        }
    }


    private function checkLog($local)
    {
        try {
            $this->Select = $this->Conn->prepare("SELECT * FROM local where desc_local = '{$local->getDescLocal()}'");            
            $this->Select->execute();

            if ($this->Select->rowCount() == 1) {
                $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }

        } catch (PDOException $e) {
            showMessage("Erro ao consultar. {$e->getMessage()}", WS_ERROR);
        }
    }


    public function insert($local)
    {
        try{
            if ($this->checkLog($local)==true) {

                showMessage("Este local já está cadastrado!", WS_INFOR);

            } else {
                $this->Create = $this->Conn->prepare("INSERT INTO local VALUES(null,'{$local->getDescLocal()}')");
                $this->Create->execute();
                
                if($this->Create->rowCount() == 1){
                    $this->Result = $this->Conn->LastInsertId();
                    showMessage("Local cadastrado com sucesso!", WS_ACCEPT);                    
                }
               
            }

        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao cadastrar.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);
        }
    } 






    public function update($local){
        try{

            //UPDATE `lugar` SET desc_lugar ="Bibliotéca Central" where id_lugar =1
            $this->Create = $this->Conn->prepare("UPDATE local SET desc_local = '{$local->getDescLocal()}' where id_local = '{$local->getIdLocal()}'");
            $this->Create->execute();
            
            if($this->Create->rowCount() == 1){
                $this->Result = $this->Conn->LastInsertId();
                showMessage("Descrição atualizada com sucesso!", WS_ACCEPT); 
            }
            
        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao atualizar descrição.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);

        }
    }
    
}
