<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Instancio uma fabrica do entity manager
$entityManagerFactory = new EntityManagerFactory();
// pego o enetity manager para manipular os dados do banco
$entityManager = $entityManagerFactory->getEntityManager();

$idAluno = $argv[1];
$idCurso = $argv[2];


/**
 * @var Curso
 */
$curso = $entityManager->find(Curso::class, $idCurso);

/**
 * @var Aluno
 */
$aluno = $entityManager->find(Aluno::class, $idAluno);

// Vinculando, tanto faz qual vincular
$curso->addAluno($aluno);
//$aluno->addCurso($curso);

$entityManager->flush();