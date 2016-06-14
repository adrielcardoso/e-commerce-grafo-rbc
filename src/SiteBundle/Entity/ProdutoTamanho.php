<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoTamanho
 *
 * @ORM\Table(name="produto_tamanho")
 * @ORM\Entity
 */
class ProdutoTamanho
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=255, nullable=true)
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="peso", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $peso;


}

