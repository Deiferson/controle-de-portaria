<?php
class UserPdo extends Conn{
    private $Result = null;
    private $Create;
    private $Conn;
    private $Select;
    private $Delet;
    
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
            $this->Select = $this->Conn->prepare("SELECT * FROM usuario");
            $this->Select->execute();
            $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $e) {
            showMessage("<b>Erro ao consultar:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
        }
    }

    private function checkLog($user)
    {
        try {
            $this->Select = $this->Conn->prepare("SELECT * FROM usuario where login_usuario = '{$user->getLoginUser()}'");
            
            $this->Select->execute();

            if ($this->Select->rowCount() == 1) {
                $dados = $this->Select->fetchAll(PDO::FETCH_ASSOC);
                return true;
            }

        } catch (PDOException $e) {
            showMessage("Erro ao consultar. {$e->getMessage()}", WS_ERROR);
        }
    }
    
    public function checkData($user,$n=false)
    {
        try {
            $this->Select = $this->Conn->prepare("SELECT * FROM usuario where "
                    ."login_usuario = '{$user->getLoginUser()}' AND "
                    ."senha_usuario = '{$user->getPassUser()}'");

            $this->Select->execute();

            if ($this->Select->rowCount() == 1) {
                $dados = $this->Select->fetch(PDO::FETCH_ASSOC);
                return $dados;
            } else {
                
                if (!$n) {               
                    showMessage("Usuário ou senha inválidos.", WS_ERROR);                    
                } else {
                    showMessage("Senha atual inválida.", WS_ERROR);
                }

                die();
            }

        } catch (PDOException $e) {
            showMessage("<b>Erro no login. </b> {$e->getMessage()}", WS_ERROR);
        }
        
    }
    
    
    public function insert($user)
    {
        try{
            if ($this->checkLog($user)==true) {

                showMessage("Este usuário já está cadastrado!", WS_INFOR);

            } else {
                $this->Create = $this->Conn->prepare("INSERT INTO usuario VALUES(null,'{$user->getLoginUser()}','{$user->getPassUser()}',{$user->getNvUser()})");
                $this->Create->execute();
                
                if($this->Create->rowCount() == 1){
                    $this->Result = $this->Conn->LastInsertId();
                    showMessage("Usuário cadastrado com sucesso!", WS_ACCEPT);                    
                }
               
            }

        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao cadastrar usuário.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);
        }
    } 




    public function updatePass($user)
    {
        try {            
            $this->Create = $this->Conn->prepare("UPDATE usuario SET senha_usuario = '{$user->getPassUser()}' where login_usuario = '{$user->getLoginUser()}'");
            $this->Create->execute();
            
            if ($this->Create->rowCount() == 1) {
                $this->Result = $this->Conn->LastInsertId();
                showMessage("Senha atualizada com sucesso!", WS_ACCEPT);
            }

        } catch (PDOException $e) {
            $this->Result = null;
            showMessage("<b>Erro ao cadastrar usuário.<b> Mensagem: {$e->getMessage()}. Codigo: {$e->getCode()}",WS_ERROR);
        }
    }
    


    public function delet($id)
    {
        try {
            $this->Delet = $this->Conn->prepare("DELETE FROM usuario where id_usuario = {$id}");
            $this->Delet->execute();
            $dados = $this->Delet->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (PDOException $e) {
            showMessage("<b>Erro ao deletar usuario:</b>{$e->getMessage()} Código: {$e->getCode()}", WS_ERROR);
        }
    }

}
