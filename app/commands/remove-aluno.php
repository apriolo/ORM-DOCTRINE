<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

//$id = $_GET['id'];
$id = $argv[1];
// Busca o aluno da entidade, não realiza uma nova busca pq esta sendo observado já
$aluno = $entityManager->getReference(Aluno::class,$id);

if (is_null($aluno)) {
    echo "Aluno inexistente";
    exit();
}

$entityManager->remove($aluno);
$entityManager->flush();