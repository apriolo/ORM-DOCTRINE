<?php


namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @Entity(repositoryClass="Alura\Doctrine\Repository\AlunoRepository")
 */
// @entity informa que a classe é uma entity
// informa o repository que vai utilizar essa classe
class Aluno
{
    // Annotations para definir o relacionamento com o banco
    // @id pk
    // @generatedvalue = o valor é gerado automaticamente
    // @column = é uma coluna na tabela
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    // Dizendo ao doctrine que 1 aluno pode ter N telefones
    // o cascade informa para quando remover aluno deletar junto seus telefones
    // o persist insere todos os telefones vinculados a ele
    // EAGER = Doctrine ansioso fazer busca dos telefones quando buscar os alunos
    /**
     * @oneToMany(targetEntity="Telefone",mappedBy="aluno", cascade={"remove", "persist"}, fetch="EAGER")
     */
    private $telefones;

    // Ligação manytomany, informo o target para curso pois é bilateral
    // e o mappedby alunos dentro de curso
    /**
     * @ManyToMany (targetEntity="Curso", mappedBy="alunos")
     */
    private $cursos;

    // Informando que o campo telefones é uma collection
    public function __construct()
    {
        $this->telefones = new ArrayCollection();
        $this->cursos = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        return $this;
    }

    public function addTelefone(Telefone $telefone)
    {
        $this->telefones->add($telefone);
        $telefone->setAluno($this);
        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addCurso(Curso $curso): self
    {
        if ($this->cursos->contains($curso)) {
            return $this;
        }
        $this->cursos->add($curso);
        $curso->addAluno($this);

        return $this;
    }

    /**
     * @return Curso[]
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }
}