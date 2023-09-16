<?php
//Modelo para Jogadores
require_once(__DIR__ . "/FavPosicao.php");
require_once(__DIR__ . "/Clubes.php");

class Jogadores {

    private ?int $id;
    private ?string $nome;
    private ?int $nascimento;
    private ?string $numero;
    private ?string $nome_uniforme;
    private ?string $altura;
    private ?string $peso;
    private ?string $pe;
    private ?string $nacionalidade;
    private ?FavPosicao $favPosicao;
    private ?Clubes $Clube;

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
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of nascimento
     */ 
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * Set the value of nascimento
     *
     * @return  self
     */ 
    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of nome_uniforme
     */ 
    public function getNome_uniforme()
    {
        return $this->nome_uniforme;
    }

    /**
     * Set the value of nome_uniforme
     *
     * @return  self
     */ 
    public function setNome_uniforme($nome_uniforme)
    {
        $this->nome_uniforme = $nome_uniforme;

        return $this;
    }

    /**
     * Get the value of altura
     */ 
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of altura
     *
     * @return  self
     */ 
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * Get the value of peso
     */ 
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */ 
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of pe
     */ 
    public function getPe()
    {
        return $this->pe;
    }

    /**
     * Set the value of pe
     *
     * @return  self
     */ 
    public function setPe($pe)
    {
        $this->pe = $pe;

        return $this;
    }

    /**
     * Get the value of nacionalidade
     */ 
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * Set the value of nacionalidade
     *
     * @return  self
     */ 
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;

        return $this;
    }

    /**
     * Get the value of favPosicao
     */ 
    public function getFavPosicao()
    {
        return $this->favPosicao;
    }

    /**
     * Set the value of favPosicao
     *
     * @return  self
     */ 
    public function setFavPosicao($favPosicao)
    {
        $this->favPosicao = $favPosicao;

        return $this;
    }

    /**
     * Get the value of Clube
     */ 
    public function getClube()
    {
        return $this->Clube;
    }

    /**
     * Set the value of Clube
     *
     * @return  self
     */ 
    public function setClube($Clube)
    {
        $this->Clube = $Clube;

        return $this;
    }
}