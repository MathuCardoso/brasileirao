<?php
//Modelo para Posição Favorita

class favPosicao {

    private ?int $id;
    private ?string $posicao;


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
     * Get the value of posicao
     */ 
    public function getPosicao()
    {
        return $this->posicao;
    }

    /**
     * Set the value of posicao
     *
     * @return  self
     */ 
    public function setPosicao($posicao)
    {
        $this->posicao = $posicao;

        return $this;
    }
}