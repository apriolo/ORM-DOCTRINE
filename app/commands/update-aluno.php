<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

$id = $_GET['id'];
$novoNome = $_GET['novoNome'];

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$alunoToChange = $entityManager->find(Aluno::class,$id);
$alunoToChange->setNome($novoNome);

$entityManager->flush();