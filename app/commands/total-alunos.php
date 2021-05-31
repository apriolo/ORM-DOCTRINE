<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoClass = Aluno::class;

//Consultas de dql simples
$dql = "SELECT COUNT(aluno) FROM $alunoClass a";
// crio a query
$query = $entityManager->createQuery($dql);
// pego o scalar value valores simples e um resultado só
$totalAlunos = $query->getSingleScalarResult();

echo $totalAlunos;
