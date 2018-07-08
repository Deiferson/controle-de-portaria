<?php

class Sessao
{
    private $DateSave;
    private $TimeNow;
    private $ElapsedTime;


    public function loadSession($dados, $local)
    {
        session_start();

        $_SESSION['id'] = $dados['id_usuario'];
        $_SESSION['login'] = $dados['login_usuario'];        
        $_SESSION['nv'] = $dados['nv_usuario'];
        $_SESSION['idLocal'] = $local['id_local'];
        $_SESSION['descLocal'] = $local['desc_local'];
        $_SESSION['logado'] = true;
        date_default_timezone_set('America/Sao_Paulo');
        $_SESSION['lastAcess'] = date("Y-n-j H:i:s");
        if ($_SESSION['nv']==1) 
            header('Location: home.php');
        if ($_SESSION['nv']==2)
            header('Location: cp.php');        
    }

	public function destroySessao()
	{
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    public function checkTime()
    {
    	$this->DateSave = $_SESSION['lastAcess'];
        date_default_timezone_set('America/Sao_Paulo');
    	$this->TimeNow = date('Y-n-j h:i:s');
    	$this->ElapsedTime = (strtotime($this->TimeNow) - strtotime($this->DateSave));

    	if ($this->ElapsedTime >=3600)
    		$this->destroySessao();
    	else
    		$_SESSION['lastAcess'] = $this->TimeNow;
    }

    public function getLogin()
    {
        return $_SESSION['login'];
    }

    public function getIdLocal()
    {
        return $_SESSION['idLocal'];
    }

    public function getDescLocal()
    {
        return $_SESSION['descLocal'];
    }
    public function getNv()
    {
        return $_SESSION['nv'];
    }

    public function getTimenow()
    {
        echo $this->TimeNow;
    }
}