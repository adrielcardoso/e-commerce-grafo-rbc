<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoCategoria
 *
 * @ORM\Table(name="produto_categoria")
 * @ORM\Entity
 */
class ProdutoCategoria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=45, nullable=true, unique=true)
     */
    public $descricao;
    
    public function __toString() {
        return $this->descricao;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $peso;
    
    function getId() {
        return $this->id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPeso() {
        return $this->peso;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }



}

