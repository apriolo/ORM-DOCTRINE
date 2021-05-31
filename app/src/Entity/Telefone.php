<?php


namespace Alura\Doctrine\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * @Entity
 */
class Telefone
{
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;

    /**
     * @Column (type="string")
     */
    private $numero;

    /**
     * @ManyToOne(targetEntity="Aluno")
     */
    private $aluno;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero($numero): self
    {
        $this->numero = $numero;
        return $this;
    }


    public function getAluno()
    {
        return $this->aluno;
    }


    public function setAluno($aluno): self
    {
        $this->aluno = $aluno;
        return $this;
    }

}