<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedido
 *
 * @ORM\Table(name="pedido", indexes={@ORM\Index(name="fk_pedido_fos_user1_idx", columns={"idUsuario"})})
 * @ORM\Entity
 */
class Pedido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataCadastro", type="datetime", nullable=true)
     */
    private $datacadastro;

    /**
     * @var integer
     *
     * @ORM\Column(name="situacao", type="integer", nullable=true)
     */
    private $situacao;

    /**
     * @var string
     *
     * @ORM\Column(name="valorTotal", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $valortotal;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUsuario", referencedColumnName="id")
     * })
     */
    private $idusuario;
    
    function getId() {
        return $this->id;
    }

    function getDatacadastro() {
        return $this->datacadastro;
    }

    function getSituacao() {
        return $this->situacao;
    }

    function getValortotal() {
        return $this->valortotal;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDatacadastro(\DateTime $datacadastro) {
        $this->datacadastro = $datacadastro;

        return $this;
    }

    function setSituacao($situacao) {
        $this->situacao = $situacao;

        return $this;
    }

    function setValortotal($valortotal) {
        $this->valortotal = $valortotal;

        return $this;
    }

    function setIdusuario(\FosUser $idusuario) {
        $this->idusuario = $idusuario;

        return $this;
    }
}