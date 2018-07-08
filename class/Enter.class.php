<?php

class Enter
{
    private $Ra;
    private $Dia;
    private $Hora;
    private $Local;
    private $Turno;
    
    function __construct($Ra, $Local, $Dia,$Turno)
    {
        $this->Ra = $Ra;
        $this->Local = $Local;        
        $this->Dia = $Dia;
        $this->Turno = $Turno;
    }

    function getRa()
    {
        return $this->Ra;
    }

    function getDia()
    {
        return $this->Dia;
    }

    function getHora()
    {
        return $this->Hora;
    }

    function getIdLocal()
    {
        return $this->Local;
    }

    function getTurno()
    {
        return $this->Turno;
    }

    function setRa($Ra)
    {
        $this->Ra = $Ra;
    }

    function setDia($Dia)
    {
        $this->Dia = $Dia;
    }

    function setLugar($Local)
    {
        $this->Local = $Local;
    }

	function setHora($Hora)
    {
        $this->Hora = $Hora;
    }

    function setTurno($turno)
    {
        $this->Turno = $Turno;
    }

}
