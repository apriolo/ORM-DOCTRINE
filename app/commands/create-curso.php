<?php
use Alura\Doctrine\Entity\Curso;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Instancio uma fabrica do entity manager
$entityManagerFactory = new EntityManagerFactory();
// pego o enetity manager para manipular os dados do banco
$entityManager = $entityManagerFactory->getEntityManager();

// Rodar script pelo browser
//$nomeGet = $_GET['nome'];
// Pelo terminal
$nomeGet = $argv[1];

// Instancio entidade do curso
$curso = new Curso();
// seto nome
$curso->setNome($nomeGet);

$entityManager->persist($curso);
$entityManager->flush();
