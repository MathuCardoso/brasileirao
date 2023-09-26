<?php
//Modelo para Aluno
require_once(__DIR__ . "/Estadio.php");

class Clube {

    private ?int $id;
    private ?string $nomeClube;
    private ?string $iniciais;
    private ?string $escudo;
    private ?string $sede;
    private ?string $tecnico;
    private ?string $cor1;
    private ?string $cor2;
    private ?string $cor3;
    private ?Estadio $estadio;


    public function __construct()
    {
        $this->id = 0;
        $this->estadio = null;
        $this->sede = null;
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNomeClube()
    {
        return $this->nomeClube;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNomeClube($nomeClube)
    {
        $this->nomeClube = $nomeClube;

        return $this;
    }

    /**
     * Get the value of iniciais
     */ 
    public function getIniciais()
    {
        return $this->iniciais;
    }

    /**
     * Set the value of iniciais
     *
     * @return  self
     */ 
    public function setIniciais($iniciais)
    {
        $this->iniciais = $iniciais;

        return $this;
    }

    /**
     * Get the value of escudo
     */ 
    public function getEscudo()
    {
        return $this->escudo;
    }

    /**
     * Set the value of escudo
     *
     * @return  self
     */ 
    public function setEscudo($escudo)
    {
        $this->escudo = $escudo;

        return $this;
    }

    /**
     * Get the value of sede
     */ 
    public function getSede()
    {
        return $this->sede;
    }

    /**
     * Set the value of sede
     *
     * @return  self
     */ 
    public function setSede($sede)
    {
        $this->sede = $sede;

        return $this;
    }

    /**
     * Get the value of tecnico
     */ 
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set the value of tecnico
     *
     * @return  self
     */ 
    public function setTecnico($tecnico)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get the value of cor1
     */ 
    public function getCor1()
    {
        return $this->cor1;
    }

    /**
     * Set the value of cor1
     *
     * @return  self
     */ 
    public function setCor1($cor1)
    {
        $this->cor1 = $cor1;

        return $this;
    }

    /**
     * Get the value of cor2
     */ 
    public function getCor2()
    {
        return $this->cor2;
    }

    /**
     * Set the value of cor2
     *
     * @return  self
     */ 
    public function setCor2($cor2)
    {
        $this->cor2 = $cor2;

        return $this;
    }

    /**
     * Get the value of estadio
     */ 
    public function getEstadio()
    {
        return $this->estadio;
    }

    /**
     * Set the value of estadio
     *
     * @return  self
     */ 
    public function setEstadio($estadio)
    {
        $this->estadio = $estadio;

        return $this;
    }
}