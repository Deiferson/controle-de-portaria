<?php

class Out
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

    function setLocal($Local)
    {
        $this->Lugar = $Local;
    }

    function setHora($Hora) {
        $this->Hora = $Hora;
    }

    function setTurno($Turno) {
        $this->Hora = $Turno;
    }
}
