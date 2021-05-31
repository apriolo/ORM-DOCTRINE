<?php
 use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
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

// Instancio entidade do aluno
$aluno = new Aluno();
// seto nome
$aluno->setNome($nomeGet);

// pego todos os numeros de telefone passados com parametro
// e com o persist os dados sao adicinados ao objeto sem interação com o banco
// reaizado apenas um insert no final
for ($i = 2; $i < $argc; $i++) {
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);


    $aluno->addTelefone($telefone);
}

 // Entitdade esta sendo observada, cria uma copia para se trabalhar dentro do orm
 $entityManager->persist($aluno);

 // metodo para efetivar as mudanças no banco
 $entityManager->flush();