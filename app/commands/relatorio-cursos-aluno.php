<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

 $entityManagerFactory = new EntityManagerFactory();
 $entityManager = $entityManagerFactory->getEntityManager();
 $alunosRepository = $entityManager->getRepository(Aluno::class);

 $debugStack = new DebugStack();
 $entityManager->getConfiguration()->setSQLLogger($debugStack);

/**
 * @var Aluno[] $alunos
 */
 $alunos = $alunosRepository->findAll();

foreach ($alunos as $aluno) {
    $telefones = $aluno->getTelefones()->map(
        function (Telefone $telefone) {
            return $telefone->getNumero();
        }
    )->toArray();

    echo "ID: {$aluno->getId()}<br/>";
    echo "Nome: {$aluno->getNome()}";
    echo "Telefones: " . implode(',', $telefones);

    /**
     * @var Curso $cursos
     */
    $cursos = $aluno->getCursos();

    foreach ($cursos as $curso) {
        echo "<br/>ID Curso: {$curso->getId()}";
        echo "<br/> Curso: {$curso->getNome()}";
    }
    echo "<hr/>";
 }

print_r($debugStack);