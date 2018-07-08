<?php

abstract class Conn
{
    private $Host = HOST;
    private $User = USER;
    private $Pass = PASS;
    private $Dbsa = DBSA;
    private $Connect = null;

    private function connect()
    {
        try {
            if ($this->Connect == null) {
                $dns = 'mysql:host='.$this->Host.';dbname='.$this->Dbsa;
                $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
                $this->Connect = new PDO($dns, $this->User, $this->Pass, $options);
            }

        } catch (PDOException $e) {
            showMessage("Código de erro: {$e->getCode()}<br>"
            . "Mensagem: {$e->getMessage()}<br>"
            . "Arquivo: {$e->getFine()}<br>"
            . "Linha: {$e->getLine()}<br>", WS_ERROR);
            die;
        }
        return $this->Connect;
    }

    public function getConn()
    {
        return $this->connect();
    }

}