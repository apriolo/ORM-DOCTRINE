<?php


namespace Alura\Doctrine\Repository;


use Alura\Doctrine\Entity\Aluno;
use Doctrine\ORM\EntityRepository;

class AlunoRepository extends EntityRepository
{
    public function buscaCursosPorAluno(bool $exibeCursos = true)
    {
        // metodo para criar consultas com query
//        $entityManager = $this->getEntityManager();
//        $classeAluno = Aluno::class;
//        $sql = "SELECT aluno, telefones, cursos FROM $classeAluno aluno
//                    JOIN aluno.telefones telefones
//                    JOIN aluno.cursos cursos";
//        $query = $entityManager->createQuery($sql);
//        return $query->getResult();

        // criar dql orientada a objetos
        $builder = $this->createQueryBuilder('a')
            ->join('a.telefones', 't')
            ->addSelect('t');

        // criando dinamico a query
        if ($exibeCursos) {
            $builder->join('a.cursos','c')
                ->addSelect('c');
        }

        $query = $builder->getQuery();
        return $query->getResult();
    }
}