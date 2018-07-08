<?php

class Aluno {
    private $Ra;
    private $Nome;
    
    function __construct($Ra, $Nome="")
    {
        $this->Ra = $Ra;
        $this->Nome = $Nome;
    }    

    function getRa()
    {
        return $this->Ra;
    }

    function getNome()
    {
        return $this->Nome;
    }

    function setRa($Ra)
    {
        $this->Ra = $Ra;
    }

    function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

}
