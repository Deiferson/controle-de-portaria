<?php

class User
{
    private $loginUser;
    private $PassUser;
    private $NvUser;
    
    function __construct($loginUser, $PassUser, $NvUser=1)
    {
        $this->loginUser = $loginUser;
        $this->PassUser = md5($PassUser);
        $this->NvUser = $NvUser;
    }
    
    public function __destruct()
    {   

    }
    
    function getLoginUser()
    {
        return $this->loginUser;
    }

    function getPassUser()
    {
        return $this->PassUser;
    }

    function getNvUser()
    {
        return $this->NvUser;
    }

    function setLoginUser($loginUser)
    {
        $this->loginUser = $loginUser;
    }

    function setPassUser($PassUser)
    {
        $this->PassUser = $PassUser;
    }

    function setNvUser($NvUser)
    {
        $this->NvUser = $NvUser;
    }
}