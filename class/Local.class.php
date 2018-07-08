<?php

class local
{
    private $IdLocal;
    private $DescLocal;
    
    
    
    function __construct($IdLocal, $DescLocal)
    {
        $this->IdLocal = $IdLocal;
        $this->DescLocal = $DescLocal;        
    }



    function getIdLocal()
    {
        return $this->IdLocal;
    }

    function getDescLocal()
    {
        return $this->DescLocal;
    }

    function setIdLocal($IdLocal)
    {
        $this->IdLocal= $IdLocal;
    }

    function setDescLocal($DescLocal)
    {
        $this->DescLocal = $DescLocal;
    }
}

