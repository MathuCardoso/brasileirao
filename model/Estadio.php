<?php
//Modelo para Estádios
class Estadio {

    private ?int $id;
    private ?string $nomeEstadio;

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
     * Get the value of nomeEstadio
     */ 
    public function getNomeEstadio()
    {
        return $this->nomeEstadio;
    }

    /**
     * Set the value of nomeEstadio
     *
     * @return  self
     */ 
    public function setNomeEstadio($nomeEstadio)
    {
        $this->nomeEstadio = $nomeEstadio;

        return $this;
    }
}